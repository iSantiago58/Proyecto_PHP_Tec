<section id="middle">
	<header id="page-header">
		<h1>Categorias</h1>
	</header>
	<div id="content" class="padding-20">
		<?if(isset($msj)){
			print $msj;
		}?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php print_r($this->categories)?>
				<div class="table-responsive margin-bottom-30">
					<div class="margin-bottom-10">
						<a href="<?=PROJECT?>category/add" class="btn btn-primary">Agregar</a>
					</div>
					<table class="table table-striped table-bordered table-hover" id="datatable_sample">
						<thead>
							<tr>
								<th scope="col">Nombre</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							
                            <tr>
                                <td></td>
                            
                                <td class="text-center"><a href="">Editar</a></td>
                            </tr>
            
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>