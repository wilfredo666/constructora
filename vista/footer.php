<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; 2024 <a href="https://ekesoft.es">Ekesoft</a>.</strong> Derechos reservados.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $base_url; ?>assest/plugins/jquery/jquery.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $base_url; ?>assest/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $base_url; ?>assest/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo $base_url; ?>assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url; ?>assest/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo $base_url; ?>assest/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- InputMask -->
<script src="<?php echo $base_url; ?>assest/plugins/moment/moment.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo $base_url; ?>assest/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo $base_url; ?>assest/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo $base_url; ?>assest/plugins/select2/js/select2.full.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo $base_url; ?>assest/plugins/dropzone/min/dropzone.min.js"></script>

<script src="<?php echo $base_url; ?>assest/js/usuario.js"></script>
<script src="<?php echo $base_url; ?>assest/js/personal.js"></script>
<script src="<?php echo $base_url; ?>assest/js/proveedor.js"></script>
<script src="<?php echo $base_url; ?>assest/js/cliente.js"></script>
<script src="<?php echo $base_url; ?>assest/js/inmueble.js"></script>
<script src="<?php echo $base_url; ?>assest/js/material.js"></script>
<script src="<?php echo $base_url; ?>assest/js/proyecto.js"></script>
<script src="<?php echo $base_url; ?>assest/js/herramienta.js"></script>
<script src="<?php echo $base_url; ?>assest/js/venta.js"></script>
<script src="<?php echo $base_url; ?>assest/js/adquisicion.js"></script>
<script src="<?php echo $base_url; ?>assest/js/planCobro.js"></script>



<!--====================
seccion de modals
=====================-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content" id="content-default">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="content-lg">


    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="content-xl">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- jquery-validation -->
<script src="<?php echo $base_url; ?>assest/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo $base_url; ?>assest/plugins/jquery-validation/localization/messages_es.js"></script>

<script>
  //ADQUISICION DE MATERIALES Y HERRAMIENTAS
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaAdquisicion()
      }
    });
    $("#FormRegAdquisicion").validate({
      rules: {
        idProveedor: "required",
        fechaAdquisicion: "required",
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })
  //INGRESO DE HERRAMIENTAS
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaIngresoHerramienta()
      }
    });
    $("#FNotaIngresoHerramienta").validate({
      rules: {
        codIngresoH: {
          required: true,
          minlength: 1
        },
        conceptoIngresoH: {
          required: true,
          minlength: 3
        },
        codProyecto: {
          required: true
        },
        provisionador: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })

  //validacion para nota de ingreso MATERIALES
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaIngreso()
      }
    });
    $("#FNotaIngreso").validate({
      rules: {
        codIngreso: {
          required: true,
          minlength: 1
        },
        conceptoIngreso: {
          required: true,
          minlength: 3
        },
        codProyecto: {
          required: true
        },
        provisionador: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })

  //validacion para nota de salida
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaSalida()
      }
    });
    $("#FNotaSalida").validate({
      rules: {
        codSalida: {
          required: true,
          minlength: 1
        },
        conceptoSalida: {
          required: true,
          minlength: 3
        },
        codProyecto: {
          required: true
        },
        solicitante: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })

  //validacion para nota de salida Herramientas
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        emitirNotaSalidaH()
      }
    });
    $("#FNotaSalidaH").validate({
      rules: {
        codSalidaH: {
          required: true,
          minlength: 1
        },
        conceptoSalidaH: {
          required: true,
          minlength: 3
        },
        codProyecto: {
          required: true
        },
        solicitadoPor: {
          required: true
        }
      },

      errorElement: "span",
      errorPlacement: function(error, element) {
        error.addClass("invalid-feedback")
        element.closest(".input-group").append(error)
      },
      //destacar
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid")
      },

      //desmarcar
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass("is-invalid")
      }

    })
  })
</script>

<script>
  /*dataTable generico*/
  $(function() {
    $("#DataTable").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
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
    }).buttons().container().appendTo('#DataTable_wrapper .col-md-6:eq(0)');
    $('#DataTable td').css('padding', '5px');
    //$('#DataTable td').css('text-align', 'center'); 
  });

  $(function() {
    $("#DataTablePlanCobro").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
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
    }).buttons().container().appendTo('#DataTablePlanCobro_wrapper .col-md-6:eq(0)');
    $('#DataTablePlanCobro td').css('padding', '5px');
  });


  $(function() {
    $("#DataTableAdquisicion").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
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
    }).buttons().container().appendTo('#DataTableAdquisicion_wrapper .col-md-6:eq(0)');
    $('#DataTableAdquisicion td').css('padding', '5px');
    //$('#DataTable td').css('text-align', 'center'); 
  });


  $(function() {
    $("#DataTableVenta").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["excel", "pdf", "print"],
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
    }).buttons().container().appendTo('#DataTableVenta_wrapper .col-md-6:eq(0)');
    $('#DataTableVenta td').css('padding', '5px');
    //$('#DataTable td').css('text-align', 'center'); 
  });


  $(function() {
    $("#DataTableMaterial").DataTable({
      "ordering": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "colvis",
        {
          text: 'Imprimir', // Texto del botón personalizado
          action: function() {
            var newTab = window.open('vista/material/RepMaterial.php', '_blank');
            newTab.addEventListener('load', function() {
              newTab.print();
            });
          }
        }
      ],

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
    }).buttons().container().appendTo('#DataTableMaterial_wrapper .col-md-6:eq(0)');

  });

  // =====> DataTable para Herramientas
  $(function() {
    $("#DataTableHerramienta").DataTable({
      "ordering": true,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "print", "colvis",
        /* {
          text: 'Imprimir', // Texto del botón personalizado
          action: function () { 
            var newTab=window.open('vista/material/RepMaterial.php','_blank');
            newTab.addEventListener('load', function() {
              newTab.print();
            });
          }
        } */
      ],

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
    }).buttons().container().appendTo('#DataTableHerramienta_wrapper .col-md-6:eq(0)');
  });

  $(function() {
    $("#DataTable_NVenta").DataTable({
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
    })
  });

  $(function() {
    $("#DataTable_AdquisicionH").DataTable({
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
    })
  });

  $(function() {
    $("#DataTable_AdquisicionM").DataTable({
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
    })
  });

  /*select2 para formulario NE*/
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>

<script>
  $(document).ready(function() {
    // Inicializar las tablas
    var table1 = $('#DataTable_AdquisicionM').DataTable();
    var table2 = $('#DataTable_AdquisicionH').DataTable();

    // Alterna entre tablas
    $('input[name="tableOption"]').on('change', function() {
      $('.data-table').hide();
      var selectedTable = $(this).val();
      $('#' + selectedTable).show();

      // Redimensionar el DataTable 
      if (selectedTable === 'table1Container') {
        table1.columns.adjust().draw();
      } else {
        table2.columns.adjust().draw();
      }
    });
  });
</script>

<!--para registrar PWA-->
<script src="./regist_serviceWorker.js"></script>

</body>

</html>