$files = Get-ChildItem -Path "resources\views" -Recurse -File -Include *.php
foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw

    # Pattern: {!! asset('assets') !!}/css/style.css
    # We want: {!! asset('assets/dashboard/css/style.css') !!}
    $pattern1 = '\{!! asset\(''assets''\) !!\}/(css|js|images|fonts|scss|vendors)/([a-zA-Z0-9_\-\./\.]+)'
    $replace1 = '{!! asset(''assets/dashboard/$1/$2'') !!}'

    # Note: we may also have {{ asset('assets') }}/css/style.css
    $pattern2 = '\{\{ asset\(''assets''\) \}\}/(css|js|images|fonts|scss|vendors)/([a-zA-Z0-9_\-\./\.]+)'
    $replace2 = '{{ asset(''assets/dashboard/$1/$2'') }}'

    $newContent = $content -replace $pattern1, $replace1
    $newContent = $newContent -replace $pattern2, $replace2

    # Also catch <script src="{!! asset('assets') !!}/js/..."> where quotes might be double

    if ($content -cne $newContent) {
        Set-Content $file.FullName $newContent -NoNewline
        Write-Host "Updated $($file.FullName)"
    }
}
Write-Host "Done fixing missing paths."
