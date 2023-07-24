<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>Assets/style.css">
    <title>Alteração do titulo</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="<?= BASE_URL; ?>Tarefas">Tarefas</a>
            </li>
        </ul>
    </nav>
    <?= $this->loadViewInTemplate($viewName, $viewData); ?>
</body>
</html>