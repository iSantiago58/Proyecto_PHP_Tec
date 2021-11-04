<section id="middle">
	<header id="page-header">
		<h1>Compras</h1>
	</header>
	<div id="content" class="padding-20">
	<?php if(isset($this->message)){
			print_r( $this->message);
		}?>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive margin-bottom-30">
					<table class="table table-striped table-bordered table-hover" id="datatable_sample">
						<thead>
							<tr>
								<th scope="col">Nro Compra</th>
								<th scope="col">Cédula</th>
                                <th scope="col" class="text-center">Nombre</th>
								<th scope="col" class="text-center">Fecha de Compra</th>
                                <th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php if($this->orders!=null){
								foreach($this->orders as $order){?>
									<tr>
										<td><?=$order->pedidoId?></td>
										<td><?=$order->cedula?></td>
                                        <td><?=$order->usuarioNombre?></td>
                                        <td><?=$order->fechacompra?></td>
										<td class="text-center"><a href="<?=PROJECT?>order/detail/<?=$order->pedidoId?>">Detalle</a></td>
									</tr>
							<?php }} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>