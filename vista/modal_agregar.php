<!-- Boton AGREGAR -->
<!-- MODAL AGREGAR HH -->
<div class="modal" id="modal_agregar">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- HEADER DEL MODAL -->
			<div class="modal-header">
				<h4 class="modal-title">Agregar HH</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="container mt-3">
				<form action="../controlador/hh_cargadas.php" method="POST">
					<!-- BODY DEL MODAL -->
					<div class="container">
						<input type="hidden" name="accion" value="agregar">
						
						<!-- FECHA MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="fecha">Fecha</label>
							<div class="col-sm-9">
								<input type="date" name="fecha" class="form-control form-control-sm" id="fecha" required>
							</div>
						</div>
						<!-- PENDIENTE APLICAR EL FILTRO -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="localidad">Localidad</label>
							<div class="col-sm-9">
								<select class="form-control form-control-sm" id="id_localidad" name="id_localidad">
									<option value="-1">-- Seleccionar --</option>
									<?php foreach($localidades as $loc){ ?>
										<option value="<?php echo $loc['ID_PROYECTO'] ?>" ><?php echo utf8_encode(ucfirst($loc['NOMBRE_LOCALIDAD'])) ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<!-- PROYECTO MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="proyecto">Proyecto</label>
							<div class="col-sm-9">
								<select class="form-control form-control-sm" id="id_proyecto" name="id_proyecto">
									<option value="-1">-- Seleccionar --</option>
									<?php foreach($proyectos_activos as $proy){ ?>
										<option value="<?php echo $proy['ID_PROYECTO'] ?>" ><?php echo utf8_encode(ucfirst($proy['NOMBRE_PROYECTO'])) ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<!-- SOLICITO MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="solicito">Solicito</label>
							<div class="col-sm-9">
								<select class="form-control form-control-sm" id="id_solicito" name="id_solicito">
									<option value="-1">-- Seleccionar --</option>
									<?php foreach($solicitantes as $so){ ?>
										<option value="<?php echo $so['ID_SOLICITO'] ?>" ><?php echo utf8_encode(ucfirst($so['NOMBRE_COMPLETO'])) ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<!-- ESPECIALIDAD MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="especialidad">Especialidad</label>
							<div class="col-sm-9">
								<select class="form-control form-control-sm" id="id_especialidad" name="id_especialidad">
									<option value="-1">-- Seleccionar --</option>
									<?php foreach($especialidad as $esp){ ?>
										<option value="<?php echo $esp['ID'] ?>" ><?php echo utf8_encode(ucfirst($esp['NOMBRE'])) ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<!-- DESCRIPCION MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="descripcion">Descripcion</label>
							<div class="col-sm-9">
								<textarea class="form-control form-control-sm" rows="5" name="descripcion" id="descripcion" placeholder="Ingrese la descripción de la actividad realizada" required></textarea>
							</div>
						</div>
						<!-- HH_USADAS MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="hh_usadas">HH Usadas</label>
							<div class="col-sm-9">
								<input type="text" name="hh_usadas" class="form-control form-control-sm" id="hh_usadas" value="0" required>
							</div>
						</div>
						<!-- HH_EXTRAS MODAL -->
						<div class="form-group row">
							<label class="col-sm-3 col-form-label" for="hh_extras">HH Extras</label>
							<div class="col-sm-9">
								<input type="text" name="hh_extras" class="form-control form-control-sm" id="hh_extras" value="0" required>
							</div>
						</div>
					</div><!-- FIN BODY DEL MODAL -->

					<!-- Modal footer -->
					<div class="modal-footer">
						<div class="container text-center">
							<button class="btn btn-danger" type="submit" id="btnEditar">Agregar</button>
							<button class="btn btn-primary" type="button" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</form>
			</div> <!-- fin body modificar -->
			
		</div>
	</div>
</div> <!-- fin agregar -->