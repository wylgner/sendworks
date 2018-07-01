<?php

namespace Sendworks\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sendworks\Entidades\Usuario;
use Sendworks\Model\MUsuario;
use Sendworks\Util\sessao;

class ControllerLogin {

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

    public function verificaLogin() {
        if (!$this->sessao->existe('username')) {
            $destino = '/login';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function show() {
        return $this->response->setContent($this->twig->render('paginas/login.twig'));
    }

    public function showLog() {
        $this->verificaLogin();
        if ($this->sessao->existe('username')) {
            $modeloUser = new MUsuario();
            $dados = $modeloUser->getById($this->sessao->get('id'));
            return $this->response->setContent($this->twig->render('paginas/painel/principal.twig', ['dados' => $dados]));
        } else {
            $destino = '/login';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function logoff() {
        $this->sessao->del();
        $redirecionar = new RedirectResponse('/login');
        $redirecionar->send();
    }

    public function login() {
        // Constante com a quantidade de tentativas aceitas
        define('TENTATIVAS_ACEITAS', 5);

        // Constante com a quantidade minutos para bloqueio
        define('MINUTOS_BLOQUEIO', 30);
        $username = $this->contexto->get('username');
        $senha = $this->contexto->get('senha');
        $User = new Usuario();
        $User->setUsername($username);
        $senha = md5($senha);
        $User->setSenha($senha);
        $mUser = new MUsuario();
        //$result = $mUser->ler($User);
        $t1 = $mUser->ler($User);
        if ($t1) {
            $t2 = $mUser->pegarId($username);
            $this->sessao->add('username', $User->getUsername());
            $this->sessao->add('id', $t2['id']);
            $this->sessao->add('nome', $t2['nome']);
            $this->sessao->add('sobrenome', $t2['sobrenome']);
            // $this->sessao->add('senha', $User->getSenha());
            // echo 'logado';
            echo '<script>location.href = "principal"</script>';
//            $response = new RedirectResponse('//logado');
//            $response->send();
        } else {
            echo 'nao logado';
        }

        if ($this->sessao->existe('ez')) {
            echo json_encode($_SESSION);
            exit();
        }
    }

}
