<section id="middle">
	<header id="page-header">
		<h1>Agregar Usuario</h1>
	</header>
	<form onsubmit="return agregarUsuario()">
		<div id="content" class="padding-20">
			<div class="row">
				<div class="col-sm-6">
					<label>Nombre:</label>
					<input id="nombre" type="text" class="form-control">
				</div>
                <div class="col-sm-6">
					<label>Cédula:</label>
					<input id="cedula" type="text" class="form-control">
				</div>
			</div>
            <div class="row">
				<div class="col-sm-6">
					<label>Usuario:</label>
					<input id="nombre" type="text" class="form-control">
				</div>
                <div class="col-sm-6">
					<label>Contraseña:</label>
					<input id="cedula" type="password" class="form-control">
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