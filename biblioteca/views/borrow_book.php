<!DOCTYPE html>
<html>
<head>
    <title>Prestar Libro</title>
</head>
<body>
    <h1>Prestar Libro</h1>
    <form method="post" action="index.php?controller=BookController&action=borrowBook">
        <label>ISBN del Libro:</label>
        <input type="text" name="isbn" required><br>
        <label>ID de Usuario:</label>
        <input type="text" name="user_id" required><br>
        <input type="submit" value="Prestar">
    </form>
</body>
</html>
