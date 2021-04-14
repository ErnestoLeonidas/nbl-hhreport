    $(document).ready(function() {

        cargarHorasMes();
        editarCombos();
        obtenerHorasMes();
        obtenerHorasDia();

        usuario_activo();

        //oculta el datepicker
        datepicker.hide();
    } );

    var cargarHorasMes = function (){
        var tablita = $('#tablaMisHoras').DataTable( {

            //idioma del datatable
            "language": {
                "url": "asset/dt/Spanish.json"
                },
            //ajax para sacar los datos de la query en json
            "ajax": {
                "url": "controlador/actividad/consultaActividad.php",
                "type": "POST"
                },
            //definimos el nombre de las columnas
            "columns": [
                    { "data": "id" },
                    { "data": "Fecha" },
                    { "data": "Proyecto" },
                    { "data": "Especialidad" },
                    { "data": "Descripcion" },
                    { "data": "HH" },
                    { "data": "Ex" },
                    { "data": "idProyecto" },
                    { "data": "idSolicito" },
                    { "data": "idEspecialidad" },
                    { "data": "idLocalidad" },
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
                    { 'visible': false, 'targets': [2,3,7,8,9,10] },
                    { 'width': 70, 'targets': 1 },
                    { 'width': 10, 'targets': [0,5,6,11] },
                    //Doy nombre a las columnas para ser usadas mas adelante .noVis
                    { 'targets': [7,8,9,10] , 'className': 'noVis'}
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
                        ]*/
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
                    ],
        } );

        activaBotonEliminar(tablita);
        activaBotonEditar(tablita); 
        select_mes(tablita);
        select_semana(tablita);
        select_dia(tablita);

    }

    var activaBotonEliminar = function (tablita) {
        //activa el boton ELIMINAR
        $("#tablaMisHoras tbody").on("click", "a.eliminar", function () {
            var data = tablita.row($(this).parents("tr")).data();

            //Carga los datos en el texto, hace match con el id
            $('#eliminar_Actividad').val(data.id);

            $('#txtIdEliminar').html(data.Fecha); 
            $('#txtDescripcionEliminar').html(data.Descripcion); 

            $('#eliminarHH').modal('show');
            console.log( data.id );
        }); 
    }

    var activaBotonEditar = function (tablita) {
        //activa el boton EDITAR
        $("#tablaMisHoras tbody").on("click", "a.editar", function () {
            var datos = tablita.row($(this).parents("tr")).data();

            //Carga los datos en el texto, hace match con el id
            $('#editar_Actividad').val(datos.id); 

            $('#editar_Descripcion').val(datos.Descripcion); 
            $('#editar_HH').val(datos.HH);
            $('#editar_Extra').val(datos.Ex);
            $('#editar_Fecha').val(datos.Fecha);

            $('.editar_Localidad').val(datos.idLocalidad).change();
            $('.editar_Solicito').val(datos.idSolicito).change();
            $('.editar_Especialidad').val(datos.idEspecialidad).change();

            cargarProyectoActivo(datos.idProyecto);

            // $('.editar_Proyecto').val(datos.idProyecto).change();     
            // $('.editar_Proyecto').prop('disabled', true);

            //console.log( "valor seleccionado "+datos.idProyecto );
            //Mostrar el editar HH
            $('#editarHH').modal('show');
            
        });
    }

    //caracteristica del selectpicker AGREGAR
    $('.selectpicker').selectpicker({
        style: 'input input-lg ml-2 btn-outline-dark'
        //style: 'form-control form-control-sm ml-2'
    });

    //caracteristica del selectpicker EDITAR
    $('.selectpicker2').selectpicker({
        style: 'input input-sm ml-2 btn-outline-dark' 
        //style: 'form-control form-control-sm ml-2'
    });

    $("#cargarCombobox").on("click", function () {
        agregarCombos();

        $("#alertaDescripcion").text("");
        $("#agregarDescripcion").addClass('is-valid');

        $("#alertaSolicito").text("");
        $("#alertaEspecialidad").text("");
        $("#alertaProyecto").text("");

        $hoy = moment().format('YYYY-MM-DD');
        $('#agregarFecha').val($hoy);
    }); 

    var agregarCombos = function () {

        $.ajax({
            url: 'controlador/localidad/selectLocalidad.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   // var dato = $("#agregarLocalidad").append($('<option>').text(registro.Localidad).attr('value', registro.id));
                   $("#agregarLocalidad").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Localidad + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker').selectpicker('refresh');
                //console.log( "localidad");
            },
                error: function(data) {
                alert('error');
            }
        });

        $.ajax({
            url: 'controlador/solicito/selectSolicito.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   $("#agregarSolicito").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Nombre + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker').selectpicker('refresh');
                //console.log( "solicito" );
            },
                error: function(data) {
                alert('error');
            }
        });

        $.ajax({
            url: 'controlador/especialidad/selectEspecialidad.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   $("#agregarEspecialidad").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Especialidad + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker').selectpicker('refresh');
            //console.log( "solicito" );
            },
                error: function(data) {
                alert('error');
            }
        });

    }

    var editarCombos = function () {

        $.ajax({
            url: 'controlador/localidad/selectLocalidad.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   // var dato = $("#agregarLocalidad").append($('<option>').text(registro.Localidad).attr('value', registro.id));
                   $("#editar_Localidad").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Localidad + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker2').selectpicker('refresh');
                //console.log( "localidad");
            },
                error: function(data) {
                alert('error');
            }
        });

        $.ajax({
            url: 'controlador/solicito/selectSolicito.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   $("#editar_Solicito").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Nombre + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker2').selectpicker('refresh');
                //console.log( "solicito" );
            },
                error: function(data) {
                alert('error');
            }
        });

        $.ajax({
            url: 'controlador/especialidad/selectEspecialidad.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   $("#editar_Especialidad").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Especialidad + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker2').selectpicker('refresh');
                //console.log( "solicito" );
            },
                error: function(data) {
                alert('error');
            }
        });
        
        $.ajax({
            url: 'controlador/proyecto/selectProyectoActivo.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                   $("#editar_Proyecto").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Proyecto + '</option>');
                    //console.log( dato );
                });

                $('.selectpicker2').selectpicker('refresh');
                //console.log( "Proyecto cambiado " );
            },
                error: function(data) {
                alert('error');
            }
        });

    }

    //filtro AGREGAR localidad
    $( "#agregarLocalidad" ).change(function () {
        //selecciono el id del primer select
        var id = $(this).children(":selected").attr("value");

        //limpia el select de Proyecto
        $('#agregarProyecto').empty();
        $('.agregarProyecto').prop('disabled', false);

        //cargo los datos del Proyecto
        $.ajax({
        url: 'controlador/proyecto/selectProyecto.php?id='+id,
        dataType: 'json',
        type: 'GET',
        success: function(data){   
            $.each(data,function(key, registro) {
                $("#agregarProyecto").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Proyecto + '</option>');
                //console.log( dato );
            });

            $('.selectpicker').selectpicker('refresh');
            //console.log( "se agregaron los proyectos" );
        },
            error: function(data) {
            alert('error');
        }
        });

    });

    //filtro EDITAR localidad
    $( "#editar_Localidad" ).change(function () {
        //selecciono el id del primer select
        var id = $(this).children(":selected").attr("value");

        //limpia el select de Proyecto
        $('#editar_Proyecto').empty();
        
        $('.editar_Proyecto').prop('disabled', false);
        $('.editar_Proyecto').selectpicker('refresh');

        //cargo los datos del Proyecto
        $.ajax({
        url: 'controlador/proyecto/selectProyecto.php?id='+id,
        dataType: 'json',
        type: 'GET',
        success: function(data){   
            $.each(data,function(key, registro) {
                $("#editar_Proyecto").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Proyecto + '</option>');
            });

            $('.selectpicker2').selectpicker('refresh');
            //console.log( "se agregaron los proyectos" );
        },
            error: function(data) {
            alert('error');
        }
        });

    });

    //cierro el modal editar
    $( "#cerrarModalEditar" ).on("click", function () {
        $('#editar_Proyecto').empty();
    });

    //carga el editar proyecto del modal
    function cargarProyectoActivo(id) {
        $('.editar_Proyecto').prop('disabled', true);
        $.ajax({
            url: 'controlador/proyecto/selectProyectoActivo.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                $("#editar_Proyecto").append('<option id="' + registro.id + '" value="' + registro.id + '">' + registro.Proyecto + '</option>');
                    //console.log( dato );
                });

                $('.editar_Proyecto').selectpicker('refresh');
                //console.log( "Proyecto cambiado " );
     
                $('.editar_Proyecto').val(id).change();     
                //console.log( "id del proyecto "+id );
                
            },
                error: function(data) {
                alert('error');
            }
        });

    }

    //obtiene cantidad de horas del mes
    function obtenerHorasMes() {
        $.ajax({
            url: 'controlador/actividad/horasMes.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                $("#resumenHorasMes").html(registro.horas + ' hh | ' + registro.extras +' ex');
                    //console.log( registro.horas );
                });

            },
                error: function(data) {
                alert('error');
            }
        });
    }

    //obtiene cantidad de horas del dia
    function obtenerHorasDia() {
        $.ajax({
            url: 'controlador/actividad/horasDias.php',
            dataType: 'json',
            type: 'GET',
            success: function(data){   
                $.each(data,function(key, registro) {
                $("#resumenHorasDia").html('Hoy: '+ registro.horas + ' hh | ' + registro.extras +' ex');
                    //console.log( registro.horas );
                });

            },
                error: function(data) {
                alert('error');
            }
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
                alert('error al obtener el ususario activo '+data);
            }
        });
    }
    
/* == ACCIONES DE AGREGAR EDITAR Y ELIMINAR HORAS == */

    function checkTextarea(idText) {
        return $(idText).val().length > 12 ? true : false;	
    }
    function checkSelect(idSelect) {
        return $(idSelect).val() ? true : false;
    }

    // CARGAR HORAS A LA BASE DE DATOS
    $("#agregarHoras").on("click", function () {

        //selecciono el id de los datos
        var idP = $("#agregarProyecto option:selected").attr("value");
        var idS = $("#agregarSolicito option:selected").attr("value");
        var idE = $("#agregarEspecialidad option:selected").attr("value");

        var date = $("#agregarFecha").val();
        var HH = $("#agregarHH").val();
        var HHE = $("#agregarExtra").val();

        var des = $("#agregarDescripcion").val();

        if (!checkTextarea("#agregarDescripcion")) {
            $("#alertaDescripcion").text("verifica!");
            $("#agregarDescripcion").addClass('is-invalid');
        }
        if (!checkSelect("#agregarSolicito")) {
            $("#alertaSolicito").text("verifica!");
        }
        if (!checkSelect("#agregarEspecialidad")) {
            $("#alertaEspecialidad").text("verifica!");
        }
        if (!checkSelect("#agregarProyecto")) {
            $("#alertaProyecto").text("verifica!");
        }

        if (
            checkTextarea("#agregarDescripcion") && 
            checkSelect("#agregarSolicito") &&
            checkSelect("#agregarEspecialidad") &&
            checkSelect("#agregarProyecto")
            )
            {
                $.post( "controlador/actividad/insertarActividad.php", {
                    proyecto: idP,
                    solicito: idS,
                    especialidad: idE,
                    date: date,
                    hh: HH,
                    hhe: HHE,
                    descripcion: des
                } )
                // realiza estas acciones cuando el envio es exitoso
                .done(function (response, textStatus, jqXHR){
        
                    //recargo la tabla
                    $('#tablaMisHoras').DataTable().ajax.reload();
                    console.log("SE EFECTUO UNA " + response)
                })
                // realiza estas acciones cuando el envio falla
                .fail(function (jqXHR, textStatus, errorThrown){
                    console.error("Un error ocurrió: "+ textStatus, errorThrown)
                })
                // realiza esta accion en cuelquiera de los casos
                .always(function() {
                    //limpiar datos
                    $("#agregarLocalidad").empty();
                    $("#agregarSolicito").empty();
                    $("#agregarEspecialidad").empty();
                    $("#agregarProyecto").empty();
                    //refresca los select para efectuar el cambio
                    $('.selectpicker').selectpicker('refresh');
        
                    $("#agregarFecha").val('');
                    $("#agregarHH").val('');
                    $("#agregarExtra").val('');
            
                    $("#agregarDescripcion").val('');
        
                    //cierra el modal
                    $('#cargarHH').modal('hide');
                });
            } 
        
    }); 

    // EDITAR HORAS A LA BASE DE DATOS
    $("#editarHoras").on("click", function () {

        //selecciono el id de los datos
        var idP = $("#editar_Proyecto option:selected").attr("value");
        var idS = $("#editar_Solicito option:selected").attr("value");
        var idE = $("#editar_Especialidad option:selected").attr("value");

        var idA = $("#editar_Actividad").val();

        var date = $("#editar_Fecha").val();
        var HH = $("#editar_HH").val();
        var HHE = $("#editar_Extra").val();

        var des = $("#editar_Descripcion").val();

        //console.log( "valor de la Actividad editada "+ idA );
       
        $.post( "controlador/actividad/modificarActividad.php", {
            actividad: idA,
            proyecto: idP,
            solicito: idS,
            especialidad: idE,
            date: date,
            hh: HH,
            hhe: HHE,
            descripcion: des
        } )
        // realiza estas acciones cuando el envio es exitoso
        .done(function (response, textStatus, jqXHR){
            //recargo la tabla
            $('#tablaMisHoras').DataTable().ajax.reload();
            console.log("SE EFECTUO UNA " + response)
        })
        // realiza estas acciones cuando el envio falla
        .fail(function (jqXHR, textStatus, errorThrown){
            console.error("Un error ocurrió: "+ textStatus, errorThrown)
        })
        // realiza esta accion en cuelquiera de los casos
        .always(function() {

            //cierra el modal
            $('#editarHH').modal('hide');
        });

    }); 

    // ELIMINAR HORAS DE LA BASE DE DATOS
    $("#eliminarHoras").on("click", function () {
        //selecciono el id de los datos
        var idA = $("#eliminar_Actividad").val();

        //console.log( "valor de la Actividad a eliminar "+ idA );
        $.post( "controlador/actividad/eliminarActividad.php", {
            actividad: idA
        } )
        // realiza estas acciones cuando el envio es exitoso
        .done(function (response, textStatus, jqXHR){
            //recargo la tabla
            $('#tablaMisHoras').DataTable().ajax.reload();
            console.log("SE EFECTUO UNA " + response)
        })
        // realiza estas acciones cuando el envio falla
        .fail(function (jqXHR, textStatus, errorThrown){
            console.error("Un error ocurrió: "+ textStatus, errorThrown)
        })
        // realiza esta accion en cuelquiera de los casos
        .always(function() {
            //cierra el modal
            $('#eliminarHH').modal('hide');
        });

    }); 

