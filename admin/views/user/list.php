<section id="middle">
	<header id="page-header">
		<h1>Usuarios</h1>
	</header>
	<div id="content" class="padding-20">
	<?php if(isset($this->message)){
			print_r( $this->message);
		}?>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive margin-bottom-30">
					<div class="margin-bottom-10">
						<a href="<?=PROJECT?>user/add" class="btn btn-primary">Agregar</a>
					</div>
					<table class="table table-striped table-bordered table-hover" id="datatable_sample">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col" class="text-center">Activo</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							
									<tr>
										<td></td>
										<td class="text-center">
											<label class="switch switch-primary">
												<input type="checkbox" onclick="cambiarEstadoCategoria()">
												<span class="switch-label" data-on="SI" data-off="NO"></span>
											</label>
										</td>
										<td class="text-center"><a href="">Editar</a></td>
									</tr>
					
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>