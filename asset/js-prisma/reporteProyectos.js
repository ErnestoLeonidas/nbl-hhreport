$(document).ready(function() {

    /* tabla(); */
    tablaReporte();
 } );
 
 
var tablaReporte = function (){
    var tablita = $('#tablaReporteProyectos').DataTable( {

        //idioma del datatable
        "language": {
            "url": "asset/dt/Spanish.json"
            },
        //ajax para sacar los datos de la query en json
        "ajax": {
            "url": "controlador/reportes/reporteProyectos.php",
            "type": "POST"
            },
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
                { "data": "extra" }
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

var formReporteMensual = function (tablita) {
    $("#buscarReporteMensual").on("click", function () {

        //capturar variables
        var mesReporteMensual = $('#mesReporteMensual').val();
        var anioReporteMensual = $('#anioReporteMensual').val();

        //actualiza la url para consultar
        tablita.ajax.url('controlador/reportes/buscarReporteMensual.php?mes='+mesReporteMensual+'&anio='+anioReporteMensual).load();
    });
}
 
 