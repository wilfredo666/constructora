function MNuevoHerramienta() {
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

function RegHerramienta() {

  var formData = new FormData($("#FormRegHerramienta")[0])

  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?ctrRegHerramienta",
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

function MEditHerramienta(id) {
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Herramienta/FEditHerramienta.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function EditHerramienta() {

  var formData = new FormData($("#FormEditHerramienta")[0])

  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?ctrEditHerramienta",
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

function MVerHerramienta(id) {
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
}

function MEliHerramienta(id) {
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
        url: "controlador/HerramientaControlador.php?ctrEliHerramienta",
        success: function (data) {
          /* console.log(data) */
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

function previsualizar() {
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

/*=======================
carrito - nota de salida
=======================*/
var arregloCarritoNS = []
var listaDetalleNS = document.getElementById("listaDetalleNS")

function agregarCarritoNS(id) {
  var obj = {
    idHerramienta: id
  }

  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?ctrBusHerramienta",
    data: obj,
    dataType: "json",
    success: function (data) {
      let objDetalle = {
        idHerramienta: data["id_Herramienta"],
        descHerramienta: data["desc_Herramienta"],
        cantHerramienta: 1,
      }
      arregloCarritoNS.push(objDetalle)
      dibujarTablaCarritoNS()
    }
  })
}

function dibujarTablaCarritoNS() {
  listaDetalleNS.innerHTML = ""
  arregloCarritoNS.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descHerramienta + '</td>' +
      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idHerramienta + '" value="' + detalle.cantHerramienta + '" onkeyup="actCantidadNS(' + detalle.idHerramienta + ')">' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarritoNS(detalle.idHerramienta)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalleNS.appendChild(fila)
  })
}

function eliminarCarritoNS(idProd) {
  arregloCarritoNS = arregloCarritoNS.filter((detalle) => {
    if (idProd != detalle.idHerramienta) {
      return detalle
    }
  })
  dibujarTablaCarritoNS()
}

function actCantidadNS(idProd) {
  let cantidad = parseInt(document.getElementById("cantProV_" + idProd).value)
  arregloCarritoNS.map(function (dato) {
    if (dato.idHerramienta == idProd) {
      dato.cantHerramienta = cantidad
    }
    return dato
  })
}

function emitirNotaSalida() {

  let codSalida = document.getElementById("codSalida").value
  let conceptoSalida = document.getElementById("conceptoSalida").value
  let codProyecto = document.getElementById("codProyecto").value
  let solicitante = document.getElementById("solicitante").value
  let obj = {
    "codSalida": codSalida,
    "conceptoSalida": conceptoSalida,
    "Herramientaes": JSON.stringify(arregloCarritoNS),
    "codProyecto": codProyecto,
    "solicitante": solicitante
  }

  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?ctrRegNotaSalida",
    data: obj,
    cache: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Salida registrada',
          timer: 1000
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

/*======================
carrito nota de ingreso
========================*/
var arregloCarritoNI = []
var listaDetalleNI = document.getElementById("listaDetalleNI")
function agregarCarritoNI(id) {
  var obj = {
    idHerramienta: id
  }
  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?ctrBusHerramienta",
    data: obj,
    dataType: "json",
    success: function (data) {
      let objDetalle = {
        idHerramienta: data["id_Herramienta"],
        descHerramienta: data["desc_Herramienta"],
        cantHerramienta: 1,
      }
      arregloCarritoNI.push(objDetalle)
      dibujarTablaCarritoNI()
    }
  })
}

function dibujarTablaCarritoNI() {
  listaDetalleNI.innerHTML = ""
  arregloCarritoNI.forEach((detalle) => {
    let fila = document.createElement("tr")

    fila.innerHTML = '<td>' + detalle.descHerramienta + '</td>' +
      '<td><input type="number" class="form-control form-control-sm" id="cantProV_' + detalle.idHerramienta + '" value="' + detalle.cantHerramienta + '" onkeyup="actCantidadNI(' + detalle.idHerramienta + ')">' + '</td>'

    let tdEliminar = document.createElement("td")
    let botonEliminar = document.createElement("button")
    botonEliminar.classList.add("btn", "btn-danger", "btn-sm", "borrar")
    let icono = document.createElement("i")
    icono.classList.add("fas", "fa-trash")
    botonEliminar.appendChild(icono)
    botonEliminar.onclick = () => {
      eliminarCarritoNI(detalle.idHerramienta)
    }

    tdEliminar.appendChild(botonEliminar)
    fila.appendChild(tdEliminar)

    listaDetalleNI.appendChild(fila)
  })
}

function actCantidadNI(idProd) {
  let cantidad = parseInt(document.getElementById("cantProV_" + idProd).value)

  arregloCarritoNI.map(function (dato) {
    //console.log(dato);
    if (dato.idHerramienta == idProd) {
      dato.cantHerramienta = cantidad
    }
    return dato
  })
}

function eliminarCarritoNI(idProd) {

  arregloCarritoNI = arregloCarritoNI.filter((detalle) => {
    if (idProd != detalle.idHerramienta) {
      return detalle
    }
  })
  dibujarTablaCarritoNI()
}

function emitirNotaIngreso() {

  let codIngreso = document.getElementById("codIngreso").value
  let conceptoIngreso = document.getElementById("conceptoIngreso").value
  let codProyecto = document.getElementById("codProyecto").value
  let provisionador = document.getElementById("provisionador").value

  let obj = {
    "codIngreso": codIngreso,
    "conceptoIngreso": conceptoIngreso,
    "Herramientaes": JSON.stringify(arregloCarritoNI),
    "codProyecto": codProyecto,
    "provisionador": provisionador
  }

  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?ctrRegNotaIngreso",
    data: obj,
    cache: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Ingreso registrada',
          timer: 1000
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

function MVerIngreso(id){
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Herramienta/MVerIngreso.php?id="+id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MVerSalida(id){
  $("#modal-lg").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Herramienta/MVerSalida.php?id="+id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
}

function MEliSalida(id) {
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
        url: "controlador/HerramientaControlador.php?ctrEliSalida",
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

function MEliIngreso(id) {
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
        url: "controlador/HerramientaControlador.php?ctrEliIngreso",
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

function BusRepHerramienta(){//pediente sin uso
  // Obtener valores de los campos de fecha
  const fechaInicio = document.getElementById('fechaInicio').value;
  const fechaFin = document.getElementById('fechaFin').value;

  // Obtener valor del radio button seleccionado
  let ingSal;
  const radioButtons = document.getElementsByName('ingSal');
  for (let i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      ingSal = radioButtons[i].value;
      break;
    }
  }

  var obj={
    fechaInicio:fechaInicio,
    fechaFin:fechaFin,
    ingSal:ingSal
  }

  $.ajax({
    type: "POST",
    url: "controlador/HerramientaControlador.php?BusRepHerramienta",
    data: obj,
    success: function (data) {
      $("#respReporte").html(data)
      var input = $('<input type="hidden" name="responseData" />').val(JSON.stringify(data));

      /*var responseData = JSON.parse(data);
      var params = new URLSearchParams({data: JSON.stringify(responseData)}).toString();
      window.location.href = "RepHerramientaes.php?" + params;*/

      //console.log(data)
    }
  })
}
