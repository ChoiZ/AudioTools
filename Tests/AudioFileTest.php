<?php
/**
 * AudioFileTest
 *
 * @uses PHPUnit
 * @uses _Framework_TestCase
 * @author François LASSERRE
 * @copyright Copyright (c) 2013 All rights reserved.
 */
class AudioFileTest extends PHPUnit_Framework_TestCase {

    /* public test_ucfilename() {{{ */
    /**
     * test_ucfilename
     *
     * @access public
     * @return void
     */
    public function test_ucfilename() {

        $file = new AudioFile('dido - white flag (remix)');

        $this->assertEquals($file->ucfilename(), 'Dido - White Flag (Remix)');

    }
    /* }}} */

    /* public test_rename() {{{ */
    /**
     * test_rename
     *
     * @access public
     * @return void
     */
    public function test_rename() {

        $file = new AudioFile('ARTIST - Title.mp3');

        $this->assertTrue($file->rename());

        // undo renaming
        $file->undorename();

    }
    /* }}} */

}
