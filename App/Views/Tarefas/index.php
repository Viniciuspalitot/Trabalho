<head>
    <title>Listagem de tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<h3>Listagem de tarefas</h3>
<p><a href="<?= BASE_URL; ?>Tarefas/adicionar">Nova Tarefa</a></p>
<ul>
    <?php foreach($tarefas as $tarefa): ?>
        <li><?= $tarefa["id"]; ?> - <?= $tarefa["titulo"]; ?> - <?php echo $tarefa["descricao"]; ?> </li>        
    <?php endforeach; ?>
</ul>

<form id="filter-form"> 
    <label for="situacao-filter">Filtrar por Situação:</label>
    <select id="situacao-filter" name="situacao-filter">
        <option value="">Todas as Situações</option>
        <option value="Concluída">Concluída</option>
        <option value="Em Progresso">Em Progresso</option>
        <option value="Pendente">Pendente</option>
        <!-- Adicione mais opções conforme necessário -->
    </select>

    <button type="submit">Filtrar</button>
</form>


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

<table class="table" border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Situação</th>
            <th>Categoria</th>
            <th>data criação</th>
            <th>data atualização</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php foreach($tarefas as $tarefa): ?>
            <tr>
                <td><?= $tarefa["id"]; ?></td>
                <td><?= $tarefa["titulo"]; ?></td>
                <td><?= $tarefa["descricao"]; ?></td>
                <td><?= $tarefa["situacao"]; ?></td>
                <td><?= $tarefa["nome_categoria"]; ?></td>
                <td><?= $tarefa["data_criacao"]; ?></td>
                <td><?= $tarefa["data_atualizacao"]; ?></td>
                <td>
                    <a href="<?= BASE_URL; ?>Tarefas/editar/<?= $tarefa["id"]; ?>">Editar</a>
                    <a href="<?= BASE_URL; ?>Tarefas/remover/<?= $tarefa["id"]; ?>" onclick="return confirm('Tem certeza que deseja remover esta tarefa?')">Remover</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    document.getElementById('filter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        filterTable();
    });

    function filterTable() {
        var input = document.getElementById('situacao-filter'); //pega a entrada no input
        var filter = input.value.toUpperCase(); // coloca em maiusculo tudo
        var table = document.getElementById('table-body'); // pega os dados da tabela
        var rows = table.getElementsByTagName('tr'); // pega as linhas

        for (var i = 0; i < rows.length; i++) {
            var situacao = rows[i].getElementsByTagName('td')[3];
            if (situacao) {
                var textValue = situacao.textContent || situacao.innerText;
                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }
</script>