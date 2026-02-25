<?php
$content = file_get_contents('lang/en/addresses.php');
preg_match_all("/['\"]([^'\"]+)['\"]\s*=>/", $content, $matches);
$counts = array_count_values($matches[1]);
foreach ($counts as $key => $count) {
    if ($count > 1) {
        echo "Duplicate: $key ($count times)\n";
    }
}
