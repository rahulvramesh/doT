<?php
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config/routing.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
/**
 * Error handler
 */
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$request = Request::createFromGlobals();
$response = new Response();

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

try {
     $request->attributes->add($matcher->match($request->getPathInfo()));
     $response = call_user_func($request->attributes->get('_controller'), $request);
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
	 throw new Exception($e->getMessage());
}
