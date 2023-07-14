function validar_login() {

  var formData = new FormData();

  var correo = $("#correo").val();
  var password = $("#password").val();

  if(correo == "" || password == ""){
    let errorDiv = document.getElementById("error");
    errorDiv.innerHTML = "Debes llenar todos los campos";
    errorDiv.style.display = "block";
  }else{

    formData.append("correo", correo);
    formData.append("password", password);

    
    $.ajax({
      url: "funciones/login.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

          if(respuesta.status == "success"){
            window.location.href = "home.php";
            
          }else{
            var errorDiv = document.getElementById("error");
            errorDiv.innerHTML = respuesta.message;
            errorDiv.style.display = "block";
          } 
      }
    });
    
  }

}



function agregar_datos() {

  var formData = new FormData();
  
  var nombre = $("#nombre").val();
  var apellidos = $("#apellidos").val();
  var correo = $("#correo").val();
  var password = $("#password").val();
  

  if(nombre == "" || apellidos == "" || correo == "" || password == ""){
    alert("Debes llenar todos los campos");
  }

  else{

    formData.append("imagen", $("#imagen")[0].files[0]); // agregar la imagen seleccionada al formulario
    formData.append("nombre", $("#nombre").val());
    formData.append("apellidos", $("#apellidos").val());
    formData.append("correo", $("#correo").val());
    formData.append("password", $("#password").val());
    formData.append("rol", $("#rol").val());

    
    $.ajax({
      url: "funciones/insertar.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

          if(respuesta.status == "success"){
            $("#frm_agregar")[0].reset();
            alert(respuesta.message);
          }else{
            alert(respuesta.message);
          } 
      }
    });
    
  }

}


function elimina(id){
        

        if(confirm("¿Seguro que quieres borrar el registro?")){
            $.ajax({
               
                url      : 'funciones/elimina.php',
                type     : 'post',
                dataType : 'text',
                data     : 'id='+ id,
            
                success : function(res) {
                   window.location.reload();
                   alert("Se eliminó");
                },
                error:function(){
                    alert("archivo no encontrado");
                }
            });
        }
}



function eliminaCarrito(id){
        
  
  if(confirm("¿Seguro que quieres quitar este producto?")){
      $.ajax({
         
          url      : 'funciones/eliminaCarrito.php',
          type     : 'post',
          dataType : 'text',
          data     : 'id='+ id,
      
          success : function(res) {
             window.location.reload();
             alert("Se eliminó");
          },
          error:function(){
              alert("Error");
          }
      });
  }
}



function eliminaProducto(id){
        

        if(confirm("¿Seguro que quieres borrar el registro?")){
            $.ajax({
               
                url      : 'funciones/eliminaProducto.php',
                type     : 'post',
                dataType : 'text',
                data     : 'id='+ id,
            
                success : function(res) {
                   window.location.reload();
                   alert("Se eliminó");
                },
                error:function(){
                    alert("archivo no encontrado");
                }
            });
        }
}

function eliminaBanners(id){
        

        if(confirm("¿Seguro que quieres borrar el banner?")){
            $.ajax({
               
                url      : 'funciones/eliminarBanners.php',
                type     : 'post',
                dataType : 'text',
                data     : 'id='+ id,
            
                success : function(res) {
                   window.location.reload();
                   alert("Se eliminó");
                },
                error:function(){
                    alert("archivo no encontrado");
                }
            });
        }
}

