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

        <li class="navbar-nav horas">
            <span id="resumenHorasMes" class="badge badge-warning"></span>  
        </li>
    
        <ul class="navbar-nav">
            <li>
                <button type="button" id="cargarCombobox" class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#cargarHH">
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
             
            </li>
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
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="glyphicon glyphicon-time mr-2"></span>
                            <span class="menu-collapsed">Mis Horas</span>
                            <span class="glyphicon glyphicon-chevron-right ml-auto text-warning"></span>
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
            <div class="card-header">
                <div class="row">
                    <div class="col-4"><h4>Mis Horas</h4></div>
                    <div class="col-4">
                        <div class="btn-group" role="group">
                            <button type="button" id="btnMes" class="btn btn-success">Mes</button>
                            <button type="button" id="btnSemana" class="btn btn-secondary">Semana</button>
                            <button type="button" id="btnDia" class="btn btn-secondary">Día</button>
                            <input type='text' id="select_fecha" class="datepicker-here" data-position="right top" data-language='es'/>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="text-right">
                            <span id="resumenHorasMes" class="badge badge-warning font-weight-normal"></span>
                            <span id="resumenHorasDia" class="badge badge-warning font-weight-normal"></span>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="card-body">

                <!-- Tabla -->
                <div class="container">
                    <table id="tablaMisHoras" class="table table-striped table-hover table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">HH</th>
                                <th scope="col">Ex</th>
                                <th scope="col">idProyecto</th>
                                <th scope="col">idSolicito</th>
                                <th scope="col">idEspecialidad</th>
                                <th scope="col">idLocalidad</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Carga el datatable -->

                            <!-- Carga el datatable -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Proyecto</th>
                                <th scope="col">Especialidad</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">HH</th>
                                <th scope="col">Ex</th>
                                <th scope="col">idProyecto</th>
                                <th scope="col">idSolicito</th>
                                <th scope="col">idEspecialidad</th>
                                <th scope="col">idLocalidad</th>
                                <th scope="col"></th>
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

<!-- MODAL AGREGAR -->
<div>
    <div class="modal fade" id="cargarHH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar HH</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                <!-- Formulario para agregar HH -->
                <form>
                    <div class="form-row">
                        <!-- localidad -->    
                        <div class="col-sm-6 mb-1">
                            <label for="agregarLocalidad">Localidad</label> 
                            <select id="agregarLocalidad" class="selectpicker" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                        <!-- proyecto -->
                        <div class="col-sm-6 mb-1">
                            <label for="agregarProyecto">Proyecto</label>
                            <label id="alertaProyecto" class="font-weight-bold text-danger"></label> 
                            <select id="agregarProyecto" class="selectpicker" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- solicito -->
                        <div class="col-sm-6 mb-1">
                            <label for="agregarSolicito">Solicitó</label>
                            <label id="alertaSolicito" class="font-weight-bold text-danger"></label>
                            <select id="agregarSolicito" class="selectpicker" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                        <!-- especialidad -->
                        <div class="col-sm-6 mb-1">
                            <label for="agregarEspecialidad">Especialidad</label>
                            <label id="alertaEspecialidad" class="font-weight-bold text-danger"></label> 
                            <select id="agregarEspecialidad" class="selectpicker" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <!-- fecha -->
                        <div class="col-sm-4 mb-1">
                            <label for="agregarFecha">Fecha</label>
                            <input id="agregarFecha" type="date" class="form-control form-control-sm" >
                        </div>
                        <!-- HH -->
                        <div class="col-sm-4 mb-1">
                            <label for="agregarHH">HH</label>
                            <input id="agregarHH" type="number" class="form-control form-control-sm" value="0">
                        </div>
                        <!-- Extra -->
                        <div class="col-sm-4 mb-1">
                            <label for="agregarExtra">HH Extra</label>
                            <input id="agregarExtra" type="number" class="form-control form-control-sm" value="0">   
                        </div>
                    </div>    

                    <div class="form-row mb-1">
                        <!-- descripcion -->
                        <div class="col-12">
                            <label for="agregarDescripcion">Descripción</label>
                            <label id="alertaDescripcion" class="font-weight-bold text-danger"></label>
                            <textarea id="agregarDescripcion" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <!-- fin row 4 -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle mr-1"></span>Cancelar</button>
                        <button type="button" id="agregarHoras" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk mr-1"></span>Guardar</button>
                    </div>

                </form>
                <!-- Fin formulario -->
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL AGREGAR -->
 
<!-- MODAL ELIMINAR HH - CONFIRMACION -->
<div>
    <div class="modal fade" id="eliminarHH" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- HEADER DEL MODAL -->
                <div class="modal-header">
                    <h4 class="modal-title" id="modalEliminarLabel">Realmente desea eliminar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body ml-2">
                    <span class="font-weight-bold"> Fecha: </span> 
                    <p class="text-uppercase font-weight-light" id="txtIdEliminar">fecha</p>
                    <span class="font-weight-bold"> Descripción: </span> 
                    <p class="text-uppercase font-weight-light" id="txtDescripcionEliminar">fecha</p>
                </div>

                <div class="container mt-3 mb-3 text-center">
                    <form>
                        <input type="hidden" id="eliminar_Actividad">
                        <button type="button" id="eliminarHoras" class="btn btn-danger">Aceptar</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL ELIMINAR HH - CONFIRMACION -->

<!-- MODAL EDITAR -->
<div>
    <div class="modal fade" id="editarHH" tabindex="-1" role="dialog" aria-labelledby="editarModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModal">Editar HH</h5>
                    <button type="button" id="cerrarModalEditar" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                <!-- Formulario para agregar HH -->
                <form>
                    
                    <div class="form-row">
                        <!-- localidad -->    
                        <div class="col-sm-6 mb-1">
                            <label for="editar_Localidad">Localidad</label> 
                            <select id="editar_Localidad" class="selectpicker2 editar_Localidad" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                        <!-- proyecto -->
                        <div class="col-sm-6 mb-1">
                            <label for="editar_Proyecto">Proyecto</label> 
                            <select id="editar_Proyecto" class="selectpicker2 editar_Proyecto" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <!-- solicito -->
                        <div class="col-sm-6 mb-1">
                            <label for="editar_Solicito">Solicitó</label>
                            <select id="editar_Solicito" class="selectpicker2 editar_Solicito" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                        <!-- especialidad -->
                        <div class="col-sm-6 mb-1">
                            <label for="editar_Especialidad">Especialidad</label> 
                            <select id="editar_Especialidad" class="selectpicker2 editar_Especialidad" data-live-search="true" title="-- Seleccionar --">
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <!-- fecha -->
                        <div class="col-sm-4 mb-1">
                            <label for="editar_Fecha">Fecha</label>
                            <input id="editar_Fecha" type="date" class="form-control form-control-sm">
                        </div>
                        <!-- HH -->
                        <div class="col-sm-4 mb-1">
                            <label for="editar_HH">HH</label>
                            <input id="editar_HH" type="number" class="form-control form-control-sm">
                        </div>
                        <!-- Extra -->
                        <div class="col-sm-4 mb-1">
                            <label for="editar_Extra">HH Extra</label>
                            <input id="editar_Extra" type="number" class="form-control form-control-sm" value="0">   
                        </div>
                    </div>    

                    <div class="form-row mb-1">
                        <!-- descripcion -->
                        <div class="col-12">
                            <label for="editar_Descripcion">Descripción</label>
                            <textarea id="editar_Descripcion" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <!-- fin row 4 -->

                    <div class="modal-footer">
                        <!-- id de la actividad para el formulario -->
                        <input type="hidden" id="editar_Actividad">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle mr-1"></span>Cancelar</button>
                        <button type="button" id="editarHoras" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk mr-1"></span>Guardar</button>
                    </div>

                </form>
                <!-- Fin formulario -->
            </div>
        </div>
    </div>
</div>
<!-- FIN MODAL EDITAR -->

<script type="text/javascript" src="asset/js-prisma/mishoras.js"></script>


</body>
</html> 

