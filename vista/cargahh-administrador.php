<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/estilos.css">
        <link rel="stylesheet" href="../asset/css/sidebar.css">
        <link rel="stylesheet" href="../asset/css/glyphicons.css">

        <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../asset/js/popper.js"></script>
        <script type="text/javascript" src="../asset/js/bootstrap.min.js"></script>

        <title>NBL Ingenieria Ltda.</title>
   </head>
   <body>
<!-- CABECERA -->
<div>
    <div class="row cabecera">
        <div class="d-flex justify-content-start col-1">
            <button class="botonmenu" id="sidebarCollapse"><span class="glyphicon glyphicon-menu-hamburger icono"></span>                   
            </button>
        </div>            
        <div class="d-flex justify-content-end col-11 position-relative ">           
            <a href="../index.html" class="botonlogout pr-2 pt-2">
                <span class="glyphicon glyphicon-log-out"></span> Desconectar
            </a>
        </div>                  
    </div>
</div>
<!-- FIN CABECERA -->

<!-- MENU LATERAL-->
<div class="wrapper">
        <!-- BARRA LATERAL -->       
        <nav id="sidebar">
            <div class="logo">
                <img class="p-3" src="../asset/img/logo.png" width="200px"/>
            </div>
            <div class="tiempo" >
                <div class="reloj" >
                    <div class="clock small" id="clock">
                        <div class="date"></div>
                        <div class="time"></div>
                    </div> 
                </div>
            </div>
    
            <ul class="list-unstyled components">                
                <li class="active">                                            
                        <a class="d-flex" href="#">
                             <img class="icono" src="../asset/img/cargaicon.png"/>
                             <p class="textomenu pt-1">Agregar HH</p>                            
                        </a>                    
                </li>               
                <li>
                    <a href="#resumenSubmenu" data-toggle="collapse" aria-expanded="false" class="d-flex dropdown-toggle">
                        <span class="icono glyphicon glyphicon-stats"></span> 
                        <p class="textomenu pt-1">Resumen</p> 
                    </a>
                    <ul class="collapse list-unstyled" id="resumenSubmenu">
                        <li>
                            <a href="#">Resumen Personal</a>
                        </li>
                        <li>
                            <a href="#">Resumen Mensual</a>
                        </li>
                    </ul>
                </li>
                <li>
                        <a href="#reporteSubmenu" data-toggle="collapse" aria-expanded="false" class="d-flex dropdown-toggle">
                            <img class="icono" src="../asset/img/reporteicon.png"/>
                            <p class="textomenu pt-1">Reporte</p>
                        </a>
                        <ul class="collapse list-unstyled" id="reporteSubmenu">
                            <li>
                                <a href="#">Reporte Individual</a>
                            </li>
                            <li>
                                <a href="#">Reporte General</a>
                            </li>
                        </ul>
                </li>
                <li>
                    <a href="#mantencionSubmenu" data-toggle="collapse" aria-expanded="false" class="d-flex dropdown-toggle">
                        <span class="icono glyphicon glyphicon-cog"></span>
                        <p class="textomenu pt-1">Mantención</p>
                    </a>
                    <ul class="collapse list-unstyled" id="mantencionSubmenu">
                        <li>
                            <a href="#">Localidades</a>
                        </li>
                        <li>
                            <a href="#">Proyectos</a>
                        </li>
                        <li>
                            <a href="#">Áreas</a>
                        </li>
                        <li>
                            <a href="#">Trabajadores</a>
                        </li>
                        <li>
                            <a href="#">Mandantes</a>
                        </li>
                        <li>
                            <a href="#">Especialidades</a>
                        </li>

                    </ul>
                </li>                                
            </ul>            
        </nav>
        <!-- CONTENIDO -->
        
        <div>12310371290317893127892189731893</div>
        <!-- FIN CONTENIDO -->
</div>
        <script>
            $(document).ready(function () {

                $('#sidebarCollapse').on('click', function () {            
                    $('#sidebar').toggleClass('active')
                    $('#botbg').toggleClass('active');
                }); 
                });
                $(document).ready(function() { $("div#clock").simpleClock(-4); }); (function ($) { $.fn.simpleClock = function ( utc_offset ) { var language = "es"; switch (language) { case "de": var weekdays = ["So.", "Mo.", "Di.", "Mi.", "Do.", "Fr.", "Sa."]; var months = ["Jan.", "Feb.", "Mär.", "Apr.", "Mai", "Juni", "Juli", "Aug.", "Sep.", "Okt.", "Nov.", "Dez."]; break; case "es": var weekdays = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"]; var months = ["Ene", "Feb", "Mar", "Abr", "Mayo", "Jun", "Jul", "Ago", "Sept", "Oct", "Nov", "Dic"]; break; case "fr": var weekdays = ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"]; var months = ["Jan", "Fév", "Mars", "Avr", "Mai", "Juin", "Juil", "Août", "Sept", "Oct", "Nov", "Déc"]; break; default: var weekdays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"]; var months = ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"]; break; } var clock = this; function getTime() { var date = new Date(); var nowUTC = date.getTime() + date.getTimezoneOffset()*60*1000; date.setTime( nowUTC + (utc_offset*60*60*1000) ); var hour = date.getHours(); if ( language == "en" ) { suffix = (hour >= 12)? 'p.m.' : 'a.m.'; hour = (hour > 12)? hour -12 : hour; hour = (hour == '00')? 12 : hour; } return { day: weekdays[date.getDay()], date: date.getDate(), month: months[date.getMonth()], year: date.getFullYear(), hour: appendZero(hour), minute: appendZero(date.getMinutes()), second: appendZero(date.getSeconds()) }; } function appendZero(num) { if (num < 10) { return "0" + num; } return num; } function refreshTime(clock_id) { var now = getTime(); clock = $.find('#'+clock_id); $(clock).find('.date').html(now.day + ', ' + now.date + '. ' + now.month + ' ' + now.year); $(clock).find('.time').html("<span class='hour'>" + now.hour + "</span>:<span class='minute'>" + now.minute + "</span>:<span class='second'>" + now.second + "</span>"); if ( typeof(suffix) != "undefined") { $(clock).find('.time').append('<strong>'+ suffix +'</strong>'); } } var clock_id = $(this).attr('id'); refreshTime(clock_id); setInterval( function() { refreshTime(clock_id) }, 1000); }; })(jQuery); 
        </script>
   </body>  
   </html>