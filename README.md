Deezer API SDK for PHP
======================

[![Build pass](https://img.shields.io/travis/acostes/deezer-php-sdk/master.svg?style=flat-square)](https://travis-ci.org/acostes/deezer-php-sdk?branch=master)

Overview
--------
This SDK contains wrapper code used to call the Deezer API from PHP. You can find the documentation of the API here http://developers.deezer.com/api

The SDK also contains. The code in sample/ demonstrates the basic use of the SDK for search artists or albums on the DeezerAPI.

Getting Started
---------------

Package available Composer. Autoloading is PSR-0 compatible.


How to use
----------
```php
<?php
    use DeezerAPI\Search;
    use DeezerAPI\Models\Album;

    $search = new DeezerAPI\Search('eminem');
    $data = $search->search();

    foreach ($data as $album) {
        echo $album->title . "\n";
    }

    $album = new DeezerAPI\Models\Album(302127);
    foreach ($album->tracks->data as $track) {
        echo $track->title . "\n";
    }
```
