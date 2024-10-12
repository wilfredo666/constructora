function RegVenta(){   
    var formData = new FormData($("#FormRegVenta")[0])
    $.ajax({
      type: "POST",
      url: "controlador/ventaControlador.php?ctrRegVenta",
      data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
        console.log(data);

        if (data == "ok") {
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'La venta ha sido registrada',
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