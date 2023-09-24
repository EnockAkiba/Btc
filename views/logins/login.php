<link rel="stylesheet" href="<?=EE?>app/plugins/css/template/fonts/material-icon/css/material-design-iconic-font.min.css">
<!-- Main css -->
<link rel="stylesheet" href="<?=EE?>app/plugins/css/template/css/style.css?t=<?= time()?>">
    <!-- Sign login form -->
    <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="<?=EE?>app/public/photos/img/logo.png" alt="sing up image"  width="100px"></figure>
                <div class="d-flex flex-column  h-50 justify-content-center">
                <a href="<?=EE?>Inscriptions/inscription" class="signup-image-link">Creer un compte / S'inscrire</a>
                <a href="<?=EE?>Logins/forgetPassWord" class="signup-image-link mt-5"> Mot de passe oublié</a>
                </div>
            </div>

            <div class="signin-form">
                <h2 class="form-title">Se Connecter</h2>
                <form method="POST" class="register-form" id="login-form" action='<?=EE?>Logins/seConnecter'>
                    <div class="form-group">
                        <label for="username"><i class="zmdi zmdi-account material-icons-name"></i> Votre nom utilisateur</label>
                        <input type="text" name="userName" id="username" placeholder="" value='<?=isset($_POST['userName'])?$_POST['userName']:null ?>'/>
                    </div>
                    <div class="form-group">
                        <label for="password" onclick='eye()'><i class="" id='icone'></i> Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="" value='<?=isset($_POST['password'])?$_POST['password']:null ?>' />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="rememberMe" id="rememberMe" class="agree-term" />
                        <label for="rememberMe" class="label-agree-term"><span><span></span></span>Se souvenir de moi</label>
                    </div>
                    
                    <div class="form-group form-button">
                        <input type="submit" name="btnConnection" id="btnConnection" class="form-submit" value="Connexion" />
                    </div>
                    <?php
                    if(isset($this->erreur)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"> 😔 oups!</h4>
                        <p class="mb-0"><?=$this->erreur ?></p>
                    </div>
                    
                    <?php }?>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
e = true;
$('#icone').addClass("fa fa-eye-slash");
function eye() {
    if (e) {
        document.getElementById("password").setAttribute("type", "text");
        $('#icone').addClass("fa fa-eye");
        e = false;
    } else {
        document.getElementById("password").setAttribute("type", "password");
        $('#icone').removeClass("fa fa-eye");
        $('#icone').addClass("fa fa-eye-slash");
        e = true;
    }
}
</script>