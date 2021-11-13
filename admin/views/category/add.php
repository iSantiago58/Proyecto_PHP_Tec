<section id="middle">
	<header id="page-header">
		<h1>Agregar Categoria</h1>
	</header>
	<form onsubmit="return addCategory()">
		<div id="content" class="padding-20">
			<div class="row">
				<div class="col-sm-6">
					<label>Nombre:</label>
					<input id="categoryName" type="text" class="form-control">
				</div>
                
			</div>
			<div id="errorAddCategory"></div>
			<div class="row">
				<div class="col-sm-6">
					<footer>
						<button style="color: white;" id="btn-send-category" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Guardar</button>
					</footer>
				</div>
			</div>
		</div>
	</form>
</section>