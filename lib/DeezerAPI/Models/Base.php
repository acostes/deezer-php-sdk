<?php

/**
 * Abstract model class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI\Models;

use DeezerAPI\Search;
use DeezerAPI\DeezerException;

abstract class Base {

    /**
     * The data 
     *
     * @var array
     */
    protected $_data;

    /**
     * The object copy 
     *
     * @var object
     */
    protected $_connectionData = array();

    /**
     * Model connections type
     *
     * @var array
     */
    protected $_connectionsType = array();

    /**
     * The deezer id
     *
     * @var int
     */
    public $id;


    /**
     * Constructor
     * You can construct an object by passing an integer
     * In that case it makes a request to the API
     * You also can put an object that will be copy
     *
     * @param int/object $param
     */
    public function __construct($param) {
        if(!is_numeric($param) && !is_object($param)) {
            throw new DeezerException('The first args of the class ' . get_called_class() . ' must be numeric or an object');
        }

        if (is_object($param)) {
            if ('DeezerAPI\Models\\' . ucfirst($param->type) != get_called_class()) {
                throw new DeezerException('The object must be of the type ' . get_called_class());
            } 

            $this->_data = $param;

        } elseif (is_numeric($param)) {
            $this->id = $param;
            $this->_get();
        }

        $this->_init();
    }

    /**
     * Initialize the variable 
     */
    protected function _init() {
        foreach ($this->_data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Make a request to the API to get the object
     */
    protected function _get() {
        $this->_data = json_decode(file_get_contents(Search::DEEZER_API_URL . '/' . strtolower(get_called_class()) . '/' . $this->id));
    }

    /**
     * Return the id of the Abstract Object 
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Retrieve data by using the allowed connector 
     *
     * @param string
     */
    protected function _getConnection($type) {
        if (!in_array($type, $this->_connectionsType)) {
            throw new DeezerException($type . ' is not a valid connections type for ' . get_called_class());
        }

        $this->_connectionData = array();
        $class = explode('\\', get_called_class());

        $url = Search::DEEZER_API_URL . '/' . strtolower(end($class)) . '/' . $this->id . '/' . strtolower($type);

        $this->_retrieveConnectionData($url);

        return $this->_connectionData;
    }

    /**
     * Usefull to retrieve data of multiple page
     *
     * @param string
     */
    private function _retrieveConnectionData($url) {

        $results = json_decode(file_get_contents($url));

        foreach ($results->data as $result) {
            array_push($this->_connectionData, $result); 
        }

        if (isset($results->next)) {
            $this->_retrieveConnectionData($type, $results->next);
        }
    }

    /**
     * Magic get
     *
     * @return mixed
     */
    public function __get($name) {
        var_dump($name);
        if (!in_array($name, $this->_connectionsType)) {
            throw new DeezerException('Unsupported operation: ' . $name);
        }
        $result = $this->_getConnection($name);
        return $result;
    }
}