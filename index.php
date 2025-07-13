<?php
// Paso 1: Incluyo el archivo del controlador de vistas
// Este archivo contiene una clase que se encarga de mostrar la plantilla principal
require_once "control/views_control.php";
// Paso 2: Creo un objeto (instancia) de la clase viewsControl
// Esto me permite usar las funciones que tiene esa clase
$view = new viewsControl();
// Paso 3: Llamo al método que carga la plantilla del sistema
// Esa plantilla es como la estructura base: header, menú, contenido, footer
$view->getPlantillaControl();





