function MNuevoProyecto(){
  $("#modal-lg").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/proyecto/FNuevoProyecto.php",
    data:obj,
    success:function(data){
      $("#content-lg").html(data)
    }
  })
}

function RegProyecto(){

    var formData= new FormData($("#FormRegProyecto")[0])

    $.ajax({
      type:"POST",
      url:"controlador/proyectoControlador.php?ctrRegProyecto",
      data:formData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(data){
        if(data=="ok"){
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Nuevo proyecto registrado',
            timer: 1000
          })
          setTimeout(function(){
            location.reload()
          },1200)
        }else{
          Swal.fire({
            icon:'error',
            title:'Error!',
            text:'El proyecto ya esta en uso',
            showConfirmButton: false,
            timer:1500
          })
        }
      }
    })
 
}

function MEditProyecto(id){
  $("#modal-lg").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/proyecto/FEditProyecto.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-lg").html(data)
    }
  })
}

function EditProyecto(){


    var formData= new FormData($("#FormEditProyecto")[0])

    $.ajax({
      type:"POST",
      url:"controlador/proyectoControlador.php?ctrEditProyecto",
      data:formData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(data){
        if(data=="ok"){
          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'El Proyecto ha sido actualizado',
            timer: 1000
          })
          setTimeout(function(){
            location.reload()
          },1200)
        }else{
          Swal.fire({
            icon:'error',
            title:'Error!',
            text:'No se ha podido actualizar!!!',
            showConfirmButton: false,
            timer:1500
          })
        }
      }
    })

}

function MVerProyecto(id){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/Proyecto/MVerProyecto.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }
  })
}

function MEliProyecto(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:'¿Esta seguro de eliminar este Proyecto?',
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'    
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        data:obj,
        url:"controlador/proyectoControlador.php?ctrEliProyecto",
        success:function(data){

          if(data=="ok"){
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'Proyecto eliminado',
              timer: 1000
            })
            setTimeout(function(){
              location.reload()
            },1200)
          }else{
            Swal.fire({
              icon:'error',
              title:'Error!!!',
              text:'El Proyecto no puede ser eliminado, porque es un Proyecto activo',
              showConfirmButton:false,
              timer:1900
            })
          }
        }
      })

    }
  })
}

