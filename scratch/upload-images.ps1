# =========================================================
# TOCTOC - WordPress Media Uploader via REST API
# Bypasses the wp-admin upload (which has temp folder issues)
# =========================================================
# USAGE: Put this script in the SAME folder as your .jpg files
#        Then right-click > Run with PowerShell
# =========================================================

$wpUrl      = "https://toctoc.ky"
$username   = "webtoctoc"
$appPassword = "BAG7 oKxE 3s9b JNhf WHeV rVE1"

# Build Basic Auth header
$pair  = "$($username):$($appPassword)"
$bytes = [System.Text.Encoding]::ASCII.GetBytes($pair)
$base64 = [Convert]::ToBase64String($bytes)
$headers = @{ Authorization = "Basic $base64" }

# Find all JPG/JPEG/PNG files in the current directory
$scriptDir = Split-Path -Parent $MyInvocation.MyCommand.Path
$images = Get-ChildItem -Path $scriptDir -Include "*.jpg","*.jpeg","*.png","*.webp" -File

if ($images.Count -eq 0) {
    Write-Host "❌ No image files found in: $scriptDir" -ForegroundColor Red
    Write-Host "   Place your .jpg files in the same folder as this script." -ForegroundColor Yellow
    Read-Host "Press Enter to exit"
    exit
}

Write-Host "==================================================" -ForegroundColor Cyan
Write-Host " TOCTOC WordPress Media Uploader" -ForegroundColor Cyan
Write-Host "==================================================" -ForegroundColor Cyan
Write-Host "Found $($images.Count) image(s) to upload." -ForegroundColor White
Write-Host ""

foreach ($img in $images) {
    Write-Host "Uploading: $($img.Name) ..." -ForegroundColor Yellow

    $mimeType = switch ($img.Extension.ToLower()) {
        ".jpg"  { "image/jpeg" }
        ".jpeg" { "image/jpeg" }
        ".png"  { "image/png" }
        ".webp" { "image/webp" }
        default { "image/jpeg" }
    }

    $uploadHeaders = $headers.Clone()
    $uploadHeaders["Content-Type"]        = $mimeType
    $uploadHeaders["Content-Disposition"] = "attachment; filename=`"$($img.Name)`""

    $fileBytes = [System.IO.File]::ReadAllBytes($img.FullName)

    try {
        $response = Invoke-RestMethod `
            -Uri "$wpUrl/wp-json/wp/v2/media" `
            -Method POST `
            -Headers $uploadHeaders `
            -Body $fileBytes

        Write-Host "   ✅ Uploaded! ID: $($response.id)" -ForegroundColor Green
        Write-Host "   🔗 URL: $($response.source_url)" -ForegroundColor Cyan
    }
    catch {
        $errMsg = $_.Exception.Message
        Write-Host "   ❌ Failed: $errMsg" -ForegroundColor Red
    }

    Write-Host ""
}

Write-Host "==================================================" -ForegroundColor Cyan
Write-Host " Done! Check your WordPress Media Library." -ForegroundColor Green
Write-Host "==================================================" -ForegroundColor Cyan
Read-Host "Press Enter to exit"
