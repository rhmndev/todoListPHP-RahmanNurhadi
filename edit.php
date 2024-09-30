<?php
session_start();

if (!isset($_GET['id']) || !isset($_SESSION['todos'][$_GET['id']])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$task = $_SESSION['todos'][$id];

// Proses edit tugas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newTask = $_POST['task'];
    if (!empty($newTask)) {
        $_SESSION['todos'][$id] = $newTask;
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
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Ubah Tugas</h1>
        <form method="POST" action="edit.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="task">Task</label>
                <input type="text" name="task" id="task" class="form-control" value="<?php echo $task; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Perbarui Tugas</button>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
        </form>
    </div>
</body>
</html>
