<?php

namespace Sendworks\Model;

use Sendworks\Util\Conexao;
use Sendworks\Entidades\Resposta;
use PDO;

class MResposta {

    function __construct() {
        
    }

    function listarRespostas() {
        try {
            $sql = 'select * from resposta';
            $ps = Conexao::getInstancia()->prepare($sql);
            $ps->execute();
            return $ps->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }
    

    function cadastrar(Resposta $resp) {
        try {

            $sql = 'insert into resposta (algoritmo, data, id_usuario, id_problema) values(:algoritmo, :data, :id_usuario, :id_problema)';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':algoritmo', $resp->getAlgoritmo());
            $p_sql->bindValue(':data', $resp->getData());
            $p_sql->bindValue(':id_usuario', $resp->getId_usuario());
            $p_sql->bindValue(':id_problema', $resp->getId_problema());
            if ($p_sql->execute())
                return Conexao::getInstancia()->lastInsertId();
            return null;
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    function excluir($idResp) {
        try {
            $sql = 'delete from resposta where id = :id';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $idResp);
            $p_sql->execute();
            return TRUE;
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    function alterar(Resposta $resp) {
        try {
            $sql = 'update resposta set algoritmo = :algoritmo, data = :data where id = :id';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $resp->getId());
            $p_sql->bindValue(':algoritmo', $resp->getAlgoritmo());
            $p_sql->bindValue(':data', $resp->getData());
            $p_sql->execute();
            return TRUE;
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }
     function setData(Resposta $resp) {
        try {
            $sql = 'update resposta set data = now() where id = :id';
            $p_sql = Conexao::getInstancia()->prepare($sql);
            $p_sql->bindValue(':id', $resp->getId());
            $p_sql->execute();
            return TRUE;
        } catch (Exception $ex) {
            return 'Erro na conexão:' . $ex;
        }
    }

    


    function getById($id) {
        try {
            $sql = "select * from resposta where id = :id";
            $p_sql = (Conexao::getInstancia()->prepare($sql));
            $p_sql->bindValue(':id', $id);
            $p_sql->execute();
            return $p_sql->fetch();
        } catch (Exception $ex) {
            return 'erro em pegar' . $ex;
        }
    }

}

