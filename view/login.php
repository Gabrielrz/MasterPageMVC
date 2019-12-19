
<div id="contenedor_Login">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="index.php?seccion=login" method="post" >
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="mail" id="mail" placeholder="mail">

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
						<input type="submit" value="Login" name="submit" class="btn float-right login_btn">
					</div>
					<div class="respuestas" style="padding-top:40px; margin:10px; box-sizing:border-box;">
						<?php
							echo $resp;
						?>
				</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="index.php?seccion=Registro">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#" onclick="recuperar()">Olvidaste la contraseña</a>
				</div>
			</div>
		</div>
	</div>

</div>

  </div>


	<script type="text/javascript">

	function recuperar(){
				var mail=document.getElementById('mail').value;

				location.href="http://localhost/ejerciciosPHP/MasterPageMVC/index.php?seccion=recuperarCuenta";

	}
	</script>
