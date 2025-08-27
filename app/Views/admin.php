<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador - Limpet</title>
    <style>
 .login-container {
  width: 75%;
  margin: 50px auto;
  background-color: #BAA682;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.titulo {
  font-size: 40px;
  font-weight: bold;
  text-align: left;
  display: flex;
  align-items: center;
  gap: 8px;
  color: #F6F4EE;
  font-family: 'Abril Fatface', serif;
}

.titulo img {
  width: 30px;
  height: 30px;
  vertical-align: middle;
}

.titulodeingreso {
  font-size: 36px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 35px;
  color: #F6F4EE;
}

label {
  font-weight: 600;
  margin-bottom: 5px;
  display: block;
  color: #F6F4EE;
}

.inputlog {
  width: 60%;
  padding: 12px;
  margin: 0 auto 20px auto;
  border: none;
  border-radius: 8px;
  display: block;
  background-color: #F6F4EE;
  color: #333;
}


    </style>
</head>
<body>
    <div class="header">
        <h1>Panel de Administración</h1>
        <p>Bienvenido: <?= session()->get('nombre') ?></p>
    </div>

    <div class="menu">
        <a href="#gestion-productos" class="menu-item"> Gestión de Productos</a>
        <a href="#control-stock" class="menu-item">Control de Stock</a>
        <a href="#precios-promos" class="menu-item">Precios y Promociones</a>
        <a href="#reportes" class="menu-item"> Reportes de Ventas</a>
    </div>

    <a href="<?= base_url('/auth/logout') ?>" class="logout">🚪 Cerrar Sesión</a>

    <script>
        // Funciones simples para cada sección
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const section = this.getAttribute('href').substring(1);
                alert('Abriendo: ' + section.replace('-', ' '));
                // Aquí puedes cargar el contenido de cada sección
            });
        });
    </script>
</body>
</html>