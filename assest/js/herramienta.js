function MNuevoHerramienta() { //ok
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/herramienta/FNuevoHerramienta.php",
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function RegHerramienta() { //ok

  var formData = new FormData($("#FormRegHerramienta")[0])

  $.ajax({
    type: "POST",
    url: "controlador/herramientaControlador.php?ctrRegHerramienta",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Herramienta ha sido registrado',
          timer: 1000
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Erro de registro!!!',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })


}

function MEditHerramienta(id) { //ok
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/herramienta/FEditHerramienta.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function EditHerramienta() { //ok

  var formData = new FormData($("#FormEditHerramienta")[0])

  $.ajax({
    type: "POST",
    url: "controlador/herramientaControlador.php?ctrEditHerramienta",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'El Herramienta ha sido actualizado',
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

/* function MVerHerramienta(id) {
  $("#modal-lg").modal("show")
  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Herramienta/MVerHerramienta.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
} */

function MEliHerramienta(id) { //ok
  var obj = {
    id: id
  }

  Swal.fire({
    title: 'Esta seguro de eliminar este ITEM?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/herramientaControlador.php?ctrEliHerramienta",
        success: function (data) {
          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'ITEM eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El ITEM no puede ser eliminado, porque tiene registros',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }
  })
}

function previsualizarHerramienta() {  //ok
  let imagen = document.getElementById("ImgHerramienta").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg" && imagen["type"] != "image/jpg") {
    $("#ImgHerramienta").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG, JPG o JPEG"
    })
  } else if (imagen["size"] > 10000000) {
    $("#ImgHerramienta").val("")
    Swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen no debe superior a 10MB"
    })

  } else {
    let datosImagen = new FileReader
    datosImagen.readAsDataURL(imagen)

    $(datosImagen).on("load", function (event) {
      let rutaImagen = event.target.result
      $(".previsualizar").attr("src", rutaImagen)

    })
  }
}

/* ========================================
CARRITO PARA INGRESO DE HERRAMIENTAS
============================================ */
var arregloCarritoNIH = []
var listaDetalleNIH = document.getElementById("listaDetalleNIH")

function agregarCarritoNIH(id) {
  var obj = {
    idHerramienta: id
  }
  $.ajax({
    type: "POST",
    url: "controlador/herramientaControlador.php?ctrBusHerramienta",
    data: obj,
    dataType: "json",
    success: function (data) {
      /* console.log(data); */
      
      let objDetalle = {
        idHerramienta: data["id_herramienta"],
        descHerramienta: data["desc_herramienta"],
        cod_herramienta: data["cod_herramienta"],
        cod_clasificacion_her: data["cod_clasificacion_her"],
        cantHerramienta: 1,
        valor_herramienta: data["valor_herramienta"],
      }
      arregloCarritoNIH.push(objDetalle)
      dibujarTablaCarritoNIH()
    }
  })
}

function dibujarTablaCarritoNIH() {
  listaDetalleNIH.innerHTML = ""
  arregloCarritoNIH.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descHerramienta + '</td>' +
      '<td>' + detalle.cod_herramienta + '</td>' +
      '<td>' + detalle.valor_herramienta + '</td>' +
    '<td><input type="number" class="form-control form-control-sm" id="cantProVH_' + detalle.idHerramienta + '" value="' + detalle.cantHerramienta + '" onkeyup="actCantidadNIH(' + detalle.idHerramienta + ')">' + '</td>' 

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarritoNIH(detalle.idHerramienta)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalleNIH.appendChild(fila)
  })
}

function actCantidadNIH(idHerr) {
  let cantidad = parseInt(document.getElementById("cantProVH_" + idHerr).value)

  arregloCarritoNIH.map(function (dato) {
    //console.log(dato);
    if (dato.idHerramienta == idHerr) {
      dato.cantHerramienta = cantidad
    }
    return dato
  })
}

function eliminarCarritoNIH(idHerr) {

  arregloCarritoNIH = arregloCarritoNIH.filter((detalle) => {
    if (idHerr != detalle.idHerramienta) {
      return detalle
    }
  })
  dibujarTablaCarritoNIH()
}

function emitirNotaIngresoHerramienta() {

  let codIngresoH = document.getElementById("codIngresoH").value
  let conceptoIngresoH = document.getElementById("conceptoIngresoH").value
  let codProyecto = document.getElementById("codProyecto").value
  let provisionador = document.getElementById("provisionador").value

  let obj = {
    "codIngreso": codIngresoH,
    "conceptoIngreso": conceptoIngresoH,
    "herramientas": JSON.stringify(arregloCarritoNIH),
    "codProyecto": codProyecto,
    "provisionador": provisionador
  }

  $.ajax({
    type: "POST",
    url: "controlador/herramientaControlador.php?ctrRegNotaIngresoHerramienta",
    data: obj,
    cache: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso de Herramientas registrada',
          timer: 1500
        })
        setTimeout(function () {
          location.reload()
        }, 1200)
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'Error de registro',
          showConfirmButton: false,
          timer: 1500
        })
      }
    }
  })
}
/* ///////// */
function MVerIngresoHerra(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/herramienta/MVerIngresoHerramienta.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MEliIngresoHerra(id) {
  var obj = {
    id: id
  }

  Swal.fire({
    title: 'Esta seguro de eliminar este registro?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: 'Confirmar',
    denyButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/herramientaControlador.php?ctrEliIngresoHerra",
        success: function (data) {

          if (data == "ok") {
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Registro eliminado',
              timer: 1000
            })
            setTimeout(function () {
              location.reload()
            }, 1200)
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error!!!',
              text: 'El registro no puede ser eliminado, porque tiene registros hijos',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }
  })
}
