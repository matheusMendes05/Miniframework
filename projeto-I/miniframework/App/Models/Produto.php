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
            $query = "insert into produto(NOME,QUANTIDADE,VALOR) values (:nome,:email,:senha)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nomeProduto', $this->__get('nome'));
            $stmt->bindValue(':quantidadeProduto', $this->__get('quantidade'));
            $stmt->bindValue(':valorProduto', $this->__get('valor'));
            $stmt->execute();
            
        return $this;
    }
            
}




?>
