<?php
include 'conexao.php';

$id = $_GET['id'];
$query = $pdo->prepare('SELECT * FROM tarefas WHERE id = :id');
$query->execute(['id' => $id]);
$tarefa = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    // Atualiza a tarefa no banco de dados
    $query = $pdo->prepare('UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status WHERE id = :id');
    $query->execute([
        'titulo' => $titulo,
        'descricao' => $descricao,
        'status' => $status,
        'id' => $id
    ]);

    header('Location: listar_tarefas.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Tarefa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Alterar Tarefa</h1>
        <form action="alterar.php?id=<?php echo $id; ?>" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo $tarefa['titulo']; ?>" required><br><br>
            
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required><?php echo $tarefa['descricao']; ?></textarea><br><br>
            
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="pendente" <?php if ($tarefa['status'] == 'pendente') echo 'selected'; ?>>Pendente</option>
                <option value="concluída" <?php if ($tarefa['status'] == 'concluída') echo 'selected'; ?>>Concluída</option>
            </select><br><br>
            
            <button type="submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>
