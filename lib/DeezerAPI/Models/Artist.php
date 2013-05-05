<?php

/**
 * Artist class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

class Artist extends Base {
    
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
}