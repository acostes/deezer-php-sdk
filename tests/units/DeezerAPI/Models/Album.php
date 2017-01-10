<?php

/**
 * PHP library for using Deezzer API
 *
 * (c) Arnaud Costes <arnaud.costes@gmail.com>
 *
 * MIT License
 */

namespace DeezerAPI\tests\units\Models;

use atoum;
use DeezerAPI\Models\Album as testedClass;

/**
 * Album model units tests for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Album extends atoum
{

    public function test__construct()
    {
        $this->exception(
            function () {
                $album = new testedClass('notNumeric');
            }
        )->isInstanceOf('DeezerAPI\DeezerException');


        $this->exception(
            function () {
                $album = new testedClass(new \Exception());
            }
        )->isInstanceOf('DeezerAPI\DeezerException');

        $id = 302127;
        $album = new testedClass($id);
        $this->integer($album->getId())->isEqualTo($id);
        $this->string($album->type)->isEqualTo('album');

        $this->exception(
            function () {
                // Unknown album id
                $album = new testedClass(10000000000000);
            }
        )->isInstanceOf('DeezerAPI\DeezerException');
    }

}