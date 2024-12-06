<?php
session_start();

if (!isset($_SESSION['librarian'])) {
    header("Location: index.php?controller=AuthController&action=login");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenido, Bibliotecario</h1>
    <a href="index.php?controller=UserController&action=listInactiveUsers">Listar Usuarios Inactivos</a><br>
    <a href="index.php?controller=CategoryController&action=list">Listar Categorías</a><br>
    <a href="index.php?controller=CategoryController&action=create">Crear Categoría</a><br>
    <a href="index.php?controller=BookController&action=listByISBN">Listar Libros por ISBN</a><br>
    <a href="index.php?controller=UserController&action=modifyUser">Modificar Usuario</a><br>
    <!-- Otros enlaces y funcionalidades... -->
</body>
</html>
