<?php
Class TarefasController extends Controller{
    private $data = array();

    public function index(){

        $tarefas = new Tarefas();
        $this->data["tarefas"] = $tarefas->listar();
        
        $this->loadTemplate("Tarefas/index", $this->data);
    }
    public function adicionar()
    {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        if($post){
            $tarefas = new Tarefas();
            $titulo = addslashes($post["titulo"]);
            $descricao = addslashes($post["descricao"]);
            $tarefas->adicionar($titulo, $descricao);
            header("Location: ".BASE_URL."Tarefas");
            exit;
        }
        $this->loadTemplate("Tarefas/adicionar");
    }
    public function editar($id_tarefa){
        $tarefas = new Tarefas();
        // pegar a informação da tarefa
        $this->data["tarefa"] = $tarefas->pegarInformacao($id_tarefa);
        $this->loadTemplate("Tarefas/editar", $this->data);
    }

    public function remover($id_tarefa) {
        $tarefas = new Tarefas();
    
        // Chama a função remover no model
        $tarefas->remover($id_tarefa);
        header('Location: ' . BASE_URL . 'Tarefas');
    }
    
}