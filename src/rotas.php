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

$rotas->add('principal', new Route('/principal', array('_controller' => 'Sendworks\Controller\ControllerLogin', 'method' => 'showLog')));
$rotas->add('tratamento_form_perfil', new Route('/formPerfil', array('_controller' => 'Sendworks\Controller\ControllerCadastro', 'method' => 'formPerfil')));
// Usuários

$rotas->add('FormCadastrolog', new Route('/formularioCadastrolog', array('_controller' => 'Sendworks\Controller\ControllerCadastro', 'method' => 'show2')));

$rotas->add('usuarios', new Route('/usuarios', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'show')));
$rotas->add('usuarios_adicionar', new Route('/usuarios/usuarios_add', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'usuarios_add')));
$rotas->add('usuarios_adicionar_formulario', new Route('/formUsuariosAdd', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'formUsuariosAdd')));
$rotas->add('usuarios_editar', new Route('/usuarios/usuarios_edit/{page}', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'usuarios_edit', 'page' => 1)));
$rotas->add('usuarios_editar_formulario', new Route('/formUsuariosEdit', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'formUsuariosEdit')));
$rotas->add('usuarios_excluir', new Route('/usuarios/usuarios_excluir/{page}', array('_controller' => 'Sendworks\Controller\ControllerUsuario', 'method' => 'usuarios_excluir', 'page' => 1)));

// Problemas
$rotas->add('problemas', new Route('/problemas', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'show')));
$rotas->add('problemas_add', new Route('/problemas/adicionar', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'showProb')));
$rotas->add('problemas_adicionar', new Route('/problemas/problemas_add', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'formProblemaAdd')));
$rotas->add('problemas_adicionar_formulario', new Route('/problemas/problemas_edit/{page}', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'problema_edit', 'page' => 1)));
$rotas->add('problemas_editar', new Route('/problemas/problemas_edit/{page}', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'problemas_edit', 'page' => 1)));
$rotas->add('problemas_editar_formulario', new Route('/formProblemasEdit', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'formProblemasEdit')));
$rotas->add('problemas_excluir', new Route('/problemas/problemas_excluir/{page}', array('_controller' => 'Sendworks\Controller\ControllerProblema', 'method' => 'problemas_excluir', 'page' => 1)));

// Respostas
$rotas->add('respostas', new Route('/respostas', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'show')));
$rotas->add('respostas_add', new Route('/respostas/adicionar', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'showResp')));
$rotas->add('respostas_adicionar', new Route('/respostas/respostas_add', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'formRespostaAdd')));
$rotas->add('respostas_adicionar_formulario', new Route('/respostas/respostas_edit/{page}', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'resposta_edit', 'page' => 1)));
$rotas->add('respostas_editar', new Route('/respostas/respostas_edit/{page}', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'resposta_edit', 'page' => 1)));
$rotas->add('respostas_editar_formulario', new Route('/formRespostasEdit', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'formRespostaEdit')));
$rotas->add('respostas_excluir', new Route('/respostas/respostas_excluir/{page}', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'respostas_excluir', 'page' => 1)));
$rotas->add('respostas_algoritmo', new Route('/resposta/algoritmo/{page}', array('_controller' => 'Sendworks\Controller\ControllerResposta', 'method' => 'respostas_algoritmo', 'page' => 1)));
return $rotas;
