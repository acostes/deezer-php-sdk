<?php

/**
 * Playlist class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Playlist extends Dz_Model_Abstract {

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
     * List of Track
     *
     * @var object
     */
    public $tracks;

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

    /**
     * Constructor
     *
     * @param int $id
     */
    public function __construct($id) {
        parent::__construct($id);
    }
}