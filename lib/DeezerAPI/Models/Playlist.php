<?php

/**
 * Playlist class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

class Playlist extends Base {

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
    protected $_connectionsType = array(
        'comments', 
        'fans', 
        'tracks',
    );
}