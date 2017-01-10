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
 * Radio class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Radio extends Base
{

    /**
     * The radio title
     *
     * @var string
     */
    public $title;

    /**
     * The radio description
     *
     * @var string
     */
    public $description;

    /**
     * The url of the radio picture
     *
     * @var string
     */
    public $picture;

    /**
     * Album connections type
     *
     * @var array
     */
    protected $connectionsType = array(
        'genre',
        'top',
        'tracks',
    );
}
