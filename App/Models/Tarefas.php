<?php
Class Tarefas extends Model{
    public function __construct()
    {
        parent::__construct("tarefas");
    }
    
    public function listar()
    {
        $todasastarefas = array();
        $sql = $this->db->prepare("SELECT Tarefas.id, Tarefas.titulo, Tarefas.descricao, Tarefas.situacao, (SELECT nome FROM Categorias WHERE Categorias.id = Tarefas.id_categoria) AS nome_categoria, Tarefas.data_criacao, Tarefas.data_atualizacao FROM Tarefas;");
        $sql->execute();
        if($sql->rowCount() > 0 ){
            $todasastarefas = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $todasastarefas;
    }
    public function adicionar($titulo, $descricao = "", $situacao, $id_categoria){
        $sql = $this->db->prepare("INSERT INTO tarefas (titulo, descricao, situacao, id_categoria) VALUES (:titulo, :descricao, :situacao, :id_categoria)");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":situacao", $situacao);
        $sql->bindValue(":id_categoria", $id_categoria);
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

    public function editar($id_tarefa, $titulo, $descricao, $situacao, $id_categoria) {
        $sql = $this->db->prepare("UPDATE tarefas SET titulo = :titulo, descricao = :descricao, situacao = :situacao, id_categoria = :id_categoria WHERE id = :id_tarefa");
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":situacao", $situacao);
        $sql->bindValue(":id_categoria", $id_categoria);
        $sql->bindValue(":id_tarefa", $id_tarefa);
        $sql->execute();
    }
    
    

    public function remover($id) {
        $sql = $this->db->prepare("DELETE FROM tarefas WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
    
}