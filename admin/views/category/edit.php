<section id="middle">
	<header id="page-header">
		<h1>Agregar Categoria</h1>
	</header>
	<form onsubmit="return editCategory()">
		<div id="content" class="padding-20">
			<div class="row">
                <div class="col-sm-1">
					<label>Código:</label>
					<input id="categoryId" type="text" class="form-control" disabled value="<?=$this->category->categoriaId?>" >
				</div>
				<div class="col-sm-4">
					<label>Nombre:</label>
					<input id="categoryName" type="text" class="form-control" value="<?=$this->category->categoriaNombre?>">
				</div>
                <div class="col-sm-1">
                    <label></label>
                    <button id="btn-edit-category" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
		</div>
        <div id="errorEditCategory"></div>
        
	</form>
</section>