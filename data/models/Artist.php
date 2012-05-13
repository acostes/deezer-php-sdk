<?php

/**
 * Artist class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Artist extends Dz_Model_Abstract {
    
    /**
     * The artist's name
     *
     * @var string
     */
    public $name;

    /**
     * The url of the artist picture
     *
     * @var url
     */
    public $picture;

    /**
     * The url of the artist on Deezer
     *
     * @var url
     */
    public $link;

    /**
     * The number of artist's albums
     *
     * @var int
     */
    public $nb_album;

    /**
     * true if the artist has a smartradio
     *
     * @var bool
     */
    public $hasRadio;

    /**
     * The number of artist's fans
     *
     * @var int
     */
    public $nb_fan;

    /**
     * The url of the album on Deezer
     *
     * @var url
     */
    public $comments;

    /**
     * List of artist's comments
     *
     * @var list of object
     */
    public $fans;

    /**
     * Get the top 5 tracks of an artist
     *
     * @var list of object
     */
    public $top;

    /**
     * List of related artists
     *
     * @var list of object
     */
    public $related;

    /**
     * List of tracks
     *
     * @var list of object
     */
    public $radio;

    /**
     * List of artist's albums
     *
     * @var list of object
     */
    public $albums;

    /**
     * Artist connections type
     *
     * @var array
     */
    protected $_connectionsType = array(
        'comments', 
        'fans', 
        'top',
        'albums',
        'related',
        'radio',
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