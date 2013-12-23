<?php
/**
 * AudioFile
 *
 * @author François LASSERRE
 * @copyright Copyright (c) 2013 All rights reserved.
 */
class AudioFile {

    public $delimiter = array('-', '(', '[');

    /* public __construct($filename) {{{ */
    /**
     * __construct
     *
     * @param string $filename
     * @access public
     * @return void
     */
    public function __construct($filename) {

        $this->filename = $filename;

    }
    /* }}} */

    /* public ucfilename() {{{ */
    /**
     * ucfilename
     * Capitalizes each word even after (a hyphen, parenthesis, bracket)
     *
     * @access public
     * @return string
     */
    public function ucfilename() {

        $this->rename = ucwords(strtolower($this->filename));

        foreach ($this->delimiter as $delimiter) {
            if (strpos($this->rename, $delimiter) !== false) {
                $this->rename = implode($delimiter, array_map('ucfirst', explode($delimiter, $this->rename)));
            }
        }

        return $this->rename;

    }
    /* }}} */

    /* public rename() {{{ */
    /**
     * rename
     *
     * @access public
     * @return bool
     */
    public function rename() {

        if (file_exists($this->filename) && rename($this->filename, $this->ucfilename())) {
            return true;
        }

        return false;

    }
    /* }}} */

    /* public undorename() {{{ */
    /**
     * undorename
     *
     * @access public
     * @return bool
     */
    public function undorename() {

        if (file_exists($this->rename) && rename($this->rename, $this->filename)) {
            return true;
        }

        return false;

    }
    /* }}} */

    /* public tagFile() {{{ */
    /**
     * tagFile
     *
     * @access public
     * @return bool
     */
    public function tagFile() {
        
        $filename = str_replace('.mp3','',$this->filename);

        if (!empty($filename)) {
            $split = explode(' - ', $filename);
        }
        
        /* Only works with "artist - title" we can't have multiple "-" yet ;) */
        if (count($split) == 2) {
            return exec('id3v2 -a "'.$split[0].'" -t "'.$split[1].'" "'.$this->filename.'"');
        }

        return false;

    }
    /* }}} */

}
