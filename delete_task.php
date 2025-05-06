<?php
require_once "./config/db.php";

if (isset($_GET['id'])) {

    $task_id = (int) $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id = $task_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir tarefa: " . $conn->error;
    }
} else {
    echo "ID de tarefa inválido.";
}
