<?php

/**
 * Comment class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Comment extends Dz_Model_Abstract {

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

    /**
     * Constructor
     *
     * @param int $id
     */
    public function __construct($id) {
        parent::__construct($id);
    }
}