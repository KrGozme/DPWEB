<?php

require_once "../config/config.php";  //importa el archivo las constantes de configuración solo una vez y detiene el programa si no existe

class conexion
{
    public static function connect() // Método público y estático para conectar a la base de datos sin crear objeto
    {
        $mysql = new mysqli(BD_HOST, BD_USER, BD_PASSWORD, BD_NAME);  // Crea una nueva conexión a la BD usando la clase mysqli, y las constantes
        $mysql->set_charset(BD_CHARSET);  // Establece el charset de la conexión (utf8 para evitar errores con tildes y ñ)
        date_default_timezone_set("America/Lima");  // Configura la zona horaria (Perú)
        if (mysqli_connect_errno()) {  // Verifica si hay errores de conexión
            echo "Error de Conexion:" . mysqli_connect_errno();
        }
        return $mysql;  // Devuelve la conexión si todo salió bien

    }
}
