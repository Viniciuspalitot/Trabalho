<?php
Class CategoriasController extends Controller{
    private $data = array();

    public function index(){

        $categorias = new Categorias();
        $this->data["categorias"] = $categorias->listar();
        
        $this->loadTemplate("Categorias/index", $this->data);
    }
    public function adicionar(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

        $categorias = new Categorias();
        $categorias->adicionar($nome);

        header("Location: " . BASE_URL . "Categorias");
        exit;
    }

    $this->loadTemplate("Categorias/adicionar");
    }

    public function editar($id_categoria)
{
    $categorias = new Categorias();
    
    // Verificar se a categoria existe
    $categoria = $categorias->pegarInformacao($id_categoria);
    if (!$categoria) {
        // Redirecionar ou exibir uma mensagem de erro, caso a categoria não exista
        // Por exemplo:
        // header("Location: " . BASE_URL . "Categorias");
        // exit;
        echo "Categoria não encontrada.";
        return;
    }
    
    // Verificar se o formulário foi submetido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        
        // Atualizar a categoria
        $categorias->editar($nome, $id_categoria);
        
        // Redirecionar após a atualização
        header("Location: " . BASE_URL . "Categorias");
        exit;
    }
    
    // Carregar o template de edição da categoria
    $this->data["categorias"] = $categoria;
    $this->loadTemplate("Categorias/editar", $this->data);
}


    public function remover($id_categoria) {
        $categorias = new Categorias();
    
        // Chama a função remover no model
        $categorias->remover($id_categoria);
        header('Location: ' . BASE_URL . 'Categorias');
    }
    
}