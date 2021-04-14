$(document).ready(function() {

    /* tabla(); */
    tablaReporte();
    usuario_activo();
    UF_Actual();
 
 } );
 
 
var tablaReporte = function (){
    var tablita = $('#tablaReporteMensual').DataTable( {

        //idioma del datatable
        "language": {
            "url": "asset/dt/Spanish.json"
            },
        //ajax para sacar los datos de la query en json
        /*"ajax": {
            "url": "controlador/reportes/reporteMensual.php",
            "type": "POST"
            }, */
        //definimos el nombre de las columnas
        "columns": [
                { "data": "fecha" }, 
                { "data": "localidad" },
                { "data": "proyecto" },
                { "data": "usuario" },
                { "data": "especialidad" },
                { "data": "descripcion" },
                { "data": "solicito" },
                { "data": "hh" },
                { "data": "extra" },
                { "data": "hh real" },
                { "data": "valor individual" },
                { "data": "hh nbl" }
            ],
            //ocultar una columna (aqui la tercera) - [0,2] -> primera y tercera
            'columnDefs' : [
                { 'visible': false, 'targets': [1,4,6] },
                { 'width': 60, 'targets': 0 },
                { 'width': 120, 'targets': 2 }
                //Doy nombre a las columnas para ser usadas mas adelante .noVis
            ], 
            //'dom': 'Bfrtip',
            'dom':"<'row' "
                +"<'col-sm-6 col-md-6 col-lg-6'B>"
                +"<'col-sm-6 col-md-6 col-lg-6'f>>"     
                +"<rt>"
                +"<'row' "
                +"<'col-sm-6 col-md-6 col-lg-6'l>"
                +"<'col-sm-6 col-md-6 col-lg-6'p>>",
        /*'buttons': [
                    'excelHtml5',
                    'csvHtml5'
        ],*/
        'buttons':[
            {
            'extend':    'excelHtml5',
            'titleAttr': 'Excel',
            'className': 'btn btn-success'
            },
            {
            'extend':    'csvHtml5',
            'titleAttr': 'Csv',
            'className': 'btn btn-success'
            }, 
            {
            'extend':    'colvis',
            'text':      'Columnas',
            'titleAttr': 'Ocultar',
            'className': 'btn btn-success',
            //Oculta del select las columnas definidas en .noVis
            'columns': ':not(.noVis)'
            },
        ]

    } );

    // Se anota aqui la funcion para que se actualice la tabla.
    formReporteMensual(tablita);
}


//caracteristica del selectpicker AGREGAR
$('.selectpicker').selectpicker({
    style: 'input input-lg ml-2 btn-outline-dark'
    //style: 'form-control form-control-sm ml-2'
});

$('#fechaInicio').datepicker({
    language: 'es',
    format: 'yyyy-mm-dd',
    ignoreReadonly: true,
    autoHide: true
}).on('change', function(){
    $('.datepicker').hide();
});

$('#fechaTermino').datepicker({
    language: 'es',
    format: 'yyyy-mm-dd',
    ignoreReadonly: true,
    autoHide: true
})

var formReporteMensual = function (tablita) {
    $("#buscarReporteMensual").on("click", function () {

        //capturar variables

        $fechaInicio = $('#fechaInicio').val();

        $fechaTermino = $('#fechaTermino').val();


        console.log( $fechaInicio );
        console.log( $fechaTermino );


        //actualiza la url para consultar
        tablita.ajax.url('controlador/reportes/buscarReporteMensual.php?mes='+$fechaInicio+'&anio='+$fechaTermino).load();
    });
}

//carga el usuario activo
function usuario_activo() {
    $.ajax({
        url: 'controlador/sesion/usuarioActivo.php',
        dataType: 'json',
        type: 'GET',
        success: function(data){   
            $.each(data,function(k, registro) {
            $("#usuario_activo").html('<span class="glyphicon glyphicon-user mr-2"></span>' + registro.nombre);
                //console.log( 'nombre usuario activo = '+ registro.nombre );
            });
        },
            error: function(data) {
            alert('error al obtener el usuario activo '+data);
        }
    });
}

//carga UF
function UF_Actual() {
    $.ajax({
        url: 'controlador/UF/seleccionarUF.php',
        dataType: 'json',
        type: 'GET',
        success: function(data){   
            $.each(data,function(k, registro) {
            $("#UF_Actual").html('UF: ' + registro.valor);
                //console.log( 'nombre usuario activo = '+ registro.nombre );
            });
        },
            error: function(data) {
            alert('error al obtener la uf actual '+data);
        }
    });
}

//Modificar UF
$("#btnNuevaUF").on("click", function () {

/*
    //capturar variables
    $valorNuevaUF = $('#nuevaUF').val();

    $.ajax({
        type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
        url:'controlador/UF/modificarUF.php?nuevaUF='+$valorNuevaUF, //url guarda la ruta hacia donde se hace la peticion
        success:function(datos){ //success es una funcion que se utiliza si el servidor retorna informacion
             console.log($valorNuevaUF)
         }
    })

    //Limpiar el texbox
    $('#nuevaUF').empty();

    //Cierro el modal
    $('#btnNuevaUF').modal('hide');

    //Recargo la UF en la página
    UF_Actual();

*/
    var vUF = $("#nuevaUF").val();

    //console.log( "valor de la Actividad editada "+ idA );
   
    $.post( "controlador/UF/modificarUF.php", {
        nuevaUF: vUF
    } )
    // realiza estas acciones cuando el envio es exitoso
    .done(function (response, textStatus, jqXHR){
        
        //Limpiar el texbox
        $('#nuevaUF').val('');
        //console.log("Se Cambio la UF a: " + vUF)
        alert('UF MODIFICADA CON ÉXITO');
    })
    // realiza estas acciones cuando el envio falla
    .fail(function (jqXHR, textStatus, errorThrown){
        console.error("Un error ocurrió: "+ textStatus, errorThrown)
    })
    // realiza esta accion en cuelquiera de los casos
    .always(function() {

        //Cierro el modal
        $('#editarUF').modal('hide');

        //Recargo la UF en la página
        UF_Actual();
    })

});