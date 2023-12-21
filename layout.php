<!DOCTYPE html>
<html lang="en">
<!-- jangan diubah -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Document'; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand  fs-3"href="main.php">Gerabah</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link fs-4" href="main.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-4" href="create.php">Create</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <div id="content">
        <?= $content ?? ''; ?>
    </div>
    <footer class="bg-dark text-white mt-5 p-3 text-center">
        <p>&copy; 2023 Gerabah</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


