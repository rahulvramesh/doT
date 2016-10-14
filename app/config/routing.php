<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('hello', new Symfony\Component\Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        return render_template($request);
    }
)));