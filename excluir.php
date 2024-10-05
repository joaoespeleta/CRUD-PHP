<?php
// excluir.php
include 'conexao.php';

$id = $_GET['id'];

$query = $pdo->prepare('DELETE FROM tarefas WHERE id = :id');
$query->execute(['id' => $id]);

header('Location: listar_tarefas.php');
exit;
?>
