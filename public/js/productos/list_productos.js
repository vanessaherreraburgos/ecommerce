$(document).ready(function()
{
	/**
	*
	* Descripción. instancia dataTable para listar Productos.
	* @author Vanessa Herrera
	*/
    var configuracion = {
        idTabla:'tablaListarProductos',
        ruta:'productos/datatable',
        columnas:   [{data:'foto_producto', orderable: false},
                     {data:'descripcion', orderable: true},
                     {data:'precio', orderable: true},                    
                     {data:'action', orderable: false}
                    ]
    };
    instanciarDataTableServerSide(configuracion);
});

function enviar_al_carro(id_producto){

    var url = conf.baseURL+laroute.route('cart.add', { producto_id: id_producto });
        $.ajax({            
            url: url,
            type: "GET",
        
            success: function(data) {

                if (data.success) {                   
                    swal({title: "Exito", confirmButtonColor: "#1e8ac2", text: "Producto Agregado al Carrito", type: "success"}
                    ,function () {
                        location.reload();
                    });
                }else{
                    swal({title: "Información", confirmButtonColor: "#1e8ac2", text: "Ocurrio un error al agregar el producto al carrito de compras.", type: "warning" });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal({title: sw_al.error, confirmButtonColor: "#1e8ac2", text: "Ocurrio un error", type: "error" });
            }
        });
}
