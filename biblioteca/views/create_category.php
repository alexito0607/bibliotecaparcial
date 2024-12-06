<!DOCTYPE html>
<html>
<head>
    <title>Crear Categoría</title>
</head>
<body>
    <h1>Crear Categoría</h1>
    <form method="post" action="index.php?controller=CategoryController&action=create">
        <label>Nombre de la Categoría:</label>
        <input type="text" name="name" required><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
