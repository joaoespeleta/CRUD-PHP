<?php
include 'conexao.php';

$query = $pdo->prepare('SELECT * FROM tarefas');
$query->execute();
$tarefas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Tarefas</h1>
        <a href="cadastrar.php" class="button">Cadastrar Nova Tarefa</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($tarefas as $tarefa): ?>
                <tr>
                    <td><?php echo $tarefa['id']; ?></td>
                    <td><?php echo $tarefa['titulo']; ?></td>
                    <td><?php echo $tarefa['descricao']; ?></td>
                    <td><?php echo $tarefa['status']; ?></td>
                    <td>
                        <a href="alterar.php?id=<?php echo $tarefa['id']; ?>" class="button">Editar</a>
                        <a href="excluir.php?id=<?php echo $tarefa['id']; ?>" class="button">Apagar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
