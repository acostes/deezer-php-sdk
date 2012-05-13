<?php

/**
 * Editorial class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Model
 */
class Editorial extends Dz_Model_Abstract {

    /**
     * The editorial's name
     *
     * @var string
     */
    public $name;

    /**
     * Editorial connections type
     *
     * @var array
     */
    protected $_connectionsType = array(
        'selection', 
        'charts', 
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