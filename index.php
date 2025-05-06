<?php
require_once './config/db.php';

$sql = "SELECT * FROM tasks ORDER BY created_at DESC";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Lista de Tarefas</h1>


    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Digite uma nova tarefa" required>
        <button type="submit">Adicionar</button>
    </form>


    <ul>

        <?php

        while ($row = $result->fetch_assoc()): ?>
            <li>

                <?php echo $row['task']; ?>
                -

                <strong><?php echo ucfirst($row['status']); ?></strong>


                <?php if ($row['status'] === 'pendente'): ?>
                    <a href="update_task.php?id=<?php echo $row['id']; ?>">[Marcar como concluída]</a>
                <?php endif; ?>

                <a href="delete_task.php?id=<?php echo $row['id']; ?>">[Excluir]</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>

</html>