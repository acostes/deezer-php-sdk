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
 * Artist class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Artist extends Base
{

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
    protected $connectionsType = array(
        'comments',
        'fans',
        'top',
        'albums',
        'related',
        'radio',
    );
}
