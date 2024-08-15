/**
* Script pour la vérification de l'enregistrement des utilisateurs
*/
$('#register-user').click(function() {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirm = $('#password-confirm').val();
    var passwordLength = password.length;
    var agreeterms = $('#agreeterms').prop('checked');

    // Vérification du prénom
    if (firstname != "" && /^[ a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ'`'\-]+$/.test(firstname)) {
        $('#firstname').removeClass('is-invalid').addClass('is-valid');
        $('#error-register-firstname').text("");
    } else {
        $('#firstname').addClass('is-invalid').removeClass('is-valid');
        $('#error-register-firstname').text("First name is not valid!");
        return; // Arrête l'exécution si le prénom est invalide
    }

    // Vérification du nom de famille
    if (lastname != "" && /^[ a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ'`'\-]+$/.test(lastname)) {
        $('#lastname').removeClass('is-invalid').addClass('is-valid');
        $('#error-register-lastname').text("");
    } else {
        $('#lastname').addClass('is-invalid').removeClass('is-valid');
        $('#error-register-lastname').text("Last name is not valid!");
        return; // Arrête l'exécution si le nom de famille est invalide
    }

    // Vérification de l'email
    if (email != "" && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        $('#email').removeClass('is-invalid').addClass('is-valid');
        $('#error-register-email').text("");
    } else {
        $('#email').addClass('is-invalid').removeClass('is-valid');
        $('#error-register-email').text("Your email address is not valid!");
        return; // Arrête l'exécution si l'email est invalide
    }

    // Vérification du mot de passe
    if (passwordLength >= 8) {
        $('#password').removeClass('is-invalid').addClass('is-valid');
        $('#error-register-password').text("");

        // Vérification de la confirmation du mot de passe
        if (password === password_confirm) {
            $('#password-confirm').removeClass('is-invalid').addClass('is-valid');
            $('#error-register-password-confirm').text("");
        } else {
            $('#password-confirm').addClass('is-invalid').removeClass('is-valid');
            $('#error-register-password-confirm').text("Your passwords must be identical!");
            return; // Arrête l'exécution si les mots de passe ne correspondent pas
        }
    } else {
        $('#password').addClass('is-invalid').removeClass('is-valid');
        $('#error-register-password').text("Your password must be at least 8 characters!");
        return; // Arrête l'exécution si le mot de passe est trop court
    }

    // Vérification des conditions d'utilisation
    if (agreeterms) {
        $('#agreeterms').removeClass('is-invalid');
        $('#error-register-agreeterms').text("");

        // Envoi du formulaire
        // alert('data-ok');

        var res = emailExistjs(email);
        $(res != "exist") ?  $('form-register').submit()
             :   $('#email').addClass('is-invalid').removeClass('is-valid');
                $('#error-register-email').text("This email address is already used!");




    } else {
        $('#agreeterms').addClass('is-invalid');
        $('#error-register-agreeterms').text("You should agree to our terms and conditions!");
    }
});

// Vérification de la case à cocher lors du changement
$('#agreeterms').change(function() {
    if ($(this).prop('checked')) {
        $('#agreeterms').removeClass('is-invalid');
        $('#error-register-agreeterms').text("");
    } else {
        $('#agreeterms').addClass('is-invalid');
        $('#error-register-agreeterms').text("You should agree to our terms and conditions!");
    }
});

function emailExistjs(email)
{
    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res ="";

    $.ajax({
              type: 'POST',
              url: url,
              data:{
                'token': token,
                email: email
              },
              success:function(result){
                res = result.response;
              },
              async: false
    });
    return res;
}
