<?php

function getBase64($img){
    $path = $img;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    return $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
}