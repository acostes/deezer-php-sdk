<?php

/**
 * Folder class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

class Folder extends Base {

    /**
     * The folder's title
     *
     * @var string
     */
    public $artist;

    /**
     * user object containing : id
     *
     * @var object
     */
    public $creator;

    /**
     * Folder connections type
     *
     * @var array
     */
    protected $_connectionsType = array(
        'items', 
    );
}