<?php
require_once("../model/ProductoModel.php");
require_once("../model/CategoriaModel.php");
require_once("../model/UsuarioModel.php");

$objProducto = new ProductoModel();
$objCategoria = new CategoriaModel();
$objUsuario = new UsuarioModel();

$tipo = $_GET['tipo'];

// Registrar nuevo producto
if ($tipo == "registrar") {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_proveedor = $_POST['id_proveedor'];

    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $id_categoria == "" || $fecha_vencimiento == "" || $id_proveedor == "") {
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }
    // Validar que la imagen haya sido enviada correctamente
    if (!isset($_FILES['imagen']) || $_FILES['imagen']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'msg' => 'Error, imagen no recibida']);
        exit;
    }
    // Validar que el código del producto no exista
    if ($objProducto->existeCodigo($codigo) > 0) {
        echo json_encode(['status' => false, 'msg' => 'Error, el código ya existe']);
        exit;
    }
    // Validar tipo y tamaño del archivo de imagen
    $file = $_FILES['imagen'];
    $ext  = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $extPermitidas = ['jpg', 'jpeg', 'png'];

    if (!in_array($ext, $extPermitidas)) {
        echo json_encode(['status' => false, 'msg' => 'Formato de imagen no permitido']);
        exit;
    }
    if ($file['size'] > 5 * 1024 * 1024) { // 5MB
        echo json_encode(['status' => false, 'msg' => 'La imagen supera 5MB']);
        exit;
    }
    // Mover archivo a carpeta uploads
    $carpetaUploads = "../uploads/productos/";
    if (!is_dir($carpetaUploads)) {
        @mkdir($carpetaUploads, 0775, true);
    }
    // Crear nombre único para la imagen
    $nombreUnico = uniqid('prod_') . '.' . $ext;
    $rutaFisica  = $carpetaUploads . $nombreUnico;
    $rutaRelativa = "uploads/productos/" . $nombreUnico;
    // Mover la imagen a la carpeta destino
    if (!move_uploaded_file($file['tmp_name'], $rutaFisica)) {
        echo json_encode(['status' => false, 'msg' => 'No se pudo guardar la imagen']);
        exit;
    }
    // Registrar producto en la base de datos
    $id = $objProducto->registrar($codigo,$nombre,$detalle,$precio,$stock,$id_categoria,$fecha_vencimiento,$rutaRelativa, $id_proveedor);
    if ($id > 0) {
        echo json_encode(['status' => true, 'msg' => 'Registrado correctamente', 'id' => $id, 'img' => $rutaRelativa]);
    } else {
    // Eliminar la imagen si falló el registro en BD
        @unlink($rutaFisica); // revertir archivo si falló BD
        echo json_encode(['status' => false, 'msg' => 'Error, falló en registro']);
    }
    exit;
}




// ver productos
if ($tipo == "ver_productos") {
    $respuesta = array('status' => false, 'msg' => 'fallo el controlador');
    $productos = $objProducto->verProductos();
    if (count($productos)) {
        $respuesta = array('status' => true, 'msg' => '', 'data' => $productos);
    }
    echo json_encode($respuesta);
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_producto = $_POST['id_producto'];
    $producto = $objProducto->ver($id_producto);
    if ($producto) {
        $respuesta['status'] = true;
        $respuesta['data'] = $producto;
    } else {
        $respuesta['msg'] = 'Error, producto no existe';
    }
    echo json_encode($respuesta);
}











if ($tipo == "actualizar") {
    // Recibir variables
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $id_categoria = $_POST['id_categoria'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];
    $id_proveedor = $_POST['id_proveedor'];

    // Manejo de la imagen
    $imagen = "";
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $nombre_img = $_FILES['imagen']['name'];
        $tmp_img = $_FILES['imagen']['tmp_name'];
        $carpeta = "../uploads/productos/";

        // Crear carpeta si no existe
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        // Renombrar imagen para evitar duplicados
        $nuevo_nombre = uniqid("prod_") . "_" . $nombre_img;
        $ruta_final = $carpeta . $nuevo_nombre;

        // Mover imagen subida
        move_uploaded_file($tmp_img, $ruta_final);

        // Guardar ruta relativa
        $imagen = "uploads/productos/" . $nuevo_nombre;
    } else {
        // Si no se selecciona nueva imagen, conservar la anterior
        $producto_actual = $objProducto->ver($id_producto);
        $imagen = is_array($producto_actual) ? $producto_actual['imagen'] : $producto_actual->imagen;
    }

    // Validar campos obligatorios
    if (
        $id_producto == "" || $codigo == "" || $nombre == "" || $detalle == "" || 
        $precio == "" || $stock == "" || $id_categoria == "" || 
        $fecha_vencimiento == "" || $id_proveedor == ""
    ) {
        echo json_encode(['status' => false, 'msg' => 'Error, campos vacíos']);
        exit;
    }

    // Verificar si existe el producto
    $existeID = $objProducto->ver($id_producto);
    if (!$existeID) {
        echo json_encode(['status' => false, 'msg' => 'Error, producto no existe en BD']);
        exit;
    }

    // Actualizar producto
    $actualizar = $objProducto->actualizar(
        $id_producto,
        $codigo,
        $nombre,
        $detalle,
        $precio,
        $stock,
        $id_categoria,
        $fecha_vencimiento,
        $imagen,
        $id_proveedor
    );

    if ($actualizar) {
        echo json_encode(['status' => true, 'msg' => 'Producto actualizado correctamente']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Error al actualizar el producto']);
    }

    exit;
}







//eliminar producto
if ($tipo == "eliminar") {
    //print_r($_POST);
    $id_producto = $_POST['id_producto'];
    $respuesta = array('status' => false, 'msg' => '');
    $resultado = $objProducto->eliminar($id_producto);
    if ($resultado) {
        $respuesta = array('status' => true, 'msg' => 'Eliminado Correctamente');
    }else {
        $respuesta = array('status' => false, 'msg' => $resultado);
    }
    echo json_encode($respuesta);
}