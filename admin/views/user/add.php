<section id="middle">
	<header id="page-header">
		<h1>Agregar Usuario</h1>
	</header>
	<form onsubmit="return addUser()">
		<div id="content" class="padding-20">
			<div class="row">
                <div class="col-sm-4 col-md-offset-4">
                    <label class="checkbox">
                        <input type="checkbox" id ="isAdmin">
                        Administrador <i></i>
                    </label>
                </div>

			</div>
			<div class="row">
				<div class="col-sm-4 col-md-offset-4">
					<label>Nombre:</label>
					<input id="userName" type="text" class="form-control">
				</div>
			</div>
			<div class="row">
                <div class="col-sm-4 col-md-offset-4">
					<label>Cédula:</label>
					<input id="userId" type="text" class="form-control">
				</div>
			</div>
            <div class="row">
                <div class="col-sm-4 col-md-offset-4">
					<label>Contraseña:</label>
					<input id="userPassword" type="password" class="form-control">
				</div>
			</div>
			<div id="errorAddUser"></div>
			<div class="row">
				<div class="col-sm-8">
					<footer>
						<button style="color: white;" id="btn-send-user" type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Guardar</button>
					</footer>
				</div>
			</div>
		</div>
	</form>
</section>