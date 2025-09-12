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

    public function existeCategoria($nombre) 
    {
        $consulta = "SELECT * FROM categoria WHERE nombre = '$nombre'";  
        $sql = $this->conexion->query($consulta); 
        return $sql->num_rows; 
    }


    
        // Obtener todas las categorías
    public function getCategories() {
        $consulta = "SELECT * FROM categoria";
        $sql = $this->conexion->query($consulta);
        $data = [];
        while ($row = $sql->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    
    
    
}


