<?php

/**
 * PHP library for using Deezzer API
 *
 * (c) Arnaud Costes <arnaud.costes@gmail.com>
 *
 * MIT License
 */

namespace DeezerAPI\Models;

/**
 * Folder class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Folder extends Base
{

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
    protected $connectionsType = array(
        'items',
    );
}
