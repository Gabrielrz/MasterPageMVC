<?php //datos: $nombre,$edad,$ciudad,$mail    y contraseña ?>
<h1 class="h3 mb-3 font-weight-normal">Recuperar Cuenta</h1>
<form class="form-signin mx-auto col-12 p-3" action="index.php?seccion=recuperarCuenta" method="post">
			  <p class="text-justify col-12" ><i class="fa fa-user fa-5x fa-border " style="" aria-hidden="true"></i></p>
			  <h1 class="h3 mb-3 font-weight-normal">Cambiar la contraseña</h1>

				<label for="mail" class="sr-only">Mail</label>
			  <input type="email" name="mail" class="form-control" placeholder="Tu correo" required autofocus>
					<?php if($concederPermiso!=false){?>
				<label for="pass" class="sr-only">Contraseña nueva</label>
			  <input type="password" name="pass" class="form-control" placeholder="Tu contraseña " required>

        <label for="pass" class="sr-only">Repetir Contraseña</label>
        <input type="passVerify" name="pass" class="form-control" placeholder="Tu contraseña " required>

				<?php }?>
			  <button name="submit" class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>


</form>
