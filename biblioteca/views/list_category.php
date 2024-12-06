<!DOCTYPE html>
<html>
<head>
    <title>Listar Categorías</title>
</head>
<body>
    <h1>Listado de Categorías</h1>
    <?php foreach ($categories as $category): ?>
        <p><?php echo $category->name; ?></p>
    <?php endforeach; ?>
</body>
</html>