function actualizar_datos() {
  var formData = new FormData();
  
  var id = $("#id").val();
  var nombre = $("#nombre").val();
  var apellidos = $("#apellidos").val();
  var correo = $("#correo").val();
  var password = $("#password").val();
  
  

  if(nombre == "" || apellidos == "" || correo == "" || password == ""){
    alert("Debes llenar todos los campos");
  }
  else{

    formData.append("imagen", $("#imagen")[0].files[0]); // agregar la imagen seleccionada al formulario
    formData.append("id", $("#id").val());
    formData.append("nombre", $("#nombre").val());
    formData.append("apellidos", $("#apellidos").val());
    formData.append("correo", $("#correo").val());
    formData.append("password", $("#password").val());
    formData.append("rol", $("#rol").val());

    

    $.ajax({
      url: "funciones/actualizarRegistro.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        alert(respuesta.message);

        if(respuesta.status == "success")
          location.reload();
        
      }
    });
    
  }

  //alert("Se modificó correctamente");
  //location.reload();
  

}
function actualizar_producto() {
    var formData = new FormData();
  
  var id = $("#id").val();
  var nombre = $("#nombre").val();
  var codigo = $("#codigo").val();
  var descripcion = $("#descripcion").val();
  var costo = $("#costo").val();
  var stock = $("#stock").val();



  if(nombre == "" || codigo == "" || descripcion == "" || costo == "" || stock == ""){
    alert("Debes llenar todos los campos");
  }
  else{

    formData.append("imagen", $("#imagen")[0].files[0]); // agregar la imagen seleccionada al formulario
    formData.append("id", id);
    formData.append("nombre", nombre);
    formData.append("codigo", codigo);
    formData.append("descripcion", descripcion);
    formData.append("costo", costo);
    formData.append("stock", stock);

    

      $.ajax({
      url: "funciones/actualizarProducto.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        alert(respuesta.message);

        if(respuesta.status == "success")
         location.reload();
        
      }
    });
    
  }

  //alert("Se modificó correctamente");
  //location.reload();
  

}
function actualizar_banners() {
    var formData = new FormData();
  
  var id = $("#id").val();
  var nombre = $("#nombre").val();
  



  if(nombre == ""  ){
    alert("Debes llenar todos los campos");
  }
  else{

    formData.append("imagen", $("#imagen")[0].files[0]); // agregar la imagen seleccionada al formulario
    formData.append("id", id);
    formData.append("nombre", nombre);
    

    

      $.ajax({
      url: "funciones/actualizarBanners.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        alert(respuesta.message);

        if(respuesta.status == "success")
          location.reload();
        
      }
    });
    
  }

  //alert("Se modificó correctamente");
  //location.reload();
  

}


function actualizar_carrito(id, cantidadBox, idProducto) {
  var formData = new FormData();
  
  var cantidad =  document.getElementById(cantidadBox).value;


  formData.append("id",id);
  formData.append("idProducto",idProducto);
  formData.append("cantidad", cantidad);
  

  
    $.ajax({
      url: "funciones/actualizarCarrito.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        alert(respuesta.message);

        if(respuesta.status == "success")
          location.reload();
        
      }
    });
    
  

  //alert("Se modificó correctamente");
  //location.reload();
  

}


function foo(){

  
  $.ajax({
      url: "funciones/pruebaSesion.php",
      type: "POST",
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {
        if(respuesta.status == "success"){
          alert(respuesta.message);
          location.reload();
        }
        
      }
    });
  
}

function agregar_Carrito(id){

  var formData = new FormData();
  formData.append('id', id);

  $.ajax({
      url: "funciones/agregarCarrito.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

          alert(respuesta.message);

          if(respuesta.status == "success")
            location.reload();
          
      }
    });
  
}



function agregar_productos(  ) {
  var formData = new FormData();
  
  var id = $("#id").val();
  var nombre = $("#nombre").val();
  var codigo = $("#codigo").val();
  var descripcion = $("#descripcion").val();
  var costo = $("#costo").val();
  var stock = $("#stock").val();


  
  

  if(nombre == "" || codigo == "" || descripcion == "" || costo == "" || stock == ""){
    alert("Debes llenar todos los campos");
  }
  else{

    formData.append("imagen", $("#imagen")[0].files[0]); // agregar la imagen seleccionada al formulario
    formData.append("id", id);
    formData.append("nombre", nombre);
    formData.append("codigo", codigo);
    formData.append("descripcion", descripcion);
    formData.append("costo", costo);
    formData.append("stock", stock);

    

    $.ajax({
      url: "funciones/insertarProducto.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        alert(respuesta.message);

        if(respuesta.status == "success"){
          $("#frm_agregar")[0].reset();
        }
        
      }
    });
    
  }

  //alert("Se modificó correctamente");
  //location.reload();
  

}


function agregar_banners() {
  var formData = new FormData();
  
  var id = $("#id").val();
  var nombre = $("#nombre").val();
 


  if(nombre == ""  ){
    alert("Debes llenar todos los campos");
  }
  else{

    formData.append("imagen", $("#imagen")[0].files[0]); // agregar la imagen seleccionada al formulario
    formData.append("nombre", nombre);
    formData.append("id", id);
    

    

    $.ajax({
      url: "funciones/insertarBanners.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function(respuesta) {

        alert(respuesta.message);

        if(respuesta.status == "success"){
          $("#frm_agregar")[0].reset();
        }
        
      }
    });
    
  }

  //alert("Se modificó correctamente");
  //location.reload();
 
}
