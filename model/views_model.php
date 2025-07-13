<?php

class viewModel  // Clase que gestiona qué vista se debe cargar según la petición
{
    protected static function get_view($view)  // Método protegido y estático que retorna la vista según el nombre recibido
    {
        $white_list = ["home", "products", "users", "new-user", "categories"];  // Lista blanca: de vistas permitidas
        if (in_array($view, $white_list)) {  // Verifica si la vista está en la lista blanca
            if (is_file("./view/" . $view . ".php")) {  // Verifica si el archivo solicitado existe en la carpeta /view
                $content = "./view/" . $view . ".php";  // Si existe, guarda la ruta del archivo en la variable $content
            } else {
                $content = "404";  // Si el archivo no existe, retorna una página 404 (error)
            }
        } elseif ($view == "login") { // Si la vista solicitada es "login", se permite cargar directamente
            $content = "login";
        } else {
            $content = "404";  // Si no está en la lista blanca ni es "login", también retorna "404"
        }
        return $content;  // Devuelve el contenido de la vista o "404"
    }
}
