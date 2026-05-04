$folder = "C:\Users\58424\Downloads\imagense tocot"
$user   = "localadm"
$pass   = "SCE5 RSLY LOOy VPUe 6QDg at8Y"
$wpUrl  = "https://toctoc.ky/wp-json/wp/v2/media"

$cred = [Convert]::ToBase64String([System.Text.Encoding]::ASCII.GetBytes("${user}:${pass}"))

$images = Get-ChildItem $folder -Filter "*.jpg"

foreach ($img in $images) {
    Write-Host "Subiendo: $($img.Name) ..." -ForegroundColor Yellow

    $bytes = [System.IO.File]::ReadAllBytes($img.FullName)

    $req = [System.Net.HttpWebRequest]::Create($wpUrl)
    $req.Method          = "POST"
    $req.Headers["Authorization"]        = "Basic $cred"
    $req.Headers["Content-Disposition"]  = "attachment; filename=`"$($img.Name)`""
    $req.ContentType     = "image/jpeg"
    $req.ContentLength   = $bytes.Length

    $stream = $req.GetRequestStream()
    $stream.Write($bytes, 0, $bytes.Length)
    $stream.Close()

    try {
        $resp = $req.GetResponse()
        $sr   = New-Object System.IO.StreamReader($resp.GetResponseStream())
        $json = $sr.ReadToEnd() | ConvertFrom-Json
        Write-Host "OK: ID=$($json.id)" -ForegroundColor Green
        Write-Host "    $($json.source_url)" -ForegroundColor Cyan
    }
    catch [System.Net.WebException] {
        $webEx = $_.Exception
        Write-Host "ERROR HTTP: $($webEx.Status) - $($webEx.Message)" -ForegroundColor Red
        if ($webEx.Response) {
            $sr2 = New-Object System.IO.StreamReader($webEx.Response.GetResponseStream())
            Write-Host "   Detalle: $($sr2.ReadToEnd())" -ForegroundColor DarkRed
        }
    }
    Write-Host ""
}

Write-Host "Listo." -ForegroundColor Cyan
Read-Host "Presiona Enter para cerrar"
