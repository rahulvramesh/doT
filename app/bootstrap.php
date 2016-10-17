<?php

require_once __DIR__ . '/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

/**
 * Error handler
 */
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/config/routing.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\UrlMatcher($routes, $context);
$resolver = new HttpKernel\Controller\ControllerResolver();

$framework = new Dot\Core\Framework($matcher, $resolver);
$response = $framework->handle($request);