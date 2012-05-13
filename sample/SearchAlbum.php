<?php

require_once dirname(__FILE__) . '/../deezer.php';

try {

    $search = new Dz_Search('eminem', 'artist');

    $datas = $search->search();

    foreach ($datas as $data) {
        var_dump($data->name);
    }

} catch(Exception $e) {
    error_log($e->getMessage());
}

