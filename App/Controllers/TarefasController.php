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
            $situacao = addslashes($post["situacao"]);
            $id_categoria = addslashes($post["id_categoria"]);
            $tarefas->adicionar($titulo, $descricao, $situacao, $id_categoria);
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $situacao = $_POST['situacao'];
            $id_categoria = $_POST['id_categoria'];

            $tarefas->editar($id_tarefa, $titulo, $descricao, $situacao, $id_categoria);
            header('Location: ' . BASE_URL . 'Tarefas');
        }
    }

    public function remover($id_tarefa) {
        $tarefas = new Tarefas();
    
        // Chama a função remover no model
        $tarefas->remover($id_tarefa);
        header('Location: ' . BASE_URL . 'Tarefas');
    }
    
}