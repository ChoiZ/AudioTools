<?php
# Rename file into : Artist - Title (Instead of ARTIST - TITLE or ARTIST - Title…)

function ucname($string) {

    $string = ucwords(strtolower($string));

    foreach (array('-', '(', '[') as $delimiter) {
        if (strpos($string, $delimiter) !== false) {
            $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
        }
    }

    return $string;

}

if (!empty($argv[1])) {
    $file = $argv[1];
} else {
    echo "usage: php rename.php filename_to_rename\n";
    exit();
}

if (rename($file, ucname($file))) {
    echo 'Rename '.$file.' into '.ucname($file).' OK'."\n";
}