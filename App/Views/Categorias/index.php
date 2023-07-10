<h3 class="mt-5">Listagem de categorias</h3>
<p><a class="btn btn-primary" href="<?= BASE_URL; ?>Categorias/adicionar">Nova Categoria</a></p>
<style>
    .table {
        margin-top: 20px;
        border-collapse: collapse;
        width: 100%;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: left;
    }
</style>

<table class="table table-bordered table-hover  table-sm">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody id="table-body">
    <?php foreach($categorias as $categoria): ?>
            <tr>
                <td><?= $categoria["id"]; ?></td>
                <td><?= $categoria["nome"]; ?></td>
                <td>
                    <a href="<?= BASE_URL; ?>Categorias/editar/<?= $categoria["id"]; ?>">Editar</a>
                    <a href="<?= BASE_URL; ?>Categorias/remover/<?= $categoria["id"]; ?>" onclick="return confirm('Tem certeza que deseja remover esta tarefa?')">Remover</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>