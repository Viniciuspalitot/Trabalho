<?php
Class Tarefas extends Model{
    public function __construct()
    {
        parent::__construct("tarefas");
    }
    
    public function listar()
    {
        $todasastarefas = array();
        $sql = $this->db->prepare("SELECT * FROM tarefas");
        $sql->execute();
        if($sql->rowCount() > 0 ){
            $todasastarefas = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todasastarefas;
    }
    public function adicionar($titulo, $descricao = ""){
        $sql = $this->db->prepare("INSERT INTO tarefas SET titulo = :titulo, descricao = '{$descricao}' ");
        $sql->bindValue(":titulo", $titulo);
        $sql->execute();
    }
    public function pegarInformacao($id_tarefa)
    {
        $resultado = array();
        $sql = $this->db->prepare("SELECT * FROM tarefas WHERE id = :id");
        $sql->bindValue(":id", $id_tarefa);
        $sql->execute();
        if($sql->rowCount() > 0){
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $resultado;
    }

    public function remover($id) {
        $sql = $this->db->prepare("DELETE FROM tarefas WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
    
}