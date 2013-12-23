<?php
require("AudioFile.php");

if (!empty($argv[1]) && $argv[1] == "rename" && !empty($argv[2])) {
    $file = new AudioFile($argv[2]);
    $file->rename();
} else if (!empty($argv[1]) && $argv[1] == "tag" && !empty($argv[2])) {
    $file = new AudioFile($argv[2]);
    $file->tagFile();
} else {
    echo "usage:\n".
    "php process.php rename filename_to_rename\n".
    "php process.php tag filename_to_tag\n";
}
