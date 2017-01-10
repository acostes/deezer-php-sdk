<?php

/**
 * PHP library for using Deezzer API
 *
 * (c) Arnaud Costes <arnaud.costes@gmail.com>
 *
 * MIT License
 */

namespace DeezerAPI\Models;

use DeezerAPI\Search;
use DeezerAPI\DeezerException;

/**
 * Abstract model class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */
abstract class Base
{

    /**
     * The data
     *
     * @var array
     */
    protected $data;

    /**
     * The object copy
     *
     * @var object
     */
    protected $connectionData = array();

    /**
     * Model connections type
     *
     * @var array
     */
    protected $connectionsType = array();

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
    public function __construct($param)
    {
        if (!is_numeric($param) && !is_object($param)) {
            throw new DeezerException('Argument of the class ' . get_called_class() . ' must be numeric or an object');
        }

        if (is_object($param)) {
            if (empty($param->type) || ('DeezerAPI\Models\\' . ucfirst($param->type) != get_called_class())) {
                throw new DeezerException('The object must be of the type ' . get_called_class());
            }

            $this->data = $param;

        } elseif (is_numeric($param)) {
            $this->id = $param;
            $this->get();
        }

        $this->init();
    }

    /**
     * Initialize the variable
     */
    protected function init()
    {
        if (isset($this->data->error)) {
            throw new DeezerException($this->data->error->message, $this->data->error->code);
        }

        foreach ($this->data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Make a request to the API to get the object
     */
    protected function get()
    {
        $class = explode('\\', get_called_class());
        $class = end($class);
        $url = Search::DEEZER_API_URL . '/' . strtolower($class) . '/' . $this->id;
        $this->data = json_decode(file_get_contents($url));
    }

    /**
     * Return the id of the Abstract Object
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Retrieve data by using the allowed connector
     *
     * @param string
     */
    protected function getConnection($type)
    {
        if (!in_array($type, $this->connectionsType)) {
            throw new DeezerException($type . ' is not a valid connections type for ' . get_called_class());
        }

        $this->connectionData = array();
        $class = explode('\\', get_called_class());

        $url = Search::DEEZER_API_URL . '/' . strtolower(end($class)) . '/' . $this->id . '/' . strtolower($type);

        $this->retrieveConnectionData($url);

        return $this->connectionData;
    }

    /**
     * Usefull to retrieve data of multiple page
     *
     * @param string
     */
    private function retrieveConnectionData($url)
    {

        $results = json_decode(file_get_contents($url));

        foreach ($results->data as $result) {
            array_push($this->connectionData, $result);
        }

        if (isset($results->next)) {
            $this->retrieveConnectionData($results->next);
        }
    }

    /**
     * Magic get
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (!in_array($name, $this->connectionsType)) {
            throw new DeezerException('Unsupported operation: ' . $name);
        }

        return $this->getConnection($name);
    }
}
