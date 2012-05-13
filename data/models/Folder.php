<?php

/**
 * Folder class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Folder extends Dz_Model_Abstract {

    /**
     * The folder's title
     *
     * @var string
     */
    public $artist;

    /**
     * user object containing : id
     *
     * @var object
     */
    public $creator;

    /**
     * Folder connections type
     *
     * @var array
     */
    protected $_connectionsType = array(
        'items', 
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