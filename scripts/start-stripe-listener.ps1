param(
    [string]$WpPath = 'C:\xampp\htdocs\seramor',
    [switch]$PrintOnly
)

$phpPath = 'C:\xampp\php\php.exe'
$wpCliPath = Join-Path $WpPath 'wp-cli.phar'
$workspacePath = 'C:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE'
$helperPath = Join-Path $workspacePath 'scripts\print-pmpro-stripe-webhook.php'

function Get-SeramorEnvMap {
    param(
        [string]$BasePath
    )

    $envMap = @{}
    $candidateFiles = @(
        (Join-Path $BasePath '.env.local'),
        (Join-Path $BasePath '.env.server')
    )

    foreach ($candidate in $candidateFiles) {
        if (-not (Test-Path $candidate)) {
            continue
        }

        foreach ($line in Get-Content $candidate) {
            if ([string]::IsNullOrWhiteSpace($line)) {
                continue
            }

            $trimmed = $line.Trim()
            if ($trimmed.StartsWith('#')) {
                continue
            }

            $separatorIndex = $trimmed.IndexOf('=')
            if ($separatorIndex -lt 1) {
                continue
            }

            $name = $trimmed.Substring(0, $separatorIndex).Trim()
            $value = $trimmed.Substring($separatorIndex + 1).Trim()
            $envMap[$name] = $value
        }

        break
    }

    return $envMap
}

function Resolve-StripeApiKey {
    param(
        [hashtable]$EnvMap
    )

    $environment = ''
    if ($EnvMap.ContainsKey('PMPRO_GATEWAY_ENVIRONMENT')) {
        $environment = $EnvMap['PMPRO_GATEWAY_ENVIRONMENT'].ToLowerInvariant()
    } elseif ($EnvMap.ContainsKey('PMPRO_STRIPE_ENVIRONMENT')) {
        $environment = $EnvMap['PMPRO_STRIPE_ENVIRONMENT'].ToLowerInvariant()
    }

    $candidates = @()
    if ($environment -eq 'live') {
        $candidates = @(
            'PMPRO_STRIPE_LIVE_SECRET_KEY',
            'STRIPE_LIVE_SECRET_KEY'
        )
    } else {
        $candidates = @(
            'PMPRO_STRIPE_SANDBOX_SECRET_KEY',
            'PMPRO_STRIPE_TEST_SECRET_KEY',
            'STRIPE_TEST_SECRET_KEY'
        )
    }

    $candidates += @(
        'PMPRO_STRIPE_SECRET_KEY',
        'STRIPE_SECRET_KEY'
    )

    foreach ($candidate in $candidates) {
        if ($EnvMap.ContainsKey($candidate) -and -not [string]::IsNullOrWhiteSpace($EnvMap[$candidate])) {
            return $EnvMap[$candidate]
        }
    }

    return $null
}

function Resolve-StripeExecutable {
    $command = Get-Command stripe -ErrorAction SilentlyContinue
    if ($command) {
        return $command.Source
    }

    $candidates = @(
        (Join-Path $env:LOCALAPPDATA 'Microsoft\WinGet\Links\stripe.exe'),
        (Join-Path $env:LOCALAPPDATA 'Programs\Stripe\stripe.exe'),
        (Join-Path $env:ProgramFiles 'Stripe\stripe.exe')
    )

    $packageStripe = Get-ChildItem (Join-Path $env:LOCALAPPDATA 'Microsoft\WinGet\Packages') -Filter stripe.exe -Recurse -ErrorAction SilentlyContinue | Select-Object -First 1
    if ($packageStripe) {
        $candidates += $packageStripe.FullName
    }

    foreach ($candidate in $candidates) {
        if ($candidate -and (Test-Path $candidate)) {
            return $candidate
        }
    }

    return $null
}

$stripeExe = Resolve-StripeExecutable
$envMap = Get-SeramorEnvMap -BasePath $WpPath
$stripeApiKey = Resolve-StripeApiKey -EnvMap $envMap

if (-not $stripeExe) {
    throw 'Stripe CLI no esta instalado o no esta disponible en PATH.'
}

if (-not $stripeApiKey) {
    throw 'No pude resolver una Stripe secret key desde .env.local o .env.server.'
}

$helperOutput = & $phpPath $wpCliPath eval-file $helperPath --path=$WpPath
$webhookLine = $helperOutput | Where-Object { $_ -like 'Stripe webhook URL:*' } | Select-Object -First 1

if (-not $webhookLine) {
    throw 'No pude resolver la URL del webhook de PMPro.'
}

$webhookUrl = ($webhookLine -replace '^Stripe webhook URL:\s*', '').Trim()

if ([string]::IsNullOrWhiteSpace($webhookUrl)) {
    throw 'La URL del webhook esta vacia.'
}

$commandLine = "`"$stripeExe`" listen --api-key *** --forward-to `"$webhookUrl`""

Write-Output "Webhook URL: $webhookUrl"
Write-Output "Modo Stripe CLI: usando secret key desde env local"
Write-Output "Comando: $commandLine"

if ($PrintOnly) {
    exit 0
}

& $stripeExe listen --api-key $stripeApiKey --forward-to $webhookUrl