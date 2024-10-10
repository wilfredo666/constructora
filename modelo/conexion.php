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
    //para conexion con puerto 3307
    $port = "3307";

    $link = new PDO("mysql:host=" . $host . ";port=$port;" . "dbname=" . $db, $userDB, $passDB);

    /* =============================
    para conexion normal descomentar linea 24 y comentar linea (16,18).
    =================================*/

    //$link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);
    $link->exec("set names utf8");
    return $link;
  }
}
