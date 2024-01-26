<?php
/*
Template Name: Register Page
*/
?>

<p class="register-message" style="display:none"></p>
<form action="#" method="POST" name="register-form" class="register-form">
    <fieldset> 
        <label><i class="fa fa-file-text-o"></i> Formulario de registro</label>
        <input type="text" name="new_user_name" placeholder="Username" id="new-username">
        <input type="email" name="new_user_email" placeholder="Email address" id="new-useremail">
        <input type="password" name="new_user_password" placeholder="Password" id="new-userpassword">
        <input type="password" name="re-pwd" placeholder="Re-enter Password" id="re-pwd">
        <input type="submit" class="button" id="register-button" value="Register">
    </fieldset>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#register-button').on('click', function (e) {
            e.preventDefault();
            var newUserName = $('#new-username').val();
            var newUserEmail = $('#new-useremail').val();
            var newUserPassword = $('#new-userpassword').val();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "register_user_front_end",
                    new_user_name: newUserName,
                    new_user_email: newUserEmail,
                    new_user_password: newUserPassword
                },
                success: function (results) {
                    console.log(results);
                    $('.register-message').text(results).show();
                },
                error: function (results) {
                    // Manejar errores aquí si es necesario
                }
            });
        });
    });
</script>
