<!DOCTYPE html>
<html>
<head>
    <title>Devolver Libro</title>
</head>
<body>
    <h1>Devolver Libro</h1>
    <form method="post" action="index.php?controller=BookController&action=returnBook">
        <label>ID del Libro:</label>
        <input type="text" name="book_id" required><br>
        <label>ID de Usuario:</label>
        <input type="text" name="user_id" required><br>
        <input type="submit" value="Devolver">
    </form>
</body>
</html>
