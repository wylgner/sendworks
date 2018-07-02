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
        $modeloProb = new MProblema();

        $problemas = $modeloProb->listarProblemas();

        return $this->response->setContent($this->twig->render('/paginas/painel/problemas.twig', ['problemas' => $problemas]));
    }

    public function showProb() {

        return $this->response->setContent($this->twig->render('paginas/painel/problemas_add.twig'));
    }

    public function formProblemaAdd() {

        $modeloProb = new MProblema();

        $titulo = $this->contexto->get('titulo');
        $entrada = $this->contexto->get('entrada');
        $saida = $this->contexto->get('saida');
        $enunciado = $this->contexto->get('enunciado');
        $id = 0;

        if ($titulo != NULL && $entrada != NULL && $enunciado != NULL && $saida != NULL) {

            $prob = new Problema($id, $titulo, $entrada, $saida, $enunciado, $this->sessao->get('id_usuario'));
            if ($modeloProb->cadastrar($prob)) {
                echo '<script>location.href = "/problemas"</script>';
            }
        } else {
            echo '<script>alert("Preencha todos os dados!");</script>';
        }
    }

    public function problemas_add() {
        //$cl = new ControllerLogin();
        // $cl->verifica();

        $titulo = $this->contexto->get('titulo');
        $entrada = $this->contexto->get('entrada');
        $saida = $this->contexto->get('saida');
        $enunciado = $this->contexto->get('enunciado');

        // depois de validado
        $id = 0;
        $prob = new Problema($id, $titulo, $entrada, $saida, $enunciado, $this->sessao->get('id_usuario'));


        $mProblema = new MProblema();

        if ($mProblema->cadastrar($prob)) {
            return $this->response->setContent($this->twig->render('paginas/painel/principal.twig'));
        }
    }

    public function problemas_excluir() {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idUser = $uri_segments[3];
        $modeloProb = new MProblema();
        if ($modeloProb->excluir($idUser)) {
            $destino = '/problemas';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        } else {
            echo "<script>alert('Não deu certo!');</script>";
            $destino = '/problemas';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function problema_edit() {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idProb = $uri_segments[3];
        $modeloProb = new MProblema();
        $dadosProb = $modeloProb->getById($idProb);
        if ($dadosProb) {
            return $this->response->setContent($this->twig->render('paginas/painel/problemas_edit.twig', ['problemas' => $dadosProb]));
        } else {
            $destino = '/problemas';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function formProblemasEdit() {
        $modeloProb = new MProblema();

        $idUser = $this->contexto->get('idUser');
        $titulo = $this->contexto->get('titulo');
        $entrada = $this->contexto->get('entrada');
        $saida = $this->contexto->get('saida');
        $enunciado = $this->contexto->get('enunciado');
        if ($titulo != NULL && $entrada != NULL && $saida != NULL && $enunciado != NULL) {
            $prob = new Problema($idUser, $titulo, $entrada, $saida, $enunciado, $this->sessao->get('id_usuario'));


            if ($modeloProb->alterar($prob)) {
               echo '<script>location.href = "/problemas"</script>';
            }
        } else {
            echo '<script>alert("Preencha todos os dados!");</script>';
        }
    }

}
