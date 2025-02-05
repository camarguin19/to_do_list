<?php 
require_once "./config/db.php";

// Verifica se o parâmetro 'id' foi passado via GET na URL
if (isset($_GET['id'])) {
    // Converte o valor recebido para inteiro para evitar injeção de SQL e garantir que seja numérico
    $task_id = (int) $_GET['id'];

    // Cria a query SQL para atualizar o status da tarefa para 'concluída'
    // a variável é convertida para inteiro, então não há risco imediato de injeção aqui.
    $sql = "UPDATE tasks SET status = 'concluída' WHERE id = '$task_id'";

    // Executa a query e verifica se foi bem-sucedida
    if ($conn->query($sql) === TRUE) {
        header('location: index.php');
        exit(); // Encerra o script para garantir que nada mais seja executado
    } else {
        // Caso ocorra um erro na query, exibe uma mensagem de erro com o detalhe do problema
        echo "Erro ao atualizar a tarefa" . $conn->error;
    }
} else {
    echo "ID da tarefa inválido";
}

?>
