<!DOCTYPE html>
<html>
<head>
    <title>Modificar Usuario</title>
</head>
<body>
    <h1>Modificar Usuario</h1>
    <form method="post" action="index.php?controller=UserController&action=modifyUser">
        <label>Cédula:</label>
        <input type="text" name="cedula" required><br>
        <input type="submit" value="Buscar">
    </form>

    <?php if (isset($user)): ?>
        <form method="post" action="index.php?controller=UserController&action=modifyUser">
            <input type="hidden" name="cedula" value="<?php echo $user->cedula; ?>">
            <label>Nombre:</label>
            <input type="text" name="name" value="<?php echo $user->name; ?>" required><br>
            <label>Fecha de Nacimiento (dd/mm/aaaa):</label>
            <input type="text" name="birthdate" value="<?php echo $user->birthdate; ?>" required><br>
            <label>Sexo:</label>
            <input type="text" name="sex" value="<?php echo $user->sex; ?>" required><br>
            <label>Tipo:</label>
            <select name="type">
                <option value="estudiante" <?php if ($user->type == 'estudiante') echo 'selected'; ?>>Estudiante</option>
                <option value="profesor" <?php if ($user->type == 'profesor') echo 'selected'; ?>>Profesor</option>
            </select><br>
            <input type="submit" value="Actualizar">
        </form>
    <?php endif; ?>
</body>
</html>
