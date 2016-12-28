<?php

/**
 * Search class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 */

namespace DeezerAPI;

use DeezerAPI\Models\Track;

class Search {

    const DEEZER_API_URL = 'https://api.deezer.com';

    /**
     * Possible connector value
     *
     * @var array
     */
    protected $_typesValues = array(
        'album',
        'artist'
    );

    /**
     * Possible order value
     *
     * @var array
     */
    protected $_orderValue = array(
        'RANKING',
        'TRACK_ASC',
        'TRACK_DESC',
        'ARTIST_ASC',
        'ARTIST_DESC',
        'ALBUM_ASC',
        'ALBUM_DESC',
        'RATING_ASC',
        'RATING_DESC',
        'DURATION_ASC',
        'DURATION_DESC',
    );

    /**
     * The query string to search
     *
     * @var string
     */
    protected $_query;

    /**
     * The type of search
     *
     * @var string
     */
    protected $_type;

    /**
     * The order
     *
     * @var string
     */
    protected $_order;

    /**
     * The result of the search
     *
     * @var array
     */
    protected $_results = array();

    /**
     * The amount of results
     *
     * @var int
     */
    protected $_limit;

    /**
     * Proceed to the next page ?
     *
     * @var boolean
     */
    protected $_gotoNextPage;


    /**
     * Constructor
     *
     * @param string $query
     * @param string $type
     * @param string $order
     * @param int    $limit
     * @param bool   $gotoNextPage
     *
     * @throws DeezerException
     */
    public function __construct($query, $type = null, $order = null, $limit=10, $gotoNextPage = true) {

        if($type && !in_array(strtolower($type), $this->_typesValues)) {
            throw new DeezerException($type . ' is not a valid search type');
        }

        if($order && !in_array(strtoupper($order), $this->_orderValue)) {
            throw new DeezerException($order . ' is not a valid order type');
        }

        $this->_query           = $query;
        $this->_order           = $order;
        $this->_type            = $type;
        $this->_limit           = $limit;
        $this->_gotoNextPage    = $gotoNextPage;
    }

    /**
     * Search an artist
     */
    public function searchArtist() {
        $this->_type = 'artist';
        return $this->search();
    }

    /**
     * Search an album
     */
    public function searchAlbum() {
        $this->_type = 'album';
        return $this->search();
    }


    /**
     * Basique search function
     * If no type specified it's search for tracks
     *
     * @return array
     */
    public function search() {
        $queryString = array(
            'q' => $this->_query,
            'limit' => $this->_limit
        );

        if (!$this->_order) {
            $queryString['order'] = $this->_order;
        }

        $url = self::DEEZER_API_URL . '/search/' . $this->_type . '?' . http_build_query($queryString);

        $this->_parse($url);

        return $this->_getAllDatas();
    }

    /**
     * Define the search order
     *
     * @param string
     */
    public function setOrder($order) {
        $this->_order = $order;
    }

    /**
     * Parse the search results
     *
     * @param string
     */
    protected function _parse($url) {
        $results = json_decode(file_get_contents($url));

        foreach ($results->data as $result) {
            array_push($this->_results, $result);
        }

        if (isset($results->next) && $this->_gotoNextPage === true) {
            $this->_parse($results->next);
        }

    }

    /**
     * Retrieve all datas from the search
     *
     * @return array
     */
    protected function _getAllDatas() {
        $datas = array();
        foreach ($this->_results as $result) {
            $class = 'DeezerAPI\Models\\' . ucfirst($result->type);
            $data = new $class($result);
            array_push($datas, $data);
        }
        return $datas;
    }
}
