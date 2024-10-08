<?php
session_start();

//ejecutando una salida en excel
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename = ReporteMaterial.xls");

require "../../controlador/materialControlador.php";
require "../../modelo/materialModelo.php";


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de materiales</title>
    <link rel="shortcut icon" href="#">

    <style>
      body{
        font-size: 14px;
      }
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
  </head>

  <body>
    <div class="row">
     <div class="col-sm-1"></div>
      <div class="col-sm-1">
        
      </div>
      <div class="col-sm-4">
        <h4 class="text-center">Gobierno municipal de Ravelo</h4>
        <h5 class="text-center text-muted">2da seccion - Provincia Chayata</h5>
        <h5 class="text-center text-muted">Potosi - Bolivia</h5>
      </div>

      <div class="col-sm-1"></div>
      <div class="col-sm-5">
        <h2 class="table-title">
          Salidas/Entradas de Materiales
        </h2>
      </div>
      <div class="col-sm-1"></div>
    </div>
<br>
    <table>
      <thead>
        <tr>
          <th>Cod. Material</th>
          <th>Descripcion</th>
          <th>Unidad</th>
          <th>Stock</th>
          <th>Fecha</th>
          <th>Cod. I/S</th>
          <th>Cantidad</th>
        </tr>
      </thead>
      <tbody id="respReporte">
        <?php
        
        if(isset($_SESSION["fechaInicio"])){
 
          $data = array(
            "fechaInicio"=>$_SESSION["fechaInicio"],
            "fechaFin"=> $_SESSION["fechaFin"],
            "ingSal"=> $_SESSION["ingSal"]
          );
          $Material = ControladorMaterial::BusRepMaterial($data);


          foreach ($Material as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_material"]; ?></td>
          <td><?php echo $value["desc_material"]; ?></td>
          <td><?php echo $value["unidad"]; ?></td>
          <td><?php  $stock=ControladorMaterial::ctrStockMaterial($value["id_material"]);
            echo $totStock=$stock["ingresos"]-$stock["salidas"];          
            ?> 
            </td>
          <td><?php echo $value["fecha"]; ?></td>
          <td><?php echo $value["codigo"]; ?></td>
          <td><?php echo $value["cantidad"]; ?></td>

        </tr>

        <?php
          }
        }
        ?>


      </tbody>
    </table>


  </body>
</html>
