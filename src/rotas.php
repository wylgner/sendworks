<?php


use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$rotas = new RouteCollection();
$rotas->add('esporte',  new Route('/esporte', 
        array('_controller' => 'Sendworks\Controller\ControllerEsporte','method'=> 'twigAqui'))
      );
$rotas->add('produtos', new Route('/produtos', 
        array('_controller' => 'Sendworks\Controller\ControllerEsporte','method'=> 'listaProdutos')));

return $rotas;