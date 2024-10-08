function MListaInmueble() {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/inmueble/ListaInmuebles.php",
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}
function MNuevoInmueble() {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Inmueble/FNuevoInmueble.php",
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function RegInmueble() {

  var formData = new FormData($("#FormRegInmueble")[0])

  $.ajax({
    type: "POST",
    url: "controlador/InmuebleControlador.php?ctrRegInmueble",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Inmueble ha sido registrado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}

function MEditInmueble(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Inmueble/FEditInmueble.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function EditInmueble() {
  var formData = new FormData($("#FormEditInmueble")[0])
  $.ajax({
    type: "POST",
    url: "controlador/InmuebleControlador.php?ctrEditInmueble",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Inmueble ha sido actualizado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'No se ha podido actualizar!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}

function MVerInmueble(id) {
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Inmueble/MVerInmueble.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function MEliInmueble(id) {
  var obj = {
    id: id
  }
  Swal.fire({
    title: '¿Esta seguro de eliminar este Inmueble?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/InmuebleControlador.php?ctrEliInmueble",
        success: function (data) {
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Inmueble eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El Inmueble no puede ser eliminado debido a estar activo o en uso',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })

    }
  })
}