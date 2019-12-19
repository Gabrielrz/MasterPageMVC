<?php //datos: $nombre,$edad,$ciudad,$mail    y contraseña ?>


<div id="contenedor_Login">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 class="h3 mb-3 font-weight-normal">Registrate</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="index.php?seccion=registro" method="post" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="mail" placeholder="mail">
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						  <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" required >
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						  <input type="text" name="edad" class="form-control" placeholder="Tu edad" required >
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						 <input type="text" name="ciudad" class="form-control" placeholder="Tu ciudad" required >
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="pass" placeholder="password">
					</div>

					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>

					<div class="form-group">
						<input type="submit" value="Registrar" name="submit" class="btn float-right login_btn">
					</div>

				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="index.php?seccion=Registro">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Olvidaste la contraseña</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div></div>
  </div>
