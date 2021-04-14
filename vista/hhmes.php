<?php
session_start();
$id_activo = $_SESSION['usuario_activo'][0]['ID_USUARIO']; 
$hh_mes = $_SESSION['hh_mes'];
$especialidad = $_SESSION['especialidades'];
$proyectos_activos = $_SESSION['proyectos_activos'];
$localidades = $_SESSION['localidades'];
$solicitantes = $_SESSION['solicitantes'];
header("Content-Type: text/html;charset=utf-8");
?>


<?php include_once('cargahh-trabajador.php'); ?>

	<div class="container">
		<div class="row">
			<div class="col text-center">	
				<h2>HORAS MES</h2>
			</div>
		
			<div class="table-responsive">
				<table class="table table-sm table-hover" id="tablas">
						<thead>
						<tr class="table-info">
							<th scope="col">Fecha</th>
							<th scope="col" id="ocultar_tabla">Proyecto</th>
							<th scope="col" id="ocultar_tabla">Especialidad</th>
							<th scope="col">Descripción</th>
							<th scope="col">HH</th>
							<th scope="col">Extra</th>
							<th scope="col" colspan="2">Acciones</th>
						</tr>
						</thead>
						<tbody>
							<?php foreach($hh_mes as $row){ ?> 
					<tr>			
						<td><?php echo date("d/m/Y", strtotime($row['FECHA'])) ?></td>
						<td id="ocultar_tabla"><?php echo utf8_encode(ucfirst($row['NOMBRE_PROYECTO'])) ?></td>
						<td id="ocultar_tabla"><?php echo utf8_encode(ucfirst($row['TIPO_ESPECIALIDAD'])) ?></td>
						<td><?php echo utf8_encode(ucfirst($row['DESCRIPCION_ACTIVIDAD'])) ?></td>
						<td><?php echo $row['HH_USADAS'] ?></td>
						<td><?php echo $row['HH_EXTRAS'] ?></td>
						<td>
							
							<!-- BOTON ELIMINAR -->
							<!-- <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminar<?php echo $row['ID_ACTIVIDADES']; ?>"><span class="glyphicon glyphicon-trash"></span></button> -->
							<div class="text-center">
								<a href="#" data-toggle="modal" data-target="#eliminar<?php echo $row['ID_ACTIVIDADES']; ?>" ><span class="glyphicon glyphicon-trash"></a>
							</div>
							<!-- MODAL ELIMINAR HH - CONFIRMACION -->
							<div class="modal" id="eliminar<?php echo $row['ID_ACTIVIDADES']; ?>">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- HEADER DEL MODAL -->
										<div class="modal-header">
											<h4 class="modal-title">Realmente desea eliminar</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<div class="container mt-3 mb-3 text-center">
											<form action="../controlador/hh_cargadas.php" method="POST">
												<input type="hidden" name="accion" value="eliminar">
												<input type="hidden" name="id" value="<?php echo $row['ID_ACTIVIDADES']; ?>">
												<button type="submit" class="btn btn-danger" id="btnEliminar">Aceptar</button>
												<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
											</form>
										</div>
									</div>
								</div>
							</div>

						</td>
						<td>

							<!-- Boton Editar -->
							<!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal<?php echo $row['ID_ACTIVIDADES']; ?>"><span class="glyphicon glyphicon-pencil"></span></button> -->
							<div class="text-center">
								<a href="#" data-toggle="modal" data-target="#modal<?php echo $row['ID_ACTIVIDADES']; ?>" ><span class="glyphicon glyphicon-pencil"></a>
							</div>
							<!-- MODAL EDITAR HH -->
							<div class="modal" id="modal<?php echo $row['ID_ACTIVIDADES']; ?>">
								<div class="modal-dialog">
									<div class="modal-content">

										<!-- HEADER DEL MODAL -->
										<div class="modal-header">
											<h4 class="modal-title">Modificar HH seleccionada</h4>
											<button type="button" class="close" data-dismiss="modal">&times;</button>
										</div>

										<div class="container mt-3">
											<form action="../controlador/hh_cargadas.php" method="POST">
												<!-- BODY DEL MODAL -->
												<div class="container">
													<input type="hidden" name="accion" value="modificar">
													<!-- ID A MODIFICAR -->
													<input type="hidden" name="id" value="<?php echo $row['ID_ACTIVIDADES']; ?>">
													
													<!-- FECHA MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="fecha">Fecha</label>
														<div class="col-sm-9">
															<input type="date" name="fecha" class="form-control form-control-sm" id="fecha" value="<?php echo $row['FECHA'] ?>" required>
														</div>
													</div>
													<!-- PENDIENTE APLICAR EL FILTRO -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="localidad">Localidad</label>
														<div class="col-sm-9">
															<select class="form-control form-control-sm" id="id_localidad" name="id_localidad">
																<?php foreach($localidades as $loc){ ?>
																	<option value="<?php echo $loc['ID_PROYECTO'] ?>"><?php echo utf8_encode(ucfirst($loc['NOMBRE_LOCALIDAD'])) ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<!-- PROYECTO MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="proyecto">Proyecto</label>
														<div class="col-sm-9">
															<select class="form-control form-control-sm" id="id_proyecto" name="id_proyecto">
																<?php foreach($proyectos_activos as $proy){ ?>
																	<option value="<?php echo $proy['ID_PROYECTO'] ?>" <?php if($proy['ID_PROYECTO']==$row['ID_PROYECTO']) echo "selected";?>><?php echo utf8_encode(ucfirst($proy['NOMBRE_PROYECTO'])) ?></option>
																<?php } ?>
															</select>
														</div>
													</div>

													<!-- SOLICITO MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="solicito">Solicito</label>
														<div class="col-sm-9">
															<select class="form-control form-control-sm" id="id_solicito" name="id_solicito">
																<?php foreach($solicitantes as $so){ ?>
																	<option value="<?php echo $so['ID_SOLICITO'] ?>" <?php if($so['NOMBRE']==$row['SOLICITO']) echo "selected";?>><?php echo utf8_encode(ucfirst($so['NOMBRE_COMPLETO'])) ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<!-- ESPECIALIDAD MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="especialidad">Especialidad</label>
														<div class="col-sm-9">
															<select class="form-control form-control-sm" id="id_especialidad" name="id_especialidad">
																<?php foreach($especialidad as $esp){ ?>
																	<option value="<?php echo $esp['ID'] ?>" <?php if($esp[1]==$row['TIPO_ESPECIALIDAD']) echo "selected";?>><?php echo utf8_encode(ucfirst($esp['NOMBRE'])) ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<!-- DESCRIPCION MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="descripcion">Descripcion</label>
														<div class="col-sm-9">
															<textarea class="form-control form-control-sm" rows="5" name="descripcion" id="descripcion" required><?php echo utf8_encode(strtoupper($row['DESCRIPCION_ACTIVIDAD'])) ?></textarea>
														</div>
													</div>
													<!-- HH_USADAS MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="hh_usadas">HH Usadas</label>
														<div class="col-sm-9">
															<input type="text" name="hh_usadas" class="form-control form-control-sm" id="hh_usadas" value="<?php echo $row['HH_USADAS'] ?>" required>
														</div>
													</div>
													<!-- HH_EXTRAS MODAL -->
													<div class="form-group row">
														<label class="col-sm-3 col-form-label" for="hh_extras">HH Extras</label>
														<div class="col-sm-9">
															<input type="text" name="hh_extras" class="form-control form-control-sm" id="hh_extras" value="<?php echo $row['HH_EXTRAS'] ?>" required>
														</div>
													</div>
												</div><!-- FIN BODY DEL MODAL -->

												<!-- Modal footer -->
												<div class="modal-footer">
													<div class="container text-center">
														<button class="btn btn-danger" type="submit" id="btnEditar">Editar</button>
														<button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
													</div>
												</div>
											</form>
										</div> <!-- fin body modificar -->
										
									</div>
								</div>
							</div> <!-- fin editar -->
						</td>
						
					</tr>
					<?php
					}
					?>
						</tbody>
				</table>
			</div>
		</div>
	</div>



<?php include_once('modal_agregar.php'); ?>

<?php include_once('footer.php'); ?>