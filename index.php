<?php
/* controladores */
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/personalControlador.php";
require_once "controlador/proveedorControlador.php";
require_once "controlador/clienteControlador.php";
require_once "controlador/contratoControlador.php";
require_once "controlador/materialControlador.php";
require_once "controlador/proyectoControlador.php";
require_once "controlador/inmuebleControlador.php";
require_once "controlador/herramientaControlador.php";


/* modelos */
require_once "modelo/usuarioModelo.php";
require_once "modelo/personalModelo.php";
require_once "modelo/proveedorModelo.php";
require_once "modelo/clienteModelo.php";
require_once "modelo/contratoModelo.php";
require_once "modelo/materialModelo.php";
require_once "modelo/proyectoModelo.php";
require_once "modelo/inmuebleModelo.php";
require_once "modelo/herramientaModelo.php";

/* prueba para subir al Git */
/* prueba para subir al Git */

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();