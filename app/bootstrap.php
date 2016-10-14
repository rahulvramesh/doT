<?php
require_once __DIR__ . '/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

/* Create routes... */
$map = array(
    '/hello' => __DIR__.'/code/Msl/Static/view/hello.php'
);

/* Handle the request and create the response */
$path = $request->getPathInfo();


if (isset($map[$path])) {
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response = new Response('Not found', 404);
}
