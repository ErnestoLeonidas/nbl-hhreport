<?php

session_start();
$usuario_conectado = $_SESSION['nombre_Activo'];
$idArea_Validar = $_SESSION['idArea_Activo'];

    if($idArea_Validar == 21 || $idArea_Validar == 1)
    {

    }
    else 
    {
        $_SESSION['error'] = "NO DISPONIBLE PARA ESTE USUARIO";
        header("location: mishoras.php");
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS  -->
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="asset/css/glyphicons.css">
    <link rel="stylesheet" href="asset/css/general.css">

    <link rel="stylesheet" href="asset/css/proyectos.css">

    <!-- CSS DATATABLE -->
    <link rel="stylesheet" type="text/css" href="asset/dt/DataTables-1.10.18/css/dataTables.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="asset/dt/Buttons-1.5.4/css/buttons.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="asset/dt/Responsive-2.2.2/css/responsive.bootstrap4.css"/>

    <link rel="stylesheet" type="text/css" href="asset/datepicker/datepicker.css"/>

    <!-- JS -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/bootstrap-select.min.js"></script>

    <script src="asset/datepicker/datepicker.js"></script>
    <script src="asset/datepicker/datepicker.es.js"></script>
    <script src="asset/datepicker/moment.js"></script>

    <!-- JS DATATABLE -->
    <script type="text/javascript" src="asset/dt/DataTables-1.10.18/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="asset/dt/DataTables-1.10.18/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="asset/dt/Buttons-1.5.4/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="asset/dt/jszip.min.js"></script>
    <script type="text/javascript" src="asset/dt/Buttons-1.5.4/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="asset/dt/Buttons-1.5.4/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="asset/dt/buttons.html5.js"></script>
    <script type="text/javascript" src="asset/dt/Responsive-2.2.2/js/dataTables.responsive.js"></script>



    <title>NBL HH - reporte Individual</title>
</head>
<body>
    <!-- Bootstrap NavBar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand bg-light pl-2 pr-2" href="#">
        <img src="asset/img/icon.ico" width="40" height="40" class="d-inline-block align-top" alt="">
    </a>
    <div class="collapse navbar-collapse bg-dark" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">NBL HH <small class="text-muted ml-1">Version 0.2</small><span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ayuda.php">Ayuda</a>

        </li>
        <li class="nav-item">
            <a class="nav-link" href="acercade.php">Acerca de</a>
        </li>
            <!-- This menu is hidden in bigger devices with d-sm-none. 
            The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Menu
                </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Tasks</a>
                    <a class="dropdown-item" href="#">Etc ...</a>
                </div>
            </li>
            Smaller devices menu END -->
        </ul>
 
        <ul class="navbar-nav">
            <li><a id="usuario_activo" class="nav-link" href="miperfil.php"></a></li>
            <li><a class="nav-link" href="index.php"><span class="glyphicon glyphicon-log-in mr-2"></span>Salir</a></li>
        </ul>
    </div>
</nav>
<!-- NavBar END -->


<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block col-2">
            <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
            <!-- Bootstrap List Group -->
            <ul class="list-group sticky-top sticky-offset">
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MI CUENTA</small>
                </li>
                    <a href="miperfil.php" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="glyphicon glyphicon-user mr-2"></span>
                            <span class="menu-collapsed">Mi Perfil</span>
                            
                        </div>
                    </a>
                    <a href="mishoras.php" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="glyphicon glyphicon-time mr-2"></span>
                            <span class="menu-collapsed">Mis Horas</span>
                            
                        </div>
                    </a>
    
                <!-- Separator with title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>ADMINISTRACION</small>
                </li>
                  <!-- /END Separator -->
                  <a href="proyectos.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-duplicate mr-2"></span>
                        <span class="menu-collapsed">Proyectos</span>
                    </div>
                  </a>
                  <a href="trabajadores.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-wrench mr-2"></span>
                        <span class="menu-collapsed">Trabajadores</span>
                    </div>
                  </a>
                  <a href="mandante.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-briefcase mr-2"></span>
                        <span class="menu-collapsed">Mandante</span>
                    </div>
                  </a>
                  <a href="sectores.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-globe mr-2"></span>
                        <span class="menu-collapsed">Sectores</span>
                    </div>
                  </a>
                  <a href="grupos.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-indent-left mr-2"></span>
                        <span class="menu-collapsed">Grupos</span>
                    </div>
                  </a>
                  <a href="especialidad.php" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-list mr-2"></span>
                        <span class="menu-collapsed">Especialidad</span>
                    </div>
                  </a>
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>REPORTES</small>
                </li>
                  <!-- /END Separator -->
                  <a href="mensual.php" class="bg-dark list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                          <span class="glyphicon glyphicon-th mr-2"></span>
                          <span class="menu-collapsed">Mensual</span>
                      </div>
                  </a>
                  <a href="#" class="bg-dark list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                          <span class="glyphicon glyphicon-th-large mr-2"></span>
                          <span class="menu-collapsed">Individual</span>
                          <span class="glyphicon glyphicon-chevron-right ml-auto text-warning"></span>
                      </div>
                  </a>
                  <a href="estadisticas.php" class="bg-dark list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                          <span class="glyphicon glyphicon-stats mr-2"></span>
                          <span class="menu-collapsed">Estadisticas</span>
                      </div>
                  </a>
                  <a href="semanal.php" class="bg-dark list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                          <span class="glyphicon glyphicon-stats mr-2"></span>
                          <span class="menu-collapsed">Semanal</span>
                      </div>
                  </a>
                <!--
                <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                        <span id="collapse-text" class="menu-collapsed">Collapse</span>
                    </div>
                </a>
                -->
                <!-- Separator without title -->
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center justify-content-center menu-collapsed">
                    <Small>NBL Admin</Small>
                </li>
                <!-- /END Separator -->
    
            </ul>
            <!-- List Group END-->
    </div>
    <!-- sidebar-container END -->

    <!-- MAIN -->
    <div class="col">
        <div class="card mt-2">
            <div class="card-header ">
                <div class="row">
                    <div class="col-6"><h4>Reportes Individuales</h4></div>


                </div>
            </div>

            <div class="card-body">
                <div class="row mr-2 ml-2">
                
                <!-- formulario para buscar mes y año -->
                    <form class="form-inline">
                        <p class="font-weight-bold"><h5>MES: </h5></p>
                        <div class="form-group mb-2 mr-4" id="mensualDatePicker">
                            <select id="mesReporteMensual" class="selectpicker" data-live-search="true" title="Seleccionar">
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select> 
                        </div>
                        <p class="font-weight-bold"><h5>AÑO: </h5></p>
                        <div class="form-group mb-2 mr-2" id="mensualDatePicker">
                            <select id="anioReporteMensual" class="selectpicker" data-live-search="true" title="Seleccionar">
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>

                        <div class="form-group mb-2 ml-2">
                            <div class="btn btn-primary" id="buscarReporteIndividual"><span class="glyphicon glyphicon-search"></div>
                        </div>
                    </form>


                </div>
                <div class="row mr-2 ml-2 mt-2">
                    
                        <table id="tablaReporteIndividual" class="table table-striped table-hover table-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">HH</th>
                                    <th scope="col">Extra</th>
                                    <th scope="col">Inasistencias</th>
                                    <th scope="col">Vacaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Carga el datatable -->

                                <!-- Carga el datatable -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">HH</th>
                                    <th scope="col">Extra</th>
                                    <th scope="col">Inasistencias</th>
                                    <th scope="col">Vacaciones</th>
                                </tr>
                            </tfoot>
                        </table>

                </div>  
            </div>

            
        </div>

        
    </div>
    <!-- Main Col END -->
</div>
<!-- body-row END -->

<script type="text/javascript" src="asset/js-prisma/reporteIndividual.js"></script>

</body>
</html> 

