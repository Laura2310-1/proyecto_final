<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">
</head>
<body>
    <div class="contenedor-pagina">
        <h1>Bienvenido al Dashboard</h1>
        <p>Usuario: <?= session()->get('nombre') ?></p>
        <p>Rol: <?= session()->get('rol') ?></p>
        <a href="<?= base_url('/auth/logout') ?>">Cerrar sesión</a>
    </div>
</body>
</html>