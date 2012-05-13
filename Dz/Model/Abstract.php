<?php

/**
 * Abstract model class for Deezer API
 *
 * @author Arnaud COSTES <arnaud.costes@gmail.com>
 * @package Dz_Model_Abstract
 * @category Dz
 */
abstract class Dz_Model_Abstract {

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
     *
     * @param int $id
     */
    protected function __construct($id) {
        if(!is_numeric($id)) {
            throw new Dz_Exception('The first args of the class ' . get_called_class() . ' must be numeric');
        }

        $this->id = $id;
        $this->_get();
        $this->_init();
    }

    protected function _init() {
        $this->id = $this->_data->id;

        foreach ($this->_data as $key => $value) {
            $this->$key = $value;
        }
    }

    protected function _get() {
        $this->_data = json_decode(file_get_contents(DEEZER_API_URL . '/' . strtolower(get_called_class()) . '/' . $this->id));
    }

    public function getId() {
        return $this->id;
    }

    protected function _getConnection($type, $url = null) {
        if (!in_array($type, $this->_connectionsType)) {
            throw new Dz_Exception($type . ' is not a valid connections type for ' . get_called_class());
        }

        $this->_connectionData = array();

        $this->_retrieveConnectionData($type, $url);

        return $this->_connectionData;
    }

    private function _retrieveConnectionData($type, $url) {
        if (!$url) {
            $url = DEEZER_API_URL . '/' . strtolower(get_called_class()) . '/' . $this->id . '/' . strtolower($type);
        }

        $results = json_decode(file_get_contents($url));

        foreach ($results->data as $result) {
            array_push($this->_connectionData, $result); 
        }

        if (isset($results->next)) {
            $this->_retrieveConnectionData($type, $results->next);
        }
    }

    /**
     * Get a list of comments for the current Model
     *
     * @return array of Comment objects
     */
    public function getComments() {
        $this->comments = $this->_getConnection('comments');
        return $this->comments; 
    }

    /**
     * Get a list of Model's fans
     *
     * @return array of User objects
     */ 
    public function getFans() {
        $this->fans = $this->_getConnection('fans');
        return $this->fans; 
    }

    /**
     * Get a list of Model's tracks
     *
     * @return array of Tracks objects
     */ 
    public function getTracks() {
        $this->tracks = $this->_getConnection('tracks');
        return $this->tracks; 
    }

    /**
     * Get a list of Model's top
     *
     * @return array of Tracks objects
     */ 
    public function getTop() {
        $this->top = $this->_getConnection('top');
        return $this->top; 
    }

    /**
     * Get a list of Model's related
     *
     * @return array of Artist objects
     */ 
    public function getRelated() {
        $this->related = $this->_getConnection('related');
        return $this->related; 
    }

    /**
     * Get a list of Model's radio
     *
     * @return array of Artist objects
     */ 
    public function getRadio() {
        $this->radio = $this->_getConnection('radio');
        return $this->radio; 
    }

    /**
     * Get a list of Model's favorite radios
     *
     * @return array of Radio objects
     */ 
    public function getRadios() {
        $this->radios = $this->_getConnection('radios');
        return $this->radios; 
    }

    /**
     * Get a list of Model's album
     *
     * @return array of Album objects
     */ 
    public function getAlbums() {
        $this->albums = $this->_getConnection('albums');
        return $this->albums; 
    }

    /**
     * Get a list of albums selected every week by the Deezer Team
     *
     * @return array of Album objects
     */ 
    public function getSelection() {
        $this->selection = $this->_getConnection('selection');
        return $this->selection; 
    }

    /**
     * Get charts. This method returns three lists : Top track, Top album and Top artist.
     *
     * @return array of Album objects
     */ 
    public function getCharts() {
        $this->charts = $this->_getConnection('charts');
        return $this->charts; 
    }

    /**
     * Get a list of radio splitted by genre
     *
     * @return array of Radio objects
     */ 
    public function getGenres() {
        $this->genres = $this->_getConnection('genres');
        return $this->genres; 
    }

    /**
     * Get a list of Model's Folder
     *
     * @return array of Folder objects
     */ 
    public function getFolders() {
        $this->folders = $this->_getConnection('folders');
        return $this->folders; 
    }

    /**
     * Get a list of Model's followings
     *
     * @return array of User objects
     */ 
    public function getFollowings() {
        $this->followings = $this->_getConnection('followings');
        return $this->followings; 
    }

    /**
     * Get a list of Model's followers
     *
     * @return array of User objects
     */ 
    public function getFollowers() {
        $this->followers = $this->_getConnection('followers');
        return $this->followers; 
    }

    /**
     * Get a list of Model's permissions
     *
     * @return an object of type variable
     */ 
    public function getPermissions() {
        return null;
    }

    /**
     * Get a list of Model's permissions
     *
     * @return an object of type variable
     */ 
    public function getPersonalSongs() {
        return null;
    }

    /**
     * Get a list of Model's items
     *
     * @return an object of type variable
     */ 
    public function getItems() {
        return null;
    }

    /**
     * Get a list of Model's public playlist
     *
     * @return array of Playlist objects
     */ 
    public function getPlaylists() {
        $this->playlists = $this->_getConnection('playlists');
        return $this->playlists; 
    }
}