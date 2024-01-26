<?php
/*
Template Name: Login plugin
*/
get_header();
?>
<h2>Mundo Scort Login/Registro</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<p class="register-message" style="display:none"></p>
		<form action="#" method="POST" name="register-form" class="register-form" id="register">
			<h1>Crea tu cuenta</h1>
			<input type="text" name="new_user_name" placeholder="Usuario" id="new-username">
			<input type="email" name="new_user_email" placeholder="Correo " id="new-useremail">
			<input type="password" name="new_user_password" placeholder="Contraseña" id="new-userpassword">
			<input type="password" name="re-pwd" placeholder="De nuevo la contraseña" id="re-pwd">
			<input class="submit_button" type="submit" value="Registrate" name="submit-login">
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form id="login" action="login" method="post">
			<h1>Ingresa</h1>
			<p class="status"></p>
			<input id="username" type="text" name="username" placeholder="Usuario o Correo">
			<input id="password" type="password" name="password" placeholder="Contraseña">
			<a href="<?php echo wp_lostpassword_url(); ?>">Olvidaste tu contraseña?</a>
			<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
			<input class="submit_button" type="submit" value="Login" name="submit-register">

		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenidos!</h1>
				<p>Para poder crear anuncios, por favor ingresa tu cuenta.</p>
				<button class="ghost" id="signIn">Ingresa</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola, Amigo!</h1>
				<p>Para poder crear anuncios, por favor crea tu cuenta</p>
				<button class="ghost" id="signUp">Crea tu cuenta</button>
			</div>
		</div>
	</div>
</div>
<div id="msjAccountcreate" class="msjAccountcreate">
    <div class="contentMsjCreate">
        <span id="cerrarModal" class="cerrar-modal" onclick="cerrarModal()">&times;</span>
        <h2>¡Registro Exitoso!</h2>
        <div class="msjAccountcreate-content" id="contentMsjRegister"></div>
        <button title="iniciarSesion" class="btn" type="button" onclick="iniciarSesion()">Iniciar Sesión</button>
    </div>

</div>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    const msjAccountcreate = document.getElementById('msjAccountcreate');

    signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
    });

    const cerrarModal = () => {
        msjAccountcreate.classList.remove('animated');
    }

	const iniciarSesion = () => {
        windows.location.href = "/"
    }

    document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.querySelector('form#register');

    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const newUserName = document.querySelector('#new-username').value;
            const newUserEmail = document.querySelector('#new-useremail').value;
            const newUserPassword = document.querySelector('#new-userpassword').value;
            const adminAjaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>"

            fetch(adminAjaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'register_user_front_end',
                    new_user_name: newUserName,
                    new_user_email: newUserEmail,
                    new_user_password: newUserPassword,
                }),
            })
                .then(response => response.text())
                .then(results => {
                    document.querySelector('#contentMsjRegister').textContent = results;
                    document.querySelector('#msjAccountcreate').classList.add('animated');
                })
                .catch(error => {
                    // Manejar errores aquí si es necesario
                    console.error(error);
                });
        });
    }
});

	
</script>