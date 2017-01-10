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
 * Track class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Track extends Base
{

    /**
     * true if the track is readable in the player for the current user
     *
     * @var boolean
     */
    public $readable;

    /**
     * The track's title
     *
     * @var string
     */
    public $title;

    /**
     * The url of the track on Deezer
     *
     * @var url
     */
    public $link;

    /**
     * The track's duration in seconds
     *
     * @var int
     */
    public $duration;

    /**
     * The position of the track in its album
     *
     * @var int
     */
    public $track_position;

    /**
     * The track's album's disk number
     *
     * @var int
     */
    public $disk_number;

    /**
     * The track's Deezer rank
     *
     * @var int
     */
    public $rank;

    /**
     * The track's release date
     *
     * @var date
     */
    public $release_date;

    /**
     * Artist object
     *
     * @var object
     */
    public $artist;

    /**
     * Album object
     *
     * @var object
     */
    public $album;

    /**
     * The url of track's preview file. This file contains the first 30 seconds of the track
     *
     * @var url
     */
    public $preview;
}
