<!DOCTYPE html>
<html>
<head>
    <title>Listar Usuarios Inactivos</title>
</head>
<body>
    <h1>Usuarios Inactivos</h1>
    <?php foreach ($users as $user): ?>
        <p><?php echo $user->name; ?> - <?php echo $user->cedula; ?></p>
    <?php endforeach; ?>
</body>
</html>
