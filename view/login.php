<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Tienda Virtual</title>
  <link rel="stylesheet" href="<?= BASE_URL; ?>view/css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
    const base_url = '<?= BASE_URL; ?>';
  </script>
</head>

<body>
  <div class="login-container">
    <!-- Imagen lateral -->
    <div class="login-image">
      <img src="<?= BASE_URL; ?>view/img/login_img.jpg" alt="Tienda Virtual">
      <div class="overlay-text">
      </div>
    </div>
    <!-- Formulario -->
    <div class="login-form">
      <div class="form-card">
        <h2>Iniciar Sesión</h2>
        <form id="frm_login">
          <div class="input-group">
            <i class="fa fa-user icon"></i>
            <input type="text" class="form-control" id="username" name="username" required>
            <label>Usuario</label>
            <span class="bar"></span>
          </div>
          <div class="input-group">
            <i class="fa fa-lock icon"></i>
            <input type="password" class="form-control" id="password" name="password" required>
            <label>Contraseña</label>
            <span class="bar"></span>
          </div>
          <button type="button" class="btn" onclick="iniciar_sesion();">Ingresar</button>
          <p class="forgot"><a href="#">¿Olvidaste tu contraseña?</a></p>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>

</html>