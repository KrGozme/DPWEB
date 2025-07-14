<?php
require_once "./model/views_model.php";  // Importa la clase viewModel para poder usar el método get_view()

class viewsControl extends viewModel  // Define la clase controlador de vistas que hereda de viewModel
{
    public function getPlantillaControl()  // Método publico para cargar la plantilla principal del sistema
    {
        return require_once "./view/plantilla.php";  // Retorna el archivo de la plantilla principal
    }
    public function getViewControl()  // Método para decidir qué vista se debe cargar
    {
        session_start();  // Inicia o reanuda la sesión para poder acceder a las variables de sesión
        if (isset($_SESSION['ventas_id'])) {   // Verifica si el usuario ha iniciado sesión (si la variable de sesión ventas_id está definida)

            # code...

            if (isset($_GET["views"])) {  // Verifica si se ha enviado un parámetro "views" en la URL
                $ruta = explode("/", $_GET["views"]);  // Divide el valor del parámetro en un array usando "/" como separador
                $response = viewModel::get_view($ruta[0]); // Llama al método get_view de la clase viewModel para obtener la vista correspondiente
            } else {
                $response = "index.php";  // Si no se ha enviado el parámetro "views", se carga la vista por defecto "index"
            }
        }else {
            $response = "login";  // Si el usuario no ha iniciado sesión, se redirige a la vista de login
        }
        return $response;  // Devuelve la vista que se debe cargar
    }
}
