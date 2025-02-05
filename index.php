<?php
require_once './config/db.php';
// Cria a query SQL para selecionar todas as tarefas, ordenadas pela data de criação (mais recente primeiro)
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";

// Executa a query e armazena o resultado
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <!-- Link para o arquivo de estilo CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Lista de Tarefas</h1>

    <!-- Formulário para adicionar uma nova tarefa -->
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Digite uma nova tarefa" required>
        <button type="submit">Adicionar</button>
    </form>

    <!-- Exibe a lista de tarefas -->
    <ul>

    <?php 
    // Laço para exibir todas as tarefas retornadas da query
    while ($row = $result->fetch_assoc()): ?>
        <li>
            <!-- Exibe o nome da tarefa -->
            <?php echo $row['task']; ?>
            - 
            <!-- Exibe o status da tarefa com a primeira letra maiúscula -->
            <strong><?php echo ucfirst($row['status']); ?></strong>
            
            <!-- Se a tarefa está pendente, exibe o link para marcar como concluída -->
            <?php if ($row['status'] === 'pendente'): ?>
                <a href="update_task.php?id=<?php echo $row['id']; ?>">[Marcar como concluída]</a>
            <?php endif; ?>
            
            <!-- Link para excluir a tarefa -->
            <a href="delete_task.php?id=<?php echo $row['id']; ?>">[Excluir]</a>
        </li>
    <?php endwhile; ?>
    </ul>
</body>

</html>
