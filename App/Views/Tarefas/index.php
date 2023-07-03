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
    <label for="descricao-filter">Filtrar por Descrição:</label> 
    <input type="text" id="descricao-filter" name="descricao-filter">
    <button type="submit">Filtrar</button>
</form>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody id="table-body">
        <?php foreach($tarefas as $tarefa): ?>
            <tr>
                <td><?= $tarefa["id"]; ?></td>
                <td><?= $tarefa["titulo"]; ?></td>
                <td><?= $tarefa["descricao"]; ?></td>
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
        var input = document.getElementById('descricao-filter'); //pega a entrada no input
        var filter = input.value.toUpperCase(); // coloca em maiusculo tudo
        var table = document.getElementById('table-body'); // pega os dados da tabela
        var rows = table.getElementsByTagName('tr'); // pega as linhas

        for (var i = 0; i < rows.length; i++) {
            var description = rows[i].getElementsByTagName('td')[2];
            if (description) {
                var textValue = description.textContent || description.innerText;
                if (textValue.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }
</script>