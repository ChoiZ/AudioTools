<?php
/**
  * id3v2: Add id3 tags in mp3 file.
  *
  * Require: id3v2
  *
  * @author François LASSERRE <choiz@me.com>
  * @license GNU GPL {@link http://www.gnu.org/licenses/gpl.html}
  */

if (!empty($argv[1])) {
    $file = $argv[1];
} else {
    /* Note: Your mp3 file must be like: "artist - title.mp3" */
    echo "usage: php id3v2.php file\n";
    exit();
}

$filename = str_replace('.mp3','',$file);

if (!empty($filename)) {
    $split = explode(' - ', $filename);
}

/* Only works with "artist - title" we can't have multiple "-" yet ;) */
if (count($split) == 2) {
    exec('id3v2 -a "'.$split[0].'" -t "'.$split[1].'" "'.$file.'"');
}