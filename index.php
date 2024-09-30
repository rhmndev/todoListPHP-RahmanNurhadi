<?php
session_start();

// Inisialisasi daftar tugas
if (!isset($_SESSION['todos'])) {
    $_SESSION['todos'] = [];
}

// handle penghapusan tugas
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($_SESSION['todos'][$id]);
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Todo List App</h1>
        <a href="add.php" class="btn btn-primary mb-3">Tugas Baru</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tugas</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_SESSION['todos'])): ?>
                    <?php foreach ($_SESSION['todos'] as $id => $task): ?>
                        <tr>
                            <td><?php echo $id + 1; ?></td>
                            <td><?php echo $task; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="index.php?delete=<?php echo $id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">tugas belum ditambahkan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
