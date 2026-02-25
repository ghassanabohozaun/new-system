<?php
$file = 'lang/en/addresses.php';
$content = file_get_contents($file);
$tokens = token_get_all($content);

$keys = [];
$currentKey = null;
$inArray = false;

foreach ($tokens as $token) {
    if (is_array($token)) {
        if ($token[0] === T_CONSTANT_ENCAPSED_STRING) {
            $val = trim($token[1], "'\"");
            if ($currentKey === null) {
                $currentKey = $val;
            }
        }
    } else {
        if ($token === '[') {
            $inArray = true;
        } elseif ($token === ']') {
            $inArray = false;
        } elseif ($token === '>') { // Part of =>
            // do nothing
        } elseif ($token === ',') {
            if ($currentKey !== null) {
                if (isset($keys[$currentKey])) {
                    echo "Duplicate key found: '$currentKey'\n";
                }
                $keys[$currentKey] = true;
                $currentKey = null;
            }
        }
    }
}
