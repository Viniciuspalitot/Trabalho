<h3>Adicionar Tarefa</h3>
<form method="post">
    Titulo: <input type="text" name="titulo" value="<?= $tarefa["titulo"]; ?>" required>
    <br/>
    Descrição: <input type="text" name="descricao" value="<?= $tarefa["descricao"]; ?>" >
    <br/>
    <button type="submit">Gravar tarefa</button>
</form>