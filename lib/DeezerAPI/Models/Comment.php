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
 * Comment class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
class Comment extends Base
{

    /**
     * The content of the comment
     *
     * @var string
     */
    public $text;

    /**
     * The date the comment was posted
     *
     * @var date
     */
    public $date;

    /**
     * The artist's name
     *
     * @var object
     */
    public $author;
}
