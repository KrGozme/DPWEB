<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>view/css/login.css" />
  <script>
    const base_url = '<?= BASE_URL; ?>';
  </script>
</head>

<body>
  <div class="container" id="container">
    <!-- Formulario de Inicio de Sesión -->
    <div class="form-container sign-in-container">
      <form id="frm_login">
        <h1>Iniciar Sesión</h1>
        <div class="social-container">
          <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
          <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p>Usa tu cuenta</p>
        <input type="text" class="form-control" id="username" name="username" placeholder="Ingrese su usuario" required>
        <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
        <a href="mailto:soporte@ejemplo.com">¿Olvidaste tu contraseña?</a>
        <button type="button" onclick="iniciar_sesion();">Ingresar</button>
      </form>
    </div>

    <!-- Panel de animación -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1>¡Hola!</h1>
          <p>Introduce tus datos personales y comienza tu viaje con nosotros</p>
        </div>
      </div>
    </div>

    <script src="<?= BASE_URL; ?>view/function/user.js"></script>
    
</body>

</html>