/* -- FIN ACCIONES DE AGREGAR EDITAR Y ELIMINAR HORAS -- */

/* == Acciones para los botones de mes, semana, dia == */
    // MES
    var select_mes = function (tablita) {
        $("#btnMes").on("click", function () {
            //$('#tablaMisHoras').DataTable().destroy();
            //acciones de estado en los botones
            $("#btnMes").attr('class', 'btn btn-success');
            $("#btnSemana").attr('class', 'btn btn-secondary');
            $("#btnDia").attr('class', 'btn btn-secondary');

            datepicker.show().hide();
            obtenerHorasDia();

            //actualiza la url para consultar
            tablita.ajax.url('controlador/actividad/consultaActividad.php').load();
        });
    }
    
    var select_semana = function (tablita) {
        //SEMANA
        $("#btnSemana").on("click", function () {
            //$('#tablaMisHoras').DataTable().destroy();
            //acciones de estado en los botones
            $("#btnMes").attr('class', 'btn btn-secondary');
            $("#btnSemana").attr('class', 'btn btn-success');
            $("#btnDia").attr('class', 'btn btn-secondary');

            datepicker.show().hide();
            obtenerHorasDia();

            //actualiza la url para consultar
            tablita.ajax.url('controlador/actividad/consultaActividadSemana.php').load();
        }); 
    }
    
    var select_dia = function (tablita) {
        //DIA
        $("#btnDia").on("click", function () {
            //acciones de estado en los botones
            $("#btnMes").attr('class', 'btn btn-secondary');
            $("#btnSemana").attr('class', 'btn btn-secondary');
            $("#btnDia").attr('class', 'btn btn-success');

            //var datepicker = $('#select_fecha').datepicker();
            datepicker.show();

            fecha = moment().format('YYYY-MM-DD');
            $('#select_fecha').val(fecha);

            console.log(fecha)

            //actualiza la url para consultar
            //tablita.ajax.url('controlador/actividad/consultaActividadDia.php').load();

            tablita.ajax.url('controlador/actividad/consultaActividadDiaSelect.php?fecha='+fecha).load();
        }); 

        //Cuando cambia de estado
        $('#select_fecha').datepicker({
            language: 'es',
            ignoreReadonly: true,
            onHide: function(dp, animationCompleted){
                if (!animationCompleted) {
                    //console.log('start hiding')
                } else {
                    $fecha = $('#select_fecha').val();
                    tablita.ajax.url('controlador/actividad/consultaActividadDiaSelect.php?fecha='+$fecha).load();

                    $.ajax({
                        url: 'controlador/actividad/horasDiasSelect.php?fecha='+$fecha,
                        dataType: 'json',
                        type: 'GET',
                        success: function(data){   
                            $.each(data,function(key, registro) {
                            $("#resumenHorasDia").html('Dia: '+ registro.horas + ' hh | ' + registro.extras +' ex');
                                console.log( registro.horas );
                            });
            
                        },
                            error: function(data) {
                            alert('error');
                        }
                    });

                }
            }
        })
    }
/* -- FIN Acciones para los botones de mes, semana, dia -- */

// Access instance of plugin
var datepicker = $('#select_fecha').datepicker({
    language: 'es',
    ignoreReadonly: true,
})
