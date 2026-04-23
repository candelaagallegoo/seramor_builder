$imgDir = "C:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\imagenes"
$wpBat = "C:\xampp\htdocs\seramor\wp.bat"
$logFile = "C:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\scripts\upload-log.txt"

$files = Get-ChildItem $imgDir -File | Where-Object { $_.Extension -match '\.(jpg|jpeg|png)$' }
$total = $files.Count
$count = 0
$ok = 0
$fail = 0

"=== Upload started $(Get-Date) ===" | Out-File $logFile
"Total: $total images" | Tee-Object -Append $logFile

foreach ($f in $files) {
    $count++
    $sizeMB = [math]::Round($f.Length / 1MB, 1)
    Write-Host "[$count/$total] $($f.Name) (${sizeMB}MB)..." -NoNewline

    try {
        $id = & $wpBat media import $f.FullName --title="$($f.BaseName)" --porcelain 2>&1
        if ($id -match '^\d+$') {
            Write-Host " OK -> ID $id" -ForegroundColor Green
            "OK | $($f.Name) | ID $id" | Out-File -Append $logFile
            $ok++
        } else {
            Write-Host " WARN: $id" -ForegroundColor Yellow
            "WARN | $($f.Name) | $id" | Out-File -Append $logFile
            $fail++
        }
    } catch {
        Write-Host " FAIL: $_" -ForegroundColor Red
        "FAIL | $($f.Name) | $_" | Out-File -Append $logFile
        $fail++
    }
}

"=== Done: $ok ok, $fail failed ===" | Tee-Object -Append $logFile
Write-Host "`nLog: $logFile"
