<?php
require "../../controlador/ventaControlador.php";
require "../../modelo/ventaModelo.php";

$id = $_GET["id"];
$venta = ControladorVenta::ctrInfoVenta($id);

?>
<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Información Venta</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fa fa-shopping-cart"></i> Código de Proyecto: <?php echo $venta['cod_proyecto'] ?>
                  <small class="float-right">Fecha de Venta: <?php echo $venta['fecha_emision_venta'] ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <br><br>
              <div class="col-sm-8 invoice-col">
                Cliente
                <address>
                  <strong><?php echo $venta["nombre_cliente"] . " " . $venta["ap_paterno_cli"] . " " . $venta["ap_materno_cli"]; ?></strong>
                </address>
              </div>
              <div class="col-sm-4 invoice-col">

              </div>
              <!-- /.col -->
              <div class="col-sm-8 invoice-col">
                Proyecto
                <address>
                  <strong> <?php echo $venta['nombre_proyecto'] ?></strong><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <br>
                <b>Código de venta: v-00<?php echo $venta["id_venta"]; ?></b><br>
                <!-- <b>Order ID:</b> -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead class="bg-dark">
                    <tr>
                      <th>Nro</th>
                      <th>Descripcion</th>
                      <th>Fecha de venta</th>
                      <th>Fecha de entrega</th>
                      <th>A cuenta</th>
                      <th>Nro de Cuotas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $venta["nombre_proyecto"]; ?></td>
                      <td><?php echo $venta["fecha_venta"]; ?></td>
                      <td><?php echo $venta["fecha_entrega"]; ?></td>
                      <td><?php echo $venta["a_cuenta"]; ?></td>
                      <td><?php echo $venta["nro_cuotas"]; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Observaciones:</p>
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                  <?php echo $venta["observaciones_venta"]; ?>
                  <br>
                <p class="lead">Archivos:</p>

                <?php
                if ($venta['archivo_plano'] != "") {
                ?>
                  <a href="assest/dist/img/archivos/<?php echo $venta['archivo_plano']; ?>" style="text-decoration: none;" download> Plano:
                    <img src="assest/dist/img/archivos/<?php echo $venta["archivo_plano"]; ?>" alt="Descargar Archivo" style="max-width: 100px; height: auto;">
                  </a>
                <?php
                }
                ?>

                <?php
                if ($venta['archivo_contrato'] != "") {
                ?>
                  <a href="assest/dist/img/archivos/<?php echo $venta['archivo_contrato']; ?>" style="text-decoration: none;" download> Contrato:
                    <img src="assest/dist/img/archivos/<?php echo $venta['archivo_contrato']; ?>" alt="Descargar Archivo" style="max-width: 100px; height: auto;">
                  </a>
                <?php
                }
                ?>

                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Fecha de Contrato <?php echo $venta['fecha_contrato']; ?></p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Forma de Pago:</th>
                      <td><?php echo $venta['forma_pago']; ?></td>
                    </tr>
                    <tr>
                      <th>A cuenta</th>
                      <td><?php echo $venta['a_cuenta']; ?> Bs.</td>
                    </tr>
                    <tr>
                      <th>Nro de cuotas:</th>
                      <td><?php echo $venta['nro_cuotas']; ?> Bs.</td>
                    </tr>
                    <tr>
                      <th>Total:</th>
                      <td><?php echo $venta['monto_contrato']; ?> Bs.</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>



</div>