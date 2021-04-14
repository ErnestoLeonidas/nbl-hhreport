<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="../asset/css/estilos.css">
        <link rel="stylesheet" href="../asset/css/sidebar.css">
        <link rel="stylesheet" href="../asset/css/glyphicons.css">
        <link rel="stylesheet" href="../asset/css/tabla.css">

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
<div class="wrapper"> <!-- falta el cierre del div, pero se encuentra en el footer, el contenido va entre medio -->
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
    
    <!-- falta el cierre del div, pero se encuentra en el footer, el contenido va entre medio -->
