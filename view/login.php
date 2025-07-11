<!DOCTYPE html>
<html lang="es">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="view/login.css" />
  <script>
    const base_url = '<?php BASE_URL; ?>';
  </script>
</head>
<body>
  <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <form id="frm_login">
      <div class="input-group">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" placeholder="ingrse el usuario" required />
      </div>
      <div class="input-group">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="ingrese su contraseña" required />
      </div>
      <button type="button" onclick="iniciar_sesion();">iniciar sesion</button>
    </form>
  </div>

  <script src="<?=BASE_URL; ?>view/function/user.js"></script>
</body>
</html>