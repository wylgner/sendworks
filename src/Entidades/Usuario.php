<?php

namespace Sendworks\Entidades;

class Usuario {

    private $id;
    private $nome;
    private $sobrenome;
    private $username;
    private $senha;
    private $cargo;

//    function __construct($nome, $sobrenome, $username, $senha) {
//        $this->nome = $nome;
//        $this->sobrenome = $sobrenome;
//        $this->username = $username;
//        $this->senha = $senha;
//    }
    
    function __construct() {
     
    }
    function getCargo() {
        return $this->cargo;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

        function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getUsername() {
        return $this->username;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }
    
    function setId($id) {
        $this->id = $id;
    }



}
