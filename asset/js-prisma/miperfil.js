$(document).ready(function() {
    usuario_activo();

} );

//carga el usuario activo
function usuario_activo() {
    $.ajax({
        url: 'controlador/sesion/usuarioActivo.php',
        dataType: 'json',
        type: 'GET',
        success: function(data){   
            $.each(data,function(k, registro) {
            $("#usuario_activo").html('<span class="glyphicon glyphicon-user mr-2"></span>' + registro.nombre);
                console.log( 'nombre usuario activo = '+ registro.nombre );
            });
        },
            error: function(data) {
            alert('error al obtener el ususario activo '+data);
        }
    });
}

