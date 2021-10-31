<section id="middle">
	<header id="page-header">
		<h1>Agregar Categoria</h1>
	</header>
	<form onsubmit="return agregarCategoria()">
		<div id="content" class="padding-20">
			<div class="row">
				<div class="col-sm-6">
					<label>Nombre:</label>
					<input id="nombreCategoria" type="text" class="form-control">
				</div>
                
			</div>
			<div id="errorAgregar"></div>
			<div class="row">
				<div class="col-sm-6">
					<footer>
						<button id="btn-enviar" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Guardar</button>
					</footer>
				</div>
			</div>
		</div>
	</form>
</section>