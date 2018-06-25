(function($){
    $(document).ready(function($) {

        var loginsubmit = $('#loginsubmit');
        var loginform = $('#loginform');

        $(loginsubmit).click(function () {

            var user_login = $('#user_login').val();
            var user_pass = $('#user_pass').val();
            var rememberme = $("#rememberme").prop("checked");
            var logformData = {
                login: user_login,
                password: user_pass,
                rememberme: rememberme,
                action: 'url_authentication'
            };

            $.post( ajaxurl.url, logformData, function(response) {

                if (response === "200") {
                    document.getElementById("foo").innerHTML= 'Вы успешно авторизировались!';
                    document.location.href = '/';
                } else {
                    document.getElementById("foo").innerHTML= 'Вы ввели неверные данные.';
                }
           });

            return false;
        })


        var regsubmit = $('#regsubmit');

        $(regsubmit).click(function() {

            var reg_user_login = $('#reg_user_login').val();
            var reg_user_email = $('#reg_user_email').val();
            var reg_user_password = $('#reg_user_password').val();
            var regformData = {
                login: reg_user_login,
                email: reg_user_email,
                password: reg_user_password,
                action: 'url_registration'
            };

            $.post( ajaxurl.url, regformData, function(response) {

                document.getElementById("foo").innerHTML= response;

                if (response === "200") {
                    document.getElementById("foo").innerHTML= 'Вы успешно зарегистрировались!';
                    document.location.href = '/';
                } else {
                    document.getElementById("foo").innerHTML= 'Такой логин или email уже существует.';
                }
            });

            return false;
        })
    });
})(jQuery)
