$(document).ready(function() {

   /* tabla(); */
   tabla();

} );


var tabla = function (){
    var tablita = $('#tablaProyectos').DataTable( {

        //idioma del datatable
        "language": {
            "url": "asset/dt/Spanish.json"
            },
        //ajax para sacar los datos de la query en json
        "ajax": {
            "url": "controlador/proyecto/selectProyecto.php",
            "type": "POST"
            },
        //definimos el nombre de las columnas
        "columns": [
                { "data": "id" },
                { "data": "nombre_proyecto" },
                { "data": "estado" },
                { "data": "localidad" },
                { "data": "id_localidad" },
                { "defaultContent": "<div class='btn-group' role='group'>"+
                                    "<a href='#' class='eliminar mr-2'><span class='glyphicon glyphicon-trash'></span></a>"+
                                    "<a href='#' class='editar'><span class='glyphicon glyphicon-pencil'></span></a>"+
                                        //"<button type='button' class='eliminar btn btn-sm btn-danger'><span class='glyphicon glyphicon-trash'></button>"+
                                        //"<button type='button' class='editar btn btn-sm btn-info'><span class='glyphicon glyphicon-pencil'></button>"+
                                    "</div>"
                }
            ],
            //ocultar una columna (aqui la tercera) - [0,2] -> primera y tercera
            'columnDefs' : [
                { 'visible': false, 'targets': [4] },
                { 'width': 50, 'targets': 0 }
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
                    //Oculta del select las columnas devinidas en .noVis
                    'columns': ':not(.noVis)'
                    },
                ]
    } );

}

//caracteristica del selectpicker AGREGAR
$('.selectpicker').selectpicker({
    style: 'input input-lg ml-2 btn-outline-dark'
    //style: 'form-control form-control-sm ml-2'
});

