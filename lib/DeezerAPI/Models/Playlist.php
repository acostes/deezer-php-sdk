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
 * Playlist class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Playlist extends Base
{

    /**
     * The playlist's title
     *
     * @var string
     */
    public $title;

    /**
     * The playlist's duration (seconds)
     *
     * @var int
     */
    public $duration;

    /**
     * The url of the playlist's cover
     *
     * @var url
     */
    public $picture;

    /**
     * The url of the playlist on Deezer
     *
     * @var url
     */
    public $link;

    /**
     * user object containing : id
     *
     * @var object
     */
    public $creator;

    /**
     * Playlist connections type
     *
     * @var array
     */
    protected $connectionsType = array(
        'comments',
        'fans',
        'tracks',
    );
}
