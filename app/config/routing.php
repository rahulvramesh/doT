<?php
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('bye', new Route('/bye'));