<?php
// salvar_alteracao.php
include 'conexao.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$query = $pdo->prepare('UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status WHERE id = :id');
$query->execute([
    'titulo' => $titulo,
    'descricao' => $descricao,
    'status' => $status,
    'id' => $id
]);

header('Location: listar_tarefas.php');
exit;
?>
