<h3>Adicionar Tarefa</h3>
<form method="post">
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" id="titulo" placeholder="Titulo da tarefa">
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descricao</label>
        <input type="text" class="form-control" id="descricao" placeholder="descricao da tarefa">
    </div>

    <div class="mb-3">
        <label for="situacao" class="form-label">Situação</label>
        <select class="form-select"  id="situacao" name="situacao">
            <option value="Concluída">Concluída</option>
            <option value="Em Progresso">Em Progresso</option>
            <option value="Pendente">Pendente</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_categoria" class="form-label">Categoria</label>
        <select class="form-select"  id="id_categoria" name="id_categoria">
            <?php foreach($categorias as $categoria): ?>
                <option value="<?= $categoria["id"]; ?>">
                    <?= $categoria["nome"]; ?>
                </option>
            <?php endforeach; ?>
            
        </select>
    </div>


    <div class="mb-3">
        <button type="submit" class="btn btn-success">Gravar tarefa</button>
        
    </div>
</form>
