# Extrae las 48 imágenes embebidas del SVG del Canva con sus coordenadas
$svgPath = "c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\imagenes\canvas\latest\landing\LANDING PAGE.svg"
$outDir = "c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\imagenes\canvas\latest\landing\extracted"
New-Item -ItemType Directory -Path $outDir -Force | Out-Null

$svg = Get-Content $svgPath -Raw
$pattern = '<image\s+x="([^"]+)"\s+y="([^"]+)"\s+width="([^"]+)"(?:\s+height="([^"]+)")?\s+xlink:href="data:image/([a-z]+);base64,([^"]+)"'
$matches = [regex]::Matches($svg, $pattern)

$idx = 0
$report = @()
foreach($m in $matches){
    $idx++
    $x = [double]$m.Groups[1].Value
    $y = [double]$m.Groups[2].Value
    $w = [double]$m.Groups[3].Value
    $h = if($m.Groups[4].Success) { [double]$m.Groups[4].Value } else { 0 }
    $ext = $m.Groups[5].Value
    $b64 = $m.Groups[6].Value
    $bytes = [Convert]::FromBase64String($b64)
    $name = "img_{0:D2}_x{1}_y{2}_w{3}.{4}" -f $idx, [int]$x, [int]$y, [int]$w, $ext
    [IO.File]::WriteAllBytes((Join-Path $outDir $name), $bytes)
    $report += [pscustomobject]@{idx=$idx; x=$x; y=$y; w=$w; size_kb=[math]::Round($bytes.Length/1KB,1); name=$name}
}

$report | Sort-Object y, x | Format-Table -AutoSize | Out-String -Width 200
Write-Host "Extraidas $idx imagenes en $outDir"
