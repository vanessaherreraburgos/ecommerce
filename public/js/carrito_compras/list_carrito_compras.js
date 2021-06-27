

function eliminar_producto_carrito(id_producto){

    var url = conf.baseURL+laroute.route('cart.removeitem', { id: id_producto });
    $.ajax({            
        url: url,
        type: "GET",
    
        success: function(data) {

            if (data.success) {                   
                location.reload();
            }else{
                swal({title: "Información", confirmButtonColor: "#1e8ac2", text: "Ocurrio un error al eliminar el producto del carrito de compras.", type: "warning" });
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            swal({title: sw_al.error, confirmButtonColor: "#1e8ac2", text: "Ocurrio un error", type: "error" });
        }
    });

}

function validarFormGuardarVenta() {

    var form = $('#formFinalizarCompra'); 
    validateFormCertVac = form.validate({
        errorPlacement: function (error, element)
        {
            if(element.is(':radio')) {
                element.parents(':eq(1)').after(error);
            } else { 
                element.after(error);
            }
        },
        rules: {
            "tarjeta_credito":{ required: true},
            "mes_expiracion":{ required: true},
            "anno_expiracion":{ required: true},
            "cvv":{ required: true},
            "identificacion_titular":{ required: true},
            "nombre_titular":{ required: true},
        }
    });

    return form.valid();
}

function guardar_venta (){

    if (! validarFormGuardarVenta()) {
        return;
    }

    var form = $('#formFinalizarCompra');  

        $.ajax({
            headers: {
                "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content'),
            },
            url : form.attr('action'),
            type: "POST",
            data: form.serialize(),
            success: function(data, textStatus, jqXHR)
            {                
                if(data.success == true ){
                    //$("#capa_finalizacion_compra").html('<div class="col-md-12 text-center"> <div class="alert alert-success">Pago Procesado exitosamente</div><br><br><button type="button" class="btn btn-w-m btn-success">Imprimir Comprobante de Pao</button></div>');            
                    //$("#contador_carrito_menu_top").html('');

                    $(location).attr('href', conf.baseURL + laroute.route('pago_exitoso'));
                    
                }else{
                    $("#capa_finalizacion_compra").html('<div class="alert alert-danger">El Pago no pudo ser procesado</div>');
                }
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                swal({title: sw_al.error, confirmButtonColor: "#1e8ac2", text: "Error finalizar la compra", type: "error" });
            }
        });
}