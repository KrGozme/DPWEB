<?php
require_once "./config/config.php";  // Importa las constantes de configuración
require_once "control/views_control.php";  // Importa el controlador de vistas
$view = new viewsControl();  // Crea una instancia del controlador de vistas
$mostrar = $view->getViewControl();  // Llama al método para obtener la vista que se debe mostrar
if ($mostrar == "login" || $mostrar == "404") {  // Si la vista es "login" o "404", se carga directamente sin plantilla
    require_once "./view/".$mostrar.".php";  // Carga la vista correspondiente
}else {  
    include "./view/include/header.php"; // cargamos el header 
    include $mostrar;  // Cargamos la vista obtenida
    include "./view/include/footer.php"; //cargamos el footer
}