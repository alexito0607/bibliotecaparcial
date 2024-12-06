<!DOCTYPE html>
<html>
<head>
    <title>Login de Bibliotecario</title>
</head>
<body>
    <h1>Login de Bibliotecario</h1>
    <form method="post" action="index.php?controller=AuthController&action=login">
        <label>Usuario:</label>
        <input type="text" name="username" required><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Ingresar">
    </form>
</body>
</html>
