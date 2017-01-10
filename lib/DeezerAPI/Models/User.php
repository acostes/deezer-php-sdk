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
 * User class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class User extends Base
{

    /**
     * The user's Deezer nickname
     *
     * @var string
     */
    public $name;

    /**
     * The user's last name
     *
     * @var string
     */
    public $lastname;

    /**
     * The user's first name
     *
     * @var string
     */
    public $firstname;

    /**
     * The user's email
     *
     * @var string
     */
    public $email;

    /**
     * The user's birthday
     *
     * @var date
     */
    public $birthday;

    /**
     * The user's inscription date
     *
     * @var date
     */
    public $inscription_date;

    /**
     * The user's gender : F or M
     *
     * @var string
     */
    public $gender;

    /**
     * The url of the profil for the user on Deezer
     *
     * @var url
     */
    public $link;

    /**
     * The url of the user's profil picture.
     *
     * @var url
     */
    public $picture;

    /**
     * The user's country
     *
     * @var int
     */
    public $country;

    /**
     * User connections type
     *
     * @var array
     */
    protected $connectionsType = array(
        'albums',
        'artists',
        'charts',
        'folders',
        'followings',
        'followers',
        'permissiosn',
        'personal_songs',
        'playlists',
        'radios',
    );
}
