<?php

require_once dirname(__FILE__) . '/../vendor/autoload.php';

try {
    $search = new DeezerAPI\Search('eminem');

    $datas = $search->search();

    foreach ($datas as $data) {
        var_dump($data->title);
    }

    $album = new DeezerAPI\Models\Album(302127);
    var_dump($album->tracks);

} catch(Exception $e) {
    error_log($e->getMessage());
}

