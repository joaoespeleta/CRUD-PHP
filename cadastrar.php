<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    // Insere a nova tarefa no banco de dados
    $query = $pdo->prepare('INSERT INTO tarefas (titulo, descricao, status) VALUES (:titulo, :descricao, :status)');
    $query->execute([
        'titulo' => $titulo,
        'descricao' => $descricao,
        'status' => $status
    ]);

    header('Location: listar_tarefas.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Nova Tarefa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Nova Tarefa</h1>
        <form action="cadastrar.php" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required><br><br>
            
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required></textarea><br><br>
            
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="pendente">Pendente</option>
                <option value="concluída">Concluída</option>
            </select><br><br>
            
            <button type="submit">Cadastrar Tarefa</button>
        </form>
    </div>
</body>
</html>
