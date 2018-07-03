<?php

namespace Sendworks\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sendworks\Entidades\Resposta;
use Sendworks\Model\MResposta;
use Sendworks\Model\MProblema;
use Sendworks\Entidades\Problema;
use Sendworks\Util\sessao;

class ControllerResposta {

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
        $modeloResposta = new MResposta();

        $respostas = $modeloResposta->listarRespostas();

        return $this->response->setContent($this->twig->render('/paginas/painel/respostas.twig', ['respostas' => $respostas]));
    }

    public function algoritmo() {

        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idProb = $uri_segments[3];
        $modeloProb = new MProblema();
        $modeloResposta = new MResposta();
        $respostas = $modeloResposta->getById($idProb);
        echo '<pre>';
        print_r($respostas['algoritmo']);
    }

    public function respostas_algoritmo() {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idProb = $uri_segments[3];
        $idUser = $this->sessao->get('id');
        $algoritmo = $this->contexto->get('algoritmo');
        $data = date_create();
        $modeloProb = new MProblema();
        $resp = new Resposta();
        $resp->setAlgoritmo($algoritmo);
        $resp->setData($data->format('Y-m-d'));
        $resp->setId_problema($idProb);
        $resp->setId_usuario($idUser);
        $resposta = new MResposta();
        $resposta->cadastrar($resp);
        $modeloResposta = new MResposta();

        $respostas = $modeloResposta->listarRespostas();
        return $this->response->setContent($this->twig->render('/paginas/painel/respostas.twig', ['respostas' => $respostas]));
    }

    public function showResp() {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idProb = $uri_segments[3];
        $modeloResp = new MResposta();
        $dadosResp = $modeloResp->getById($idResp);

        return $this->response->setContent($this->twig->render('paginas/painel/problema_solo.twig', ['respostas' => $dadosResp]));
    }

    public function respostas_excluir() {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idUser = $uri_segments[3];
        $modeloResp = new MResposta();
        if ($modeloResp->excluir($idUser)) {
            $destino = '/respostas';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        } else {
            echo "<script>alert('Não deu certo!');</script>";
            $destino = '/respostas';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function resposta_edit() {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        $idProb = $uri_segments[3];
        $modeloResp = new MResposta();
        $dadosResp = $modeloResp->getById($idProb);


        if ($dadosResp) {
            return $this->response->setContent($this->twig->render('paginas/painel/respostas_edit.twig', ['resposta' => $dadosResp]));
        } else {
            $destino = '/respostas';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function formRespostaEdit() {
        $modeloResp = new MResposta();
        $idUser = $this->contexto->get('idUser');
        $algoritmo = $this->contexto->get('algoritmo');
        $data = date_create();

        if ($algoritmo != NULL) {
            $resp = new Resposta();
            $resp->setAlgoritmo($algoritmo);
            $resp->setId($idUser);
            $resp->setData($data->format('Y-m-d'));


            if ($modeloResp->alterar($resp)) {
                echo '<script>location.href = "/respostas"</script>';
            }
        } else {
            echo '<script>alert("Preencha todos os dados!");</script>';
        }
    }

}
