<?php
require_once "./config/db.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $task = $conn->real_escape_string($_POST['task']);
    $sql = "INSERT INTO tasks (task) VALUES ('$task')";

    if ($conn->query($sql) === TRUE) {

        header("Location: index.php");
        exit();
    } else {
        echo "Erro: " . $conn->error;
    }
}
