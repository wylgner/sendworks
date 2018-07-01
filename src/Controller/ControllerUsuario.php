<?php

namespace Sendworks\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sendworks\Entidades\Usuario;
use Sendworks\Model\MUsuario;
use Sendworks\Util\sessao;

class ControllerUsuario {

    private $response;
    private $contexto;
    private $twig;
    private $sessao;

    public function __construct(Response $response, Request $contexto, Environment $twig, Sessao $sessao) {
        $this->response = $response;
        $this->contexto = $contexto;
        $this->twig = $twig;
        $this->sessao = $sessao;
        $this->verificaLogin();
    }

    public function verificaLogin() {
        if (!$this->sessao->existe('username')) {
            $destino = '/login';
            $redirecionar = new RedirectResponse($destino);
            $redirecionar->send();
        }
    }

    public function show() {
        $modeloUser = new MUsuario();

        $usuarios = $modeloUser->listarUsuarios();

        return $this->response->setContent($this->twig->render('paginas/painel/usuarios.twig', ['usuarios' => $usuarios]));
    }

    public function usuarios_add() {
        return $this->response->setContent($this->twig->render('paginas/painel/usuarios_add.twig'));
    }
    
    public function usuarios_edit() {
        $id = TRUE;
        
        return $this->response->setContent($this->twig->render('paginas/painel/usuarios_edit.twig'));
    }

    public function formUsuariosAdd() {
        $modeloUser = new MUsuario();

        $nome = $this->contexto->get('nome');
        $sobrenome = $this->contexto->get('sobrenome');
        $username = $this->contexto->get('username');
        $senha = $this->contexto->get('senha');
        $confirmaSenha = $this->contexto->get('confirmaSenha');

        if ($nome != NULL && $sobrenome != NULL && $username != NULL && $senha != NULL && $confirmaSenha != NULL) {
            if ($senha == $confirmaSenha) {
                $user = new Usuario();
                $user->setNome($nome);
                $user->setSobrenome($sobrenome);
                $user->setUsername($username);
                $user->setSenha(md5($senha));

                if ($modeloUser->cadastrar($user)) {
                    echo '<script>location.href = "/usuarios"</script>';
                }
            } else {
                echo '<script>alert("As senhas devem ser iguais!");</script>';
            }
        } else {
            echo '<script>alert("Preencha todos os dados!");</script>';
        }
    }

}
