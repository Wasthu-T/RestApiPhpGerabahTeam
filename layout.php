<!DOCTYPE html>
<html lang="en">
<!-- jangan diubah -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Document'; ?></title>
</head>

<body>
    <nav>
        <h1>navbar</h1>
    </nav>

    <div id="content">
        <?= $content ?? ''; ?>
    </div>

    <footer>
        <p>&copy; 2023 Your Website</p>
    </footer>
</body>

</html>
