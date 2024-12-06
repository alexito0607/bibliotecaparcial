<!DOCTYPE html>
<html>
<head>
    <title>Crear Libro</title>
</head>
<body>
    <h1>Crear Libro</h1>
    <form method="post" action="index.php?controller=BookController&action=create">
        <label>Nombre del Libro:</label>
        <input type="text" name="name" required><br>
        <label>Código del Libro-ISBN:</label>
        <input type="text" name="isbn" required><br>
        <label>Código de Ejemplar:</label>
        <input type="text" name="code" required><br>
        <label>Categoría:</label>
        <input type="text" name="category" required><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
