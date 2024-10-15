<?php
require "../../controlador/inmuebleControlador.php";
require "../../modelo/inmuebleModelo.php";

?>

<div class="modal-header bg-dark">
  <h4 class="modal-title font-weight-light">Elejir el Inmueble</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<div class="modal-body table-responsive " >
  <table id="DataTableListaItem" class="table table-striped table-hover">

    <thead>
      <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Categoria</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $inmueble = ControladorInmueble::ctrInformacionInmueble();
      foreach ($inmueble as $value) {
      ?>
      <tr>
        <td><?php echo $value["cod_item"]; ?></td>
        <td><?php echo $value["desc_item"]; ?></td>
        <td><?php echo $value["clasificacion"]; ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-sm btn-info" onclick="MAgregarInmueble(<?php echo $value['id_item']; ?>)">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</div>
<div class="modal-footer justify-content-between">

</div>

<script>
   $(function() {
    $("#DataTableListaItem").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    }).buttons().container().appendTo('#DataTableListaItem_wrapper .col-md-6:eq(0)');
    $('#DataTableListaItem td').css('padding', '5px');
    //$('#DataTable td').css('text-align', 'center'); 
  });
</script>
