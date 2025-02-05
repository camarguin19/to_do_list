<?php 
require_once "./config/db.php";

if (isset($_GET['id'])) {
    // Converte o valor de 'id' para inteiro para evitar injeção de SQL e garantir que seja um número
    $task_id = (int) $_GET['id'];

    // Cria a query SQL para excluir a tarefa com o id fornecido
    $sql = "DELETE FROM tasks WHERE id = $task_id";

    // Executa a query e verifica se a operação foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        // Se a exclusão for realizada com sucesso, redireciona para a página principal
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir tarefa: " . $conn->error;
    }
} else {
    echo "ID de tarefa inválido.";
}

?>
