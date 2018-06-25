<?php
/*
Template Name: login
Template Post Type: page
*/
if(is_user_logged_in()){ ?>
    <div class="content-404">
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/images/404/404.png" class="img-responsive" alt="" />
        <h1><b>OPPS!</b> Вы уже вошли</h1>
        <h2><a href="<?php bloginfo( 'url' ); ?>">Вернуться на главную</a></h2>
    </div>

<?php
    wp_die();
} else {
    wp_logout();
}

 get_header();
?>
    <div id="foo" style=""></div>
        <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->

						<h2>Войти в аккаунт</h2>

                        <form name="loginform" id="loginform" action="" method="post">

                            <p class="login-username">
                                <input type="text" name="log" id="user_login" class="input" value="" placeholder="Логин"/>
                            </p>

                            <p class="login-password">
                                <input type="password" name="pwd" id="user_pass" class="input" value="" placeholder="Пароль"/>
                            </p>

                            <span>
                                <label for="rememberme">
                                    <input name="rememberme" class="checkbox" type="checkbox" id="rememberme" value="forever">
                                    Запомнить меня
                                </label>
                            </span>

                            <p class="submit">
                                <input type="submit" name="wp-submit" id="loginsubmit" class="btn btn-default" value="Войти"/>
                            </p>

                        </form>

					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Или</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->

						<h2>Создать новый</h2>

                            <form name="registerform" id="registerform" action="" method="post">
                                <p>
                                    <input type="text" name="user_login" id="reg_user_login" class="input" value="" size="20"  placeholder="Логин">
                                </p>

                                <p>
                                    <input type="email" name="user_email" id="reg_user_email" class="input" value="" size="25" placeholder="Email">
                                </p>

                                <p>
                                    <input type="password" name="user_password" id="reg_user_password" class="input" value="" size="25" placeholder="Пароль">
                                </p>

                                <p class="submit">
                                    <input type="submit" name="wp-submit" id="regsubmit" class="btn btn-default" value="Регистрация">
                                </p>
                            </form>
                    </div><!--/sign up form-->

				</div>
			</div>
		</div>
	</section><!--/form-->
<?php get_footer(); ?>