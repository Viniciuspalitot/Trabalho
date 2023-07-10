<?php
Class Categorias extends Model{
    public function __construct()
    {
        parent::__construct("categorias");
    }
    
    public function listar()
    {
        $todasascategorias = array();
        $sql = $this->db->prepare("select * from categorias;");
        $sql->execute();
        if($sql->rowCount() > 0 ){
            $todasascategorias = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todasascategorias;
    }
    public function adicionar($nome){
        $sql = $this->db->prepare("INSERT INTO categorias (nome) VALUES (:nome)");
        $sql->bindValue(":nome", $nome);
        $sql->execute();
    }
    
    public function pegarInformacao($id_categoria)
    {
        $resultado = array();
        $sql = $this->db->prepare("SELECT * FROM categorias WHERE id = :id");
        $sql->bindValue(":id", $id_categoria);
        $sql->execute();
        if($sql->rowCount() > 0){
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $resultado;
    }

    public function editar($nome, $id_categoria){
        $sql = $this->db->prepare("UPDATE categorias SET nome = :nome WHERE id = :id_categoria");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->execute();
    }
    
    
    public function remover($id) {
        $sql = $this->db->prepare("DELETE FROM categorias WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
    
}