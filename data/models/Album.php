<?php

/**
 * Album class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Album extends Dz_Model_Abstract {

    /**
     * List of album's comments. Represented by an array of Comment objects
     *
     * @var list of object
     */
    public $comments = array();

    /**
     * List of album's tracks. Represented by an array of Track objects
     *
     * @var list of object
     */
    public $tracks = array();

    /**
     * The album's title
     *
     * @var string
     */
    public $title;

    /**
     * The url of the album's cover
     *
     * @var url
     */
    public $cover;

    /**
     * The url of the album on Deezer
     *
     * @var url
     */
    public $link;

    /**
     * The album's label name
     *
     * @var string
     */
    public $label;

    /**
     * The album's duration (seconds)
     *
     * @var int
     */
    public $duration;

    /**
     * The number of album's Fans
     *
     * @var int
     */
    public $nb_fans;

    /**
     * List of album's fans. Represented by an array of User objects
     *
     * @var list of object
     */
    public $fans = array();

    /**
     * The album's release date
     *
     * @var date
     */
    public $release_date;

    /**
     * Artist object containing : id, name
     *
     * @var object
     */
    public $artist;

    /**
     * Album connections type
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