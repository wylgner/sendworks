<?php
namespace Sendworks\Util;

class Sessao {
    function __construct() {
        
    }
    function start(){
        return session_start();
    }
    
    function add($chave, $valor){
        $_SESSION['ez'][$chave] = $valor;
    }
    
    function get($chave){
        if(isset($_SESSION['ez'][$chave]))
            return $_SESSION['ez'][$chave];
        return '';
    }
    
    function rem($chave){
        if(isset($_SESSION['ez'][$chave]))
            session_unset($_SESSION['ez'][$chave]);
    }
    
    function del(){
        if(isset($_SESSION['ez']))
            session_unset($_SESSION['ez']);
        session_destroy();
        
    }
    
    function existe($chave){
        if(isset($_SESSION['ez'][$chave]))
            return true;
        return false;
        
    }
    
    function getAll(){
        return $_SESSION['ez'];
    }
}
