<?php
require("AudioFile.php");

if (!empty($argv[1]) && $argv[1] == "rename" && !empty($argv[2])) {
    $file = new AudioFile($argv[2]);
    $file->rename();
} else {
    echo "usage: php process.php rename filename_to_rename\n";
}
