$(document).ready(function() {
    /*Envio del formulario con Ajax para eliminar producto*/
    $('#del-prod-form form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-prod-form form').serialize();
         var metodo=$('#del-prod-form form').attr('method');
         var peticion=$('#del-prod-form form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-prod").html('Eliminando producto <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-prod").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-prod").html(data);
            }
        });
        return false;
    });
    
   

    /*Envio del formulario con Ajax para añadir categoria*/
    $('#add-categori form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#add-categori form').serialize();
         var metodo=$('#add-categori form').attr('method');
         var peticion=$('#add-categori form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-add-categori").html('Añadiendo categoria <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-add-categori").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-add-categori").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para añadir carro */
    $('#add-carro form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#add-carro form').serialize();
         var metodo=$('#add-carro form').attr('method');
         var peticion=$('#add-carro form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-add-carro").html('Añadiendo vehiculos <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-add-carro").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-add-carro").html(data);
            }
        });
        return false;
    });


    /*Envio del formulario con Ajax para eliminar categoria*/
    $('#del-categori form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-categori form').serialize();
         var metodo=$('#del-categori form').attr('method');
         var peticion=$('#del-categori form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-cat").html('Eliminando categoria <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-cat").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-cat").html(data);
            }
        });
        return false;
    });

     /*Envio del formulario con Ajax para eliminar carro*/
    $('#del-carro form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-carro form').serialize();
         var metodo=$('#del-carro form').attr('method');
         var peticion=$('#del-carro form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-car").html('Eliminando vehiculo <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-car").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-car").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para agregar proveedor*/
    $('#add-provee form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#add-provee form').serialize();
         var metodo=$('#add-provee form').attr('method');
         var peticion=$('#add-provee form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-add-prove").html('Agregando proveedor <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-add-prove").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-add-prove").html(data);
            }
        });
        return false;
    });

     /*Envio del formulario con Ajax para agregar ubicacion*/
    $('#addUbicacion form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#addUbicacion form').serialize();
         var metodo=$('#addUbicacion form').attr('method');
         var peticion=$('#addUbicacion form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-add-ubicacion").html('Agregando ubicacion <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-add-prove").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-add-ubicacion").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para agregar sucursal*/
$('#add-sucursal form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#add-sucursal form').serialize();
         var metodo=$('#add-sucursal form').attr('method');
         var peticion=$('#add-sucursal form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-add-sucursal").html('Agregando sucursal <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-add-sucursal").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-add-sucursal").html(data);
            }
        });
        return false;
    });

     /*Envio del formulario con Ajax para agregar sucursal*/
$('#add-cliente form').submit(function(e) {
    e.preventDefault();
    var informacion=$('#add-cliente form').serialize();
    var metodo=$('#add-cliente form').attr('method');
    var peticion=$('#add-cliente form').attr('action');
    $.ajax({
       type: metodo,
       url: peticion,
       data:informacion,
       beforeSend: function(){
           $("#res-form-add-cliente").html('Agregando cliente <br><img src="assets/img/enviando.gif" class="center-all-contens">');
       },
       error: function() {
           $("#res-form-add-cliente").html("Ha ocurrido un error en el sistema");
       },
       success: function (data) {
           $("#res-form-add-cliente").html(data);
           window.location.href="configAdmin.php";
       }
   });
   return false;
});

    /*Envio del formulario con Ajax para agregar proveedor desde Modal*/
    $('#proveedorPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#proveedorPopup form').serialize();
         var metodo=$('#proveedorPopup form').attr('method');
         var peticion=$('#proveedorPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addProveedor").html('Agregando proveedor <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addProveedor").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#addProveedor").html(data);
            }
        });
        return false;
    });
    
	 /*Envio del formulario con Ajax para actualizar clientes desde Modal*/
    $('#editarClientePopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#editarClientePopup form').serialize();
         var metodo=$('#editarClientePopup form').attr('method');
         var peticion=$('#editarClientePopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#editCliente").html('Agregando proveedor <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#editCliente").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#editCliente").html(data);
            }
        });
        return false;
    });
	
    /*Envio del formulario con Ajax para agregar marca desde Modal*/
    $('#marcaPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#marcaPopup form').serialize();
         var metodo=$('#marcaPopup form').attr('method');
         var peticion=$('#marcaPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addMarca").html('Agregando Marca <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addMarca").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                
                $("#addMarca").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para agregar categoria desde Modal*/
    $('#categoriaPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#categoriaPopup form').serialize();
         var metodo=$('#categoriaPopup form').attr('method');
         var peticion=$('#categoriaPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addCateoria").html('Agregando Marca <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addCategoria").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                
                $("#addCategoria").html(data);
            }
        });
        return false;
    });

     /*Envio del formulario con Ajax para agregar Carro desde Modal*/
    $('#carroPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#carroPopup form').serialize();
         var metodo=$('#carroPopup form').attr('method');
         var peticion=$('#carroPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addCarro").html('Agregando Marca <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addCarro").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#addCarro").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para eliminar proveedor*/
    $('#del-prove form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-prove form').serialize();
         var metodo=$('#del-prove form').attr('method');
         var peticion=$('#del-prove form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-prove").html('Eliminando proveedor <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-prove").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-prove").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para eliminar proveedor*/
    $('#delUbicacion form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#delUbicacion form').serialize();
         var metodo=$('#delUbicacion form').attr('method');
         var peticion=$('#delUbicacion form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-ubicacion").html('Eliminando ubicacion <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-ubicacion").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-ubicacion").html(data);
            }
        });
        return false;
    });

    /*Envio del formulario con Ajax para eliminar sucursal*/
    $('#del-sucursal form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-sucursal form').serialize();
         var metodo=$('#del-sucursal form').attr('method');
         var peticion=$('#del-sucursal form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-sucursal").html('Eliminando ubicacion <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-sucursal").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-sucursal").html(data);
            }
        });
        return false;
    });


    
    /*Actualizar categoria con ajax*/
    $('.button-UC').click(function() {
	var myId = $(this).val();
        $('#update-category form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-category form#'+myId).serialize();
             var metodo=$('#update-category form#'+myId).attr('method');
             var peticion=$('#update-category form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });

    /*Actualizar carro con ajax*/
    $('.button-UM').click(function() {
    var myId = $(this).val();
        $('#update-carro form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-carro form#'+myId).serialize();
             var metodo=$('#update-carro form#'+myId).attr('method');
             var peticion=$('#update-carro form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    }); 

     /*Actualizar precios con ajax*/
    $('.button-UPC').click(function() {
    var myId = $(this).val();
        $('#update-precios form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-precios form#'+myId).serialize();
             var metodo=$('#update-precios form#'+myId).attr('method');
             var peticion=$('#update-precios form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });

     /*Actualizar precios con ajax*/
     $('.button-UUS').click(function() {
        var myId = $(this).val();
            $('#update-user form#'+myId).submit(function(e) {
                 e.preventDefault();
                 var informacion=$('#update-user form#'+myId).serialize();
                 var metodo=$('#update-user form#'+myId).attr('method');
                 var peticion=$('#update-user form#'+myId).attr('action');
                 $.ajax({
                    type: metodo,
                    url: peticion,
                    data:informacion,
                    beforeSend: function(){
                        $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                    },
                    error: function() {
                        $("div#"+myId).html("Ha ocurrido un error en el sistema");
                    },
                    success: function (data) {
                        $("div#"+myId).html(data);
                    }
                });
                return false;
            });
        });

    /*Actualizar sucursal con ajax*/
    $('.button-US').click(function() {
    var myId = $(this).val();
        $('#update-sucursal form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-sucursal form#'+myId).serialize();
             var metodo=$('#update-sucursal form#'+myId).attr('method');
             var peticion=$('#update-sucursal form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });

    /*Actualizar sucursal con ajax*/
    $('.button-US').click(function(){
    var myId = $(this).val();
        $('#update-suc form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-suc form#'+myId).serialize();
             var metodo=$('#update-suc form#'+myId).attr('method');
             var peticion=$('#update-suc form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });
    
    /*Actualizar proveedores con ajax*/
    $('.button-UP').click(function() {
	var myId = $(this).val();
        $('#update-proveedor form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-proveedor form#'+myId).serialize();
             var metodo=$('#update-proveedor form#'+myId).attr('method');
             var peticion=$('#update-proveedor form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });
    
    /*Actualizar producto con ajax*/
    $('.button-UPR').click(function() {
	var myId = $(this).val();
        $('#update-product form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-product form#'+myId).serialize();
             var metodo=$('#update-product form#'+myId).attr('method');
             var peticion=$('#update-product form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });
    
    /*Actualizar ubicacion con ajax*/
    $('.button-UU').click(function() {
    var myId = $(this).val();
        $('#update-ubicacion form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-ubicacion form#'+myId).serialize();
             var metodo=$('#update-ubicacion form#'+myId).attr('method');
             var peticion=$('#update-ubicacion form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });


    /*Envio del formulario con Ajax para agregar administrador*/
    $('#add-admin form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#add-admin form').serialize();
         var metodo=$('#add-admin form').attr('method');
         var peticion=$('#add-admin form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-add-admin").html('Agregando usuario...<br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-add-admin").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-add-admin").html(data);
            }
        });
        return false;
    });
    
    /*Envio del formulario con Ajax para eliminar administrador*/
    $('#del-admin form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-admin form').serialize();
         var metodo=$('#del-admin form').attr('method');
         var peticion=$('#del-admin form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-admin").html('Eliminando usuario<br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-admin").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-admin").html(data);
            }
        });
        return false;
    });
    
    /*Actualizar pedido con ajax*/
    $('.button-UPPE').click(function() {
	var myId = $(this).val();
        $('#update-pedido form#'+myId).submit(function(e) {
             e.preventDefault();
             var informacion=$('#update-pedido form#'+myId).serialize();
             var metodo=$('#update-pedido form#'+myId).attr('method');
             var peticion=$('#update-pedido form#'+myId).attr('action');
             $.ajax({
                type: metodo,
                url: peticion,
                data:informacion,
                beforeSend: function(){
                    $("div#"+myId).html('<br><img src="assets/img/Update.gif" class="center-all-contens"><br>Actualizando...');
                },
                error: function() {
                    $("div#"+myId).html("Ha ocurrido un error en el sistema");
                },
                success: function (data) {
                    $("div#"+myId).html(data);
                }
            });
            return false;
        });
    });
    
    /*Envio del formulario con Ajax para eliminar pedido*/
    $('#del-pedido form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#del-pedido form').serialize();
         var metodo=$('#del-pedido form').attr('method');
         var peticion=$('#del-pedido form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-form-del-pedido").html('Registrando cuenta a Pagar...<br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-form-del-pedido").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {
                $("#res-form-del-pedido").html(data);
            }
        });
        return false;
    });

/*Envio del formulario con Ajax para eliminar pedido*/
$('#del-cliente form').submit(function(e) {
    e.preventDefault();
    var informacion=$('#del-cliente form').serialize();
    var metodo=$('#del-cliente form').attr('method');
    var peticion=$('#del-cliente form').attr('action');
    $.ajax({
       type: metodo,
       url: peticion,
       data:informacion,
       beforeSend: function(){
           $("#res-form-del-cliente").html('eliminando cliente...<br><img src="assets/img/enviando.gif" class="center-all-contens">');
       },
       error: function() {
           $("#res-form-del-cliente").html("Ha ocurrido un error en el sistema");
       },
       success: function (data) {
           $("#res-form-del-cliente").html(data);
       }
   });
   return false;
});

});


function insertaACombo( selectId,valor,texto) {
        var select= document.getElementById(selectId);
        var opt = document.createElement('option');
        opt.value =valor;
        opt.innerHTML = texto;
        select.appendChild(opt);

        
}

