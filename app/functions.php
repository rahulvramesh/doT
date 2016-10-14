<?php 

use Symfony\Component\HttpFoundation\Response;

function render_template($request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();
    include sprintf(__DIR__.'/code/pages/%s.php', $_route);

    return new Symfony\Component\HttpFoundation\Response(ob_get_clean());
}