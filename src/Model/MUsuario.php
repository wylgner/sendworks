<?php

namespace Sendworks\Model;

use Sendworks\Util\Conexao;
use Sendworks\Entidades\Usuario;
use PDO;

class MUsuario {

    function __construct() {
        
    }

    function listarUsuarios() {
        try {
            $sql = 'select * from usuario';
            $ps = Conexao::getInstancia()->prepare($sql);
            $ps->execute();
            return $ps->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    function cadastrar(Usuario $user) {
        try {

            $sql = 'insert into usuario (nome, sobrenome, username, senha) values(:nome, :sobrenome, :username, :senha)';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':nome', $user->getNome());
            $p_sql->bindValue(':sobrenome', $user->getSobrenome());
            $p_sql->bindValue(':username', $user->getUsername());
            $p_sql->bindValue(':senha', $user->getSenha());
            if ($p_sql->execute())
                return Conexao::getInstancia()->lastInsertId();
            return null;
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    function excluir(Usuario $user) {
        try {
            $sql = 'delete usuario where id = :id';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $user->getId());
            $ps->execute();
            return $ps->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    function alterar(Usuario $user) {
        try {
            $sql = 'update usuario set nome = :nome, sobrenome = :sobrenome, username = :username, senha = :senha where id = :id';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $user->getId());
            $p_sql->bindValue(':nome', $user->getNome());
            $p_sql->bindValue(':sobrenome', $user->getSobrenome());
            $p_sql->bindValue(':username', $user->getUsername());
            $p_sql->bindValue(':senha', $user->getSenha());
            $ps->execute();
            return $ps->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    function ler(Usuario $user) {
    
        try {
            $sql = 'select * from usuario where username = :username and senha = :senha';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':username', $user->getUsername());
            $p_sql->bindValue(':senha', $user->getSenha());
            $p_sql->execute();

            $valid = $p_sql->fetchColumn();
            return $valid;
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

}
