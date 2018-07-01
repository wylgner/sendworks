<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$rotas = new RouteCollection();
$rotas->add('esporte', new Route('/esporte', array('_controller' => 'Sendworks\Controller\ControllerEsporte', 'method' => 'twigAqui'))
);
$rotas->add('produtos', new Route('/produtos', array('_controller' => 'Sendworks\Controller\ControllerEsporte', 'method' => 'listaProdutos')));
$rotas->add('cadastro', new Route('/cadastro', array('_controller' => 'Sendworks\Controller\ControllerCadastro', 'method' => 'cadastro')));
$rotas->add('FormCadastro', new Route('/formularioCadastro', array('_controller' => 'Sendworks\Controller\ControllerCadastro', 'method' => 'show')));
$rotas->add('login', new Route('/login', array('_controller' => 'Sendworks\Controller\ControllerLogin', 'method' => 'show')));
$rotas->add('logando', new Route('/acLogar', array('_controller' => 'Sendworks\Controller\ControllerLogin', 'method' => 'login')));
$rotas->add('CadastroEfetuado', new Route('/CadastroEfetuado', array('_controller' => 'Sendworks\Controller\ControllerCadastro', 'method' => 'ok')));
$rotas->add('logoff', new Route('/logoff', array('_controller' => 'Sendworks\Controller\ControllerLogin', 'method' => 'logoff')));
$rotas->add('ProbShow', new Route('/cadastroProb', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'show')));
$rotas->add('acProb', new Route('/acProb', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'cadastro')));
$rotas->add('showProb', new Route('/showProb', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'showProb')));
$rotas->add('index', new Route('/', array('_controller' => 'Sendworks\Controller\ControllerLogin', 'method' => 'show')));


$rotas->add('Principal', new Route('/principal', array('_controller' => 'Sendworks\Controller\ControllerLogin', 'method' => 'showLog')));
$rotas->add('Tratamento Form Perfil', new Route('/formPerfil', array('_controller' => 'Sendworks\Controller\ControllerCadastro', 'method' => 'formPerfil')));
// Usuários
$rotas->add('Usuarios', new Route('/usuarios', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'show')));
$rotas->add('Usuarios Adicionar', new Route('/usuarios/usuarios_add', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'usuarios_add')));
$rotas->add('Usuarios Adicionar Formulario', new Route('/formUsuariosAdd', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'formUsuariosAdd')));
$rotas->add('Usuarios Editar', new Route('/usuarios/usuarios_edit/{suffix}', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'usuarios_edit', 'suffix' => '3')));

return $rotas;
