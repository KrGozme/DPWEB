<?php

require_once("../library/conexion.php");  // Importa la clase de conexión a la base de datos


class UsuarioModel  // Clase que maneja las operaciones relacionadas con los usuarios
{
    private $conexion;  // Variable para almacenar la conexión a la base de datos
    function __construct()  // Constructor de la clase que inicializa la conexión a la base de datos
    {
        $this->conexion = new Conexion();  // Crea una nueva instancia de la clase Conexion
        $this->conexion = $this->conexion->connect();  //llama al método connect() para establecer la conexión a la base de datos
    }
    // Método para registrar un nuevo usuario en la base de datos 
    public function registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password) { 
        //crea la consulta SQL para insertar un nuevo usuario en la tabla persona
        $consulta = "INSERT INTO persona (nro_identidad, razon_social, telefono, correo, departamento, provincia, distrito, cod_postal, direccion, rol, password) VALUES ('$nro_identidad', '$razon_social', '$telefono', '$correo', '$departamento', '$provincia', '$distrito', '$cod_postal', '$direccion', '$rol', '$password')";
        $sql = $this->conexion->query($consulta);  // Ejecuta la consulta SQL en la base de datos
        if ($sql) {
            $sql = $this->conexion->insert_id;  // Si la consulta se ejecuta correctamente, obtiene el ID del último registro insertado
        }else {
            $sql = 0;  // Si hay un error al ejecutar la consulta, asigna 0 a $sql
        }
        return $sql;  // Devuelve el ID del nuevo usuario o 0 si hubo un error
    }
public function existePersona($nro_identidad){  // Método para verificar si una persona ya existe en la base de datos por su número de identidad
        // Crea una consulta SQL para contar cuántas veces aparece el número de identidad en la tabla persona
        $consulta="SELECT *FROM persona Where nro_identidad='$nro_identidad'";
        $sql = $this->conexion->query($consulta);  // Ejecuta la consulta SQL
        return $sql->num_rows;  // Devuelve el número de filas que coinciden con la consulta (0 si no existe, mayor a 0 si ya existe)
    }
    public function buscarPersonaPorNroIdentidad($nro_identidad)  {  // Método para buscar una persona en la base de datos por su número de identidad
        // Crea una consulta SQL para seleccionar el ID, razón social y contraseña de la persona
        $consulta = "SELECT id, razon_social, password FROM persona WHERE nro_identidad = '$nro_identidad' limit 1";
        $sql = $this->conexion->query($consulta);  // Ejecuta la consulta SQL
        return $sql->fetch_object();  // Devuelve el resultado de la consulta como un objeto
    }
    public function verUsuarios() { 
        $arr_usuarios = array();  
        $consulta = "SELECT * FROM persona";  
        $sql = $this->conexion->query($consulta);  
        while ($obejeto = $sql->fetch_object()) {  
            array_push($arr_usuarios, $obejeto); 
        }
        return $arr_usuarios;  
    }

}