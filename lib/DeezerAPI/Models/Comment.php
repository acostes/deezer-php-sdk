<?php

/**
 * Comment class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

class Comment extends Base {

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