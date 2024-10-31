function MNuevoAdquisicion() { //ok
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/adquisicion/FNuevoAdquisicion.php",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function RegAdquisicion() { //ok

  var formData = new FormData($("#FormRegAdquisicion")[0])

  $.ajax({
    type: "POST",
    url: "controlador/adquisicionControlador.php?ctrRegAdquisicion",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'La Adquisicion ha sido registrado',
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

function MEditAdquisicion(id) { //ok
  $("#modal-default").modal("show")

  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/adquisicion/FEditAdquisicion.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditAdquisicion() { //ok

  var formData = new FormData($("#FormEditAdquisicion")[0])

  $.ajax({
    type: "POST",
    url: "controlador/adquisicionControlador.php?ctrEditAdquisicion",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {

      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'La Adquisicion ha sido actualizado',
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

/* function MVerAdquisicion(id) {
  $("#modal-lg").modal("show")
  var obj = ""
  $.ajax({
    type: "POST",
    url: "vista/Adquisicion/MVerAdquisicion.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-lg").html(data)
    }
  })
} */

function MEliAdquisicion(id) { //ok
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
        url: "controlador/adquisicionControlador.php?ctrEliAdquisicion",
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
              text: 'El registro no puede ser eliminado, porque tiene registros almacenados en la base de datos',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      })
    }
  })
}

function previsualizarAdquisicion() { //ok
  let imagen = document.getElementById("ImgAdquisicion").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg" && imagen["type"] != "image/jpg") {
    $("#ImgAdquisicion").val("")
    swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG, JPG o JPEG"
    })
  } else if (imagen["size"] > 10000000) {
    $("#ImgAdquisicion").val("")
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

function emitirNotaAdquisicion() {

  let codAdquisicion = document.getElementById("codAdquisicion").value
  let idProveedor = document.getElementById("idProveedor").value
  let fechaAdquisicion = document.getElementById("fechaAdquisicion").value
  let fechaEntrega = document.getElementById("fechaEntrega").value


  // PARA AÑADIR TOTAL EN MATERIAL
  let Mate = JSON.stringify(arregloCarritoNI);
  const arregloMaterial = JSON.parse(Mate);
  // Itera sobre el arreglo y calcula el total
  arregloMaterial.forEach(item => {
    item.total = item.cantMaterial * parseFloat(item.valor_unidad);
  });

  // PARA AÑADIR TOTAL EN HERRAMIENTA
  let Herra = JSON.stringify(arregloCarritoNIH);
  const arregloHerramienta = JSON.parse(Herra);

  arregloHerramienta.forEach(itemH => {
    itemH.total = itemH.cantHerramienta * parseFloat(itemH.valor_herramienta);
  });

  //concatenandos los arreglos
  const adquisicionProductos = arregloMaterial.concat(arregloHerramienta);

  let obj = {
    "codAdquisicion": codAdquisicion,
    "idProveedor": idProveedor,
    "adquisicionProductos": JSON.stringify(adquisicionProductos),
    "fechaAdquisicion": fechaAdquisicion,
    "fechaEntrega": fechaEntrega
  }

  $.ajax({
    type: "POST",
    url: "controlador/adquisicionControlador.php?ctrRegNotaAdquisicion",
    data: obj,
    cache: false,
    success: function (data) {
      if (data == "ok") {
        Swal.fire({
          icon: 'success',
          showConfirmButton: false,
          title: 'Nota de Adquisición de Productos registrada',
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