<?php

/**
 * Radio class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Radio extends Dz_Model_Abstract {

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
    protected $_connectionsType = array(
        'genre', 
        'top', 
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