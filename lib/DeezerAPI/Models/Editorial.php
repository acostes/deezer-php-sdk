<?php

/**
 * Editorial class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

class Editorial extends Base {

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
}