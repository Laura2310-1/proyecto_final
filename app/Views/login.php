<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Limpet</title>
    <link rel="stylesheet" href="<?= base_url('css/estilo.css') ?>">
</head>
<body>
    <div class="login-container">
        <h2 class="titulodeingreso">Iniciar Sesión</h2>
        
        <?php if(session()->getFlashdata('error')): ?>
            <div class="error"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        
        <form action="<?= base_url('/auth/authenticate') ?>" method="post">
            <?= csrf_field() ?>
            
            <label for="correo">Correo:</label>
            <input type="email" name="correo" class="inputlog" required>
            
            <label for="password">Contraseña:</label>
            <input type="password" name="password" class="inputlog" required>
            
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>