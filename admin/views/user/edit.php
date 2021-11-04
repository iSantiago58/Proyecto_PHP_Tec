<section id="middle">
	<header id="page-header">
		<h1>Editar Usuario</h1>
	</header>
	<form onsubmit="return editUser()">
		<div id="content" class="padding-20">
            <div class="row">
                <div class="col-sm-4 col-md-offset-4">
					<label>Cédula:</label>
					<input id="userId" type="text" class="form-control" disabled value="<?=$this->users->cedula?>">
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4 col-md-offset-4">
					<label>Nombre:</label>
					<input id="userName" type="text" class="form-control" value="<?=$this->users->usuarioNombre?>">
				</div>
			</div>
			
            <div class="row">
                <div class="col-sm-4 col-md-offset-4">
					<label>Contraseña:</label>
					<input id="userPassword" type="password" class="form-control" value="<?=$this->users->password?>">
				</div>
			</div>
			<div id="errorEditUser"></div>
			<div class="row">
				<div class="col-sm-8">
					<footer>
						<button id="btn-edit-user" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Guardar</button>
					</footer>
				</div>
			</div>
		</div>
	</form>
</section>