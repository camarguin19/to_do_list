<?php
require_once "./config/db.php";


if (isset($_GET['id'])) {

    $task_id = (int) $_GET['id'];
    $sql = "UPDATE tasks SET status = 'concluída' WHERE id = '$task_id'";

    if ($conn->query($sql) === TRUE) {
        header('location: index.php');
        exit();
    } else {

        echo "Erro ao atualizar a tarefa" . $conn->error;
    }
} else {
    echo "ID da tarefa inválido";
}
