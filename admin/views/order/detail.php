<section id="middle">
	<header id="page-header">
		<h1>Detalle de Compra</h1>
	</header>
	<form>
		<div id="content" class="padding-20">
            <div class="row">
                <div class="col-sm-2 ">
					<label>Nro de Compra:</label>
					<input id="orderId" type="text" class="form-control" disabled value="<?=$this->orders->pedidoId?>">
				</div>
			
				<div class="col-sm-2 ">
					<label>Cedula:</label>
					<input id="userId" type="text" class="form-control" disabled value="<?=$this->orders->cedula?>">
				</div>
			
                <div class="col-sm-4 ">
					<label>Nombre:</label>
					<input id="userName" type="text" class="form-control" disabled value="<?=$this->orders->usuarioNombre?>">
				</div>
            </div>
            <div class="row">
                <div class="col-sm-8 ">
					<label>Feedback:</label>
					<textarea id="feedback" type="text" class="form-control" disabled rows="5"> <?=$this->orders->feedback?> </textarea>
				</div>
            </div>

            <div class="row">
                <div class="col-sm-8 ">
                    <table class="table table-striped" id="datatable_products">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($this->prodsDetail!=null){
                                $count = 0;
                                foreach($this->prodsDetail as $prod){$count++;?>
                                    <tr>
                                        <td><?=$count?></td>
                                        <td><?=$prod->productoNombre?></td>
                                        <td><?=$prod->productoDescripcion?></td>
                                        <td><?=$prod->precio?></td>
                                        <td><?=$prod->cantidad?></td>
                                    </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</form>
</section>