<?php
session_start();
$usuario_conectado = $_SESSION['nombre_Activo'];
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


    <link rel="stylesheet" href="asset/css/miperfil.css">

    <!-- JS -->
    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>

    <script src="asset/datepicker/moment.js"></script>

    <title>NBL HH Administración</title>
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
                  <a href="#" class="bg-dark list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-start align-items-center">
                        <span class="glyphicon glyphicon-indent-left mr-2"></span>
                        <span class="menu-collapsed">Grupos</span>
                        <span class="glyphicon glyphicon-chevron-right ml-auto text-warning"></span>
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
                  <a href="individual.php" class="bg-dark list-group-item list-group-item-action">
                      <div class="d-flex w-100 justify-content-start align-items-center">
                          <span class="glyphicon glyphicon-th-large mr-2"></span>
                          <span class="menu-collapsed">Individual</span>
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
                    <div class="col-6"><h4>Grupos</h4></div>


                </div>
            </div>

            <div class="card-body">

                <div class="row">
                    
                </div>
                
            </div>

            
        </div>

        
    </div>
    <!-- Main Col END -->
</div>
<!-- body-row END -->

<script type="text/javascript" src="asset/js-prisma/miperfil.js"></script>

</body>
</html> 

