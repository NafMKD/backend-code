<?php

include __DIR__.'/vendor/autoload.php';

$f = $_GET['file'] ?? null;
$s = $_GET['target'] ?? null;

if(! isset($_GET['file'])){
    echo 'Invalid API Endpoint!';
    exit;
}

$filename = __DIR__.'/xhr/'.$_GET['file'].'.php';

if(! file_exists($filename)){
    echo 'Invalid API Endpoint!';
    exit;
}

require_once $filename;