<!DOCTYPE html>
<html>
<head>
    <title>Registro de Usuarios</title>
</head>
<body>
    <h1>Registro de Usuarios</h1>
    <form method="post" action="index.php?controller=UserController&action=register">
        <label>Nombre:</label>
        <input type="text" name="name" required><br>
        <label>Cédula:</label>
        <input type="text" name="cedula" required><br>
        <label>Fecha de Nacimiento (dd/mm/aaaa):</label>
        <input type="text" name="birthdate" required><br>
        <label>Sexo:</label>
        <input type="text" name="sex" required><br>
        <label>Tipo:</label>
        <select name="type">
            <option value="estudiante">Estudiante</option>
            <option value="profesor">Profesor</option>
        </select><br>
        <input type="submit" value="Registrar">
    </form>
</body>
</html>
