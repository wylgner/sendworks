<?php

namespace Sendworks;

require __DIR__.'/../vendor/autoload.php';
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

include 'rotas.php';
$contexto = new RequestContext();
$contexto->fromRequest(Request::createFromGlobals());
$response = Response::create();
$matcher = new UrlMatcher($rotas, $contexto);

try{
   $atributos = $matcher->match($contexto->getPathInfo());
   $controller = $atributos['_controller'];
   $method = $atributos['method'];
   $parametros = '';
   $obj = new $controller($response, $contexto);
   $obj->$method();
} catch (Exception $ex) {
    $response->setContent('NOT FOUND MOÇO', Response::HTTP_NOT_FOUND);
}

$response->send();
 