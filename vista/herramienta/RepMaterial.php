<?php
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
    <link rel="stylesheet" href="../../assest/dist/css/adminlte.min.css">
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
        <img src="../../assest/dist/img/logo_municipio.jpg" alt="" width='150' class="img-thumbnail">
      </div>
      <div class="col-sm-4">
        <h4 class="text-center">Gobierno municipal de Ravelo</h4>
        <h5 class="text-center text-muted">2da seccion - Provincia Chayata</h5>
        <h5 class="text-center text-muted">Potosi - Bolivia</h5>
      </div>

      <div class="col-sm-1"></div>
      <div class="col-sm-5">
        <h2 class="table-title">
          Inventario fisico de materiales
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
          <th>C. Adquisición</th>
          <th>Costo Almacen</th>
          <th>Stock</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $Material = ControladorMaterial::ctrInfoMateriales();

        foreach ($Material as $value) {
        ?>
        <tr>
          <td><?php echo $value["cod_material"]; ?></td>
          <td><?php echo $value["desc_material"]; ?></td>
          <td><?php echo $value["unidad"]; ?></td>
          <td><?php echo $value["costo_material"];?></td>
          <td><?php echo $value["valor_unidad"];?></td>
          <td> <?php  $stock=ControladorMaterial::ctrStockMaterial($value["id_material"]);
          echo $totStock=$stock["ingresos"]-$stock["salidas"];          
            ?> 
          </td>


          <?php
          if ($value["estado_material"] == 1) {
          ?>
          <td>Disponible</td>
          <?php
          } else {
          ?>
          <td>No disponible</td>
          <?php
          }
          ?>

        </tr>

        <?php
        }
        ?>


      </tbody>
    </table>


  </body>
</html>
