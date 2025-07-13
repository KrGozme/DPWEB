<?php

require_once("../model/UsuarioModel.php");  // Importa el modelo de usuario para poder usar sus métodos
$objPersona = new UsuarioModel();  // Crea una instancia de la clase UsuarioModel para poder acceder a sus métodos

$tipo = $_GET['tipo'];  // Obtiene el tipo de operación a realizar desde la URL

if ($tipo == "registrar") {  // Si el tipo es "registrar", se procede a registrar un nuevo usuario
    // Validamos que los campos no esten vacios
    //    print_r($_POST);
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    // encriptando nro_identidad para utilizarlo como contraseña 
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);
    // Validamos que los campos no esten vacios
    if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');  // Si alguno de los campos está vacío, se devuelve un mensaje de error
    } else {
        // validacion si existe persona 
        $existePersona = $objPersona->ExistePersona($nro_identidad);  // Llama al método ExistePersona del modelo para verificar si el usuario ya existe
        // Si existe persona, no se puede registrar
        if ($existePersona > 0) {  
            $arrResponse = array('status' => false, 'msg' => 'Error: nro de documento ya existe');  // Si el usuario ya existe, se devuelve un mensaje de error
        } else {  // Si el usuario no existe, se procede a registrar
            // Llama al método registrar del modelo para insertar el nuevo usuario en la base de datos
            $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);

            if ($respuesta) {  // Si el registro se realiza correctamente, se devuelve un mensaje de éxito
                $arrResponse = array('status' => true, 'msg' => 'Registrado correctamente');
            } else {  // Si hay un error al registrar, se devuelve un mensaje de error
                $arrResponse = array('status' => false, 'msg' => 'Error: fallo en registro');
            }
        }
    }

    echo json_encode($arrResponse);  // Devuelve la respuesta en formato JSON
}
if ($tipo == "iniciar_sesion") {  // Si el tipo es "iniciar_sesion", se procede a iniciar sesión
    $nro_identidad = $_POST['username'];  // Obtiene el número de identidad del usuario desde el formulario
    $password = $_POST['password'];  // Obtiene la contraseña del usuario desde el formulario
    // Validamos que los campos no esten vacios
    if ($nro_identidad == "" || $password == "") {  
        $respuesta = array('status' => false, 'msg' => 'Error, campos vacios');  // Si alguno de los campos está vacío, se devuelve un mensaje de error
    } else {
        $existePersona = $objPersona->ExistePersona($nro_identidad);   // Llama al método ExistePersona del modelo para verificar si el usuario ya existe
        // Si no existe persona, no se puede iniciar sesión
        if (!$existePersona) {  
            $respuesta = array('status' => false, 'msg' => 'Error, usuario no resgistrado');  // Si el usuario no existe, se devuelve un mensaje de error
        } else {
            $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);   // Llama al método buscarPersonaPorNroIdentidad del modelo para obtener los datos del usuario
            if (password_verify($password, $persona->password)) {  // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
                session_start();  // Inicia una nueva sesión o reanuda la sesión actual
                $_SESSION['ventas_id'] = $persona->id;  // Almacena el ID del usuario en la sesión
                $_SESSION['ventas_usuario'] = $persona->razon_social;  // Almacena el nombre del usuario en la sesión
                $respuesta = array('status' => true, 'msg' => 'OK');  // Si la contraseña es correcta, se devuelve un mensaje de éxito
            }else {
                $respuesta = array('status' => false, 'msg' => 'Error, contraseña incorrecta');  // Si la contraseña es incorrecta, se devuelve un mensaje de error
            }
        }
    }
    echo json_encode($respuesta);  // Devuelve la respuesta en formato JSON
}
