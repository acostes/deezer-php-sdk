Deezer API SDK for PHP
======================

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
  $search = new DeezerAPI\Search('eminem');
  $datas = $search->search();

  foreach ($datas as $data) {
      var_dump($data->title);
  }

  $album = new DeezerAPI\Models\Album(302127);
  var_dump($album->tracks);
```
