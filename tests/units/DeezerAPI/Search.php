<?php

/**
 * PHP library for using Deezzer API
 *
 * (c) Arnaud Costes <arnaud.costes@gmail.com>
 *
 * MIT License
 */

namespace DeezerAPI\tests\units;

use atoum;
use DeezerAPI\Search as testedClass;

/**
 * Search class units tests for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Search extends atoum
{

    public function test__construct()
    {
        $this->exception(
            function () {
                $search = new testedClass('eminem', 'unknownType');
            }
        )->isInstanceOf('DeezerAPI\DeezerException');

        $this->exception(
            function () {
                $search = new testedClass('eminem', 'album', 'unknownOrder');
            }
        )->isInstanceOf('DeezerAPI\DeezerException');
    }

    public function test_search()
    {
        $limit = 10;
        $search = new testedClass('eminem', null, null, $limit, false);
        $result = $search->search();
        $this->array($result)->isNotEmpty();
        $this->array($result)->hasSize($limit);
        foreach ($result as $object) {
            $this->object($object)->isInstanceOf('DeezerAPI\Models\Base');
        }
    }

    public function test_searchAlbum()
    {
        $limit = 10;
        $search = new testedClass('eminem', null, null, $limit, false);
        $result = $search->searchAlbum();
        $this->array($result)->isNotEmpty();
        $this->array($result)->hasSize($limit);
        foreach ($result as $object) {
            $this->object($object)->isInstanceOf('DeezerAPI\Models\Album');
        }
    }

    public function test_searchArtist()
    {
        $limit = 10;
        $search = new testedClass('eminem', null, null, $limit, false);
        $result = $search->searchArtist();
        $this->array($result)->isNotEmpty();
        $this->array($result)->hasSize($limit);
        foreach ($result as $object) {
            $this->object($object)->isInstanceOf('DeezerAPI\Models\Artist');
        }
    }
}