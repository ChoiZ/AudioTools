<?php
/**
  * Rename file like "ARTIST - Title.ext" into: "Artist - Title.ext"
  *
  * @author François LASSERRE <choiz@me.com>
  * @license GNU GPL {@link http://www.gnu.org/licenses/gpl.html}
  */

if (!empty($argv[1])) {
    $file = $argv[1];
} else {
    echo "usage: php rename.php filename_to_rename\n";
    exit();
}

if (rename($file, ucname($file))) {
    echo 'Rename '.$file.' into '.ucname($file).' OK'."\n";
}

/* public ucname($string) {{{ */
/**
 * ucname
 *
 * @param string $string
 * @return string
 */
function ucname($string) {

    $string = ucwords(strtolower($string));

    foreach (array('-', '(', '[') as $delimiter) {
        if (strpos($string, $delimiter) !== false) {
            $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
        }
    }

    return $string;

}
/* }}} */