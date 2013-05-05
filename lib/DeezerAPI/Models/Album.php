<?php

/**
 * Album class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

class Album extends Base {

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
}