<!DOCTYPE html>
<html>
<head>
    <title>Listar Libros</title>
</head>
<body>
    <h1>Listado de Libros</h1>
    <?php foreach ($books as $book): ?>
        <p><?php echo $book->name; ?> - <?php echo $book->isbn; ?> - <?php echo $book->code; ?> - <?php echo $book->category; ?></p>
    <?php endforeach; ?>
</body>
</html>
