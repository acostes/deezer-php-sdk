<?php

/**
 * Search class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Dz_Search
 * @category Dz
 */
class Dz_Search {

    protected $_typesValues = array(
        'album', 
        'artist'
    );

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

    protected $_query;

    protected $_type;

    protected $_order;

    protected $_results = array();


    public function __construct($query, $type = null, $order = null) {
        
        if($type && !in_array(strtolower($type), $this->_typesValues)) {
            throw new Dz_Exception($type . ' is not a valid search type');
        }

        if($order && !in_array(strtoupper($order), $this->_orderValue)) {
            throw new Dz_Exception($order . ' is not a valid order type');
        }

        $this->_query = $query;
        $this->_order = $order;

        if($type) {
            $this->_type = $type;
        } else {
            $this->_type = '';
        }
    }


    public function search() {
        $url = DEEZER_API_URL . '/search/' . $this->_type . '?q=' . $this->_query . '&order=' . $this->_order;

        $this->_parse($url);

        return $this->_getAllDatas();
    }

    protected function _parse($url) {
        $results = json_decode(file_get_contents($url));

        foreach ($results->data as $result) {
            array_push($this->_results, $result);
        }

        if (isset($results->next)) {
            $this->_parse($results->next);
        }

    }

    protected function _getAllDatas() {
        $datas = array();
        foreach ($this->_results as $result) {
            $class = ucfirst($result->type);
            $data = new $class($result);
            array_push($datas, $data);
        }
        return $datas;
    }
}
