<?php
session_start();

// Tambahkan tugas baru
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    if (!empty($task)) {
        $_SESSION['todos'][] = $task;
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Todo List App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Aplikasi Todo List</h1>
        <form method="POST" action="add.php">
            <div class="form-group">
                <label for="task">Tugas</label>
                <input type="text" name="task" id="task" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Tambahkan Tugas</button>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
</body>
</html>
