<?php

require_once("../library/conexion.php");  // Importa la clase de conexión a la base de datos

class CategoriesModel  // Clase que maneja las operaciones relacionadas con las categorías
{
    private $conexion;   // Variable para almacenar la conexión a la base de datos

    function __construct()  // Constructor de la clase que inicializa la conexión a la base de datos
    {
        $this->conexion = new Conexion();  // Crea una nueva instancia de la clase Conexion
        $this->conexion = $this->conexion->connect(); // Llama al método connect() para establecer la conexión a la base de datos
    }

    public function registrar($nombre, $detalle)  // Método para registrar una nueva categoría en la base de datos
    {
        $consulta = "INSERT INTO categoria (nombre, detalle) VALUES ('$nombre', '$detalle')";  // Crea la consulta SQL para insertar una nueva categoría
        // Ejecuta la consulta SQL en la base de datos
        $sql = $this->conexion->query($consulta);
        if ($sql) {
            return $this->conexion->insert_id; // Si la consulta se ejecuta correctamente, obtiene el ID del último registro insertado
        } else {
            return 0;  // Si hay un error al ejecutar la consulta, devuelve 0
        }
    }

    public function existeCategoria($nombre)  // Método para verificar si una categoría ya existe en la base de datos por su nombre
    {
        $consulta = "SELECT * FROM categoria WHERE nombre = '$nombre'";  // Crea una consulta SQL para contar cuántas veces aparece el nombre de la categoría en la tabla categoria
        $sql = $this->conexion->query($consulta);  // Ejecuta la consulta SQL
        return $sql->num_rows; // Devuelve el número de filas que coinciden con la consulta (0 si no existe, mayor a 0 si ya existe)
    }
}
