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
								<th scope="col">Cédula</th>
								<th scope="col">Nombre</th>
								<th scope="col" class="text-center">Habilitado</th>
								<th scope="col" class="text-center">Administrador</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php if($this->users!=null){
								foreach($this->users as $user){?>
									<tr>
										<td><?=$user->cedula?></td>
										<td><?=$user->usuarioNombre?></td>
										<td class="text-center">
											<label class="switch switch-primary">
												<input <?php if ($user->esHabilitado){?> checked <?php }?>type="checkbox" onclick="updateUserState(<?=$user->cedula?>)">
												<span class="switch-label" data-on="SI" data-off="NO"></span>
											</label>
										</td>
										<td class="text-center">
											<label class="switch switch-primary">
												<input <?php if ($user->esAdmin){?> checked <?php }?>type="checkbox" onclick="updateUserAdminState(<?=$user->cedula?>)">
												<span class="switch-label" data-on="SI" data-off="NO"></span>
											</label>
										</td>
										<td class="text-center"><a href="<?=PROJECT?>user/edit/<?=$user->cedula?>">Editar</a></td>
									</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>