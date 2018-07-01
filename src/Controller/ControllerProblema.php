<?php

namespace Sendworks\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sendworks\Entidades\Problema;
use Sendworks\Model\MProblema;
use Sendworks\Util\sessao;

class ControllerProblema {

    private $response;
    private $contexto;
    private $twig;
    private $sessao;

    public function __construct(Response $response, Request $contexto, Environment $twig, Sessao $sessao) {
        $this->response = $response;
        $this->contexto = $contexto;
        $this->twig = $twig;
        $this->sessao = $sessao;
    }

    public function show() {
        //if (!$this->sessao->existe('Usuario'))
        return $this->response->setContent($this->twig->render('cadastroProb.twig'));
        // else {
        //     $destino = '/login';
        //    $redirecionar = new RedirectResponse($destino);
        //    $redirecionar->send();
        // }
    }

    public function showProb(){
        $mProblema = new MProblema();
        $dados = $mProblema->listarProblemas();
        return $this->response->setContent($this->twig->render('problemas.twig',['dados' => $dados]));
    }

    public function cadastro() {
        //$cl = new ControllerLogin();
        // $cl->verifica();

        $titulo = $this->contexto->get('titulo');
        $entrada = $this->contexto->get('entrada');
        $saida = $this->contexto->get('saida');
        $enunciado = $this->contexto->get('enunciado');
       
        // depois de validado

        $prob = new Problema($titulo,$entrada,$saida,$enunciado, $this->sessao->get('id_usuario'));
        
        
        $mProblema = new MProblema();

        if ($mProblema->cadastrar($prob)) {
           return $this->response->setContent($this->twig->render('paginas/painel/principal.twig'));
        }
    }

}
