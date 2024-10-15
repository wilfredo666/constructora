<?php

class Conexion
{
  /* CONEXION POR PDO */
  static public function conectar()
  {
    /* =============================
         PARA TRABAJAR DE MANERA LOCAL 
         =================================*/
    $host = "localhost";
    $db = "constructora";
    $userDB = "root";
    $passDB = "";

    $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);

    /* =============================
         PARA TRABAJAR CON BASE DE DATOS CON PUERTO 3307
         =================================*/
    /* $host = "localhost";
    $db = "constructora";
    $userDB = "root";
    $passDB = "";
    $port = "3307";

    $link = new PDO("mysql:host=" . $host . ";port=$port;" . "dbname=" . $db, $userDB, $passDB); */



    $link->exec("set names utf8");
    return $link;
  }
}
