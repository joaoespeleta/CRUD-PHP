<?php
// conexao.php
$host = 'localhost';
$dbname = 'crud';  // Certifique-se que esse é o nome correto do banco de dados
$username = 'root';  // Seu usuário do MySQL
$password = '';  // Sua senha do MySQL

try {
    // Tente criar a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
