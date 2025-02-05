<?php 
require_once "./config/db.php";

// Verifica se o método da requisição é POST, ou seja, se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Escapa caracteres especiais da entrada para prevenir injeção de SQL
    $task = $conn->real_escape_string($_POST['task']);

    // Cria a query SQL para inserir uma nova tarefa na tabela 'tasks'
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";

    // Executa a query e verifica se a inserção foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Se a inserção for realizada com sucesso, redireciona para a página principal
        header("Location: index.php");
        exit(); 
    } else {
        echo "Erro: " . $conn->error;
    }
}

?>
