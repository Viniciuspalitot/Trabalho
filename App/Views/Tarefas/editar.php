<h3>Adicionar Tarefa</h3>
<form method="post">
    Titulo: <input type="text" name="titulo" value="<?= $tarefa["titulo"]; ?>" required>
    <br/>
    Descrição: <input type="text" name="descricao" value="<?= $tarefa["descricao"]; ?>" >
    <br/>
    Situação: <select id="situacao" name="situacao" value="<?= $tarefa["situacao"]; ?>">
        <option value="Concluída">Concluída</option>
        <option value="Em Progresso">Em Progresso</option>
        <option value="Pendente">Pendente</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>
    <br/>
    Categoria: <select id="id_categoria" name="id_categoria" value="<?= $tarefa["id_categoria"]; ?>">
        <option value=1>Trabalho</option>
        <option value=2>Desenvolvimento</option>
        <option value=3>Correção de bugs</option>
        <option value=4>Melhorias</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>
    <br/>
    <button type="submit">Gravar tarefa</button>
</form>