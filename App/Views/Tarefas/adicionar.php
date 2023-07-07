<head>
    <title>Adicionar Tarefa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<h3>Adicionar Tarefa</h3>
<form method="post">
    Titulo: <input type="text" name="titulo" required>
    <br/>
    Descrição: <input type="text" name="descricao">
    <br/>
    Situação: <select id="situacao" name="situacao">
        <option value="Concluída">Concluída</option>
        <option value="Em Progresso">Em Progresso</option>
        <option value="Pendente">Pendente</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>
    <br/>
    Categoria: <select id="id_categoria" name="id_categoria">
        <option value=1>Trabalho</option>
        <option value=2>Desenvolvimento</option>
        <option value=3>Correção de bugs</option>
        <option value=4>Melhorias</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>
    <br/>
    <button type="submit">Gravar tarefa</button>
</form>