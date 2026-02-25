param(
    [string]$directory
)

Get-ChildItem -Path $directory -Recurse -File -Include *.php,*.js,*.css | ForEach-Object {
    $content = Get-Content $_.FullName -Raw
    $newContent = $content -replace 'assets/dashbaord', 'assets/dashboard'
    $newContent = $newContent -replace 'assets/(css|js|images|fonts|scss|vendors)', 'assets/dashboard/$1'
    if ($content -cne $newContent) {
        Set-Content $_.FullName $newContent -NoNewline
        Write-Host "Updated $($_.FullName)"
    }
}
Write-Host "Done updating references."
