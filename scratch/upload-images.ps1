$folder = "C:\Users\58424\Downloads\imagense tocot"
$user   = "localadm"
$pass   = "SCE5 RSLY LOOy VPUe 6QDg at8Y"
$wpUrl  = "https://toctoc.ky/wp-json/wp/v2/media"

$cred     = [Convert]::ToBase64String([System.Text.Encoding]::ASCII.GetBytes("${user}:${pass}"))
$boundary = "----WebKitFormBoundary" + [System.Guid]::NewGuid().ToString("N").Substring(0,16)
$CRLF     = "`r`n"

$images = Get-ChildItem $folder -Filter "*.jpg"

foreach ($img in $images) {
    Write-Host "Subiendo: $($img.Name) ..." -ForegroundColor Yellow

    $fileBytes = [System.IO.File]::ReadAllBytes($img.FullName)

    # Build multipart body manually
    $enc  = [System.Text.Encoding]::ASCII
    $encU = [System.Text.Encoding]::UTF8

    $preBytes  = $enc.GetBytes("--$boundary$CRLF")
    $preBytes += $enc.GetBytes("Content-Disposition: form-data; name=`"file`"; filename=`"$($img.Name)`"$CRLF")
    $preBytes += $enc.GetBytes("Content-Type: image/jpeg$CRLF$CRLF")
    $postBytes = $enc.GetBytes("$CRLF--$boundary--$CRLF")

    $bodyStream = New-Object System.IO.MemoryStream
    $bodyStream.Write($preBytes,  0, $preBytes.Length)
    $bodyStream.Write($fileBytes, 0, $fileBytes.Length)
    $bodyStream.Write($postBytes, 0, $postBytes.Length)
    $body = $bodyStream.ToArray()
    $bodyStream.Dispose()

    $req = [System.Net.HttpWebRequest]::Create($wpUrl)
    $req.Method        = "POST"
    $req.ContentType   = "multipart/form-data; boundary=$boundary"
    $req.ContentLength = $body.Length
    $req.Headers["Authorization"] = "Basic $cred"

    $stream = $req.GetRequestStream()
    $stream.Write($body, 0, $body.Length)
    $stream.Close()

    try {
        $resp = $req.GetResponse()
        $sr   = New-Object System.IO.StreamReader($resp.GetResponseStream())
        $json = $sr.ReadToEnd() | ConvertFrom-Json
        Write-Host "OK: ID=$($json.id)" -ForegroundColor Green
        Write-Host "    $($json.source_url)" -ForegroundColor Cyan
    }
    catch [System.Net.WebException] {
        $ex = $_.Exception
        Write-Host "ERROR: $($ex.Status)" -ForegroundColor Red
        if ($ex.Response) {
            $sr2 = New-Object System.IO.StreamReader($ex.Response.GetResponseStream())
            Write-Host "   $($sr2.ReadToEnd())" -ForegroundColor DarkRed
        }
    }
    Write-Host ""
}

Write-Host "Listo." -ForegroundColor Cyan
Read-Host "Presiona Enter para cerrar"
