<?php

//classe criada para teste
namespace App\Models;
use MF\Model\Model;

class Produto extends Model{

    private $id;
    private $nomeProduto;
    private $quantidadeProduto;
    private $valorProduto;
    
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
                //metodo que salva bbanco de dados 
    public function salvar(){
            $query = "insert into produto(NOME,QUANTIDADE,VALOR) values (:nome,:quantidade,:valor)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nomeProduto'));
            $stmt->bindValue(':quantidade', $this->__get('quantidadeProduto'));
            $stmt->bindValue(':valor', $this->__get('valorProduto'));
            $stmt->execute();   
        return $this;
    }
    public function validarCadastroProduto(){
        $valido = true;
        if(strlen($this->__get('nomeProduto')) < 1){
            $valido = false;
        } if(strlen($this->__get('quantidadeProduto')) < 1){
            $valido = false;
        }if(strlen($this->__get('valorProduto')) < 1){
            $valido = false;
        }
    return $valido;
    }

    
    public function listarProduto(){

        $query = "select NOME, QUANTIDADE, VALOR from produto";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
            
}




?>
