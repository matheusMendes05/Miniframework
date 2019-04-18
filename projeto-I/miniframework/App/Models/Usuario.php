<?php

//classe criada para teste
namespace App\Models;
use MF\Model\Model;

class Usuario extends Model{

    private $id;
    private $nome;
    private $email;
    private $senha;
    
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
                //metodo que salva
    public function salvar(){
            $query = "insert into pessoa(NOME,EMAIL,SENHA) values (:nome,:email,:senha)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', $this->__get('senha'));
            $stmt->execute();
            
        return $this;
    }
                //metodo que valida dados do usuario
    public function validarCadastro(){
        $valido = true;
            if(strlen($this->__get('nome')) < 3){
                $valido = false;
            }
            if(strlen($this->__get('email')) < 3){
                $valido = false;
            }
            if(strlen($this->__get('senha')) < 3){
                $valido = false;
            }

        return $valido;
    }
    //recuperar um usuario por email
    public function getUsuarioPorEmail(){
            $query = "select nome, email from pessoa where email = :email";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }



    //teste
    public function validarLogin(){
        session_start();

        $valido = true;

        $query = "select nome, email from pessoa where email = :email senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));

        $stmt->execute();

        return ;

    }

// metodo que faz a autenticacao do usuario
    public function autenticar(){

            $query = "select id, nome, email from pessoa where email = :email and senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha',$this->__get('senha'));
        $stmt->execute();

        $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if($usuario['id'] != '' && $usuario['nome'] != ''){
            $this->__set('id', $usuario['id']);
            $this->__set('nome', $usuario['nome']);
        }
        return $this;
        }
}




?>
