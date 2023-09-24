<link rel="stylesheet" href="<?=EE?>app/plugins/css/template/fonts/material-icon/css/material-design-iconic-font.min.css">
<!-- Main css -->
<link rel="stylesheet" href="<?=EE?>app/plugins/css/template/css/style.css?t=<?= time()?>">

     <!-- Sign up form -->
     <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Mot de passe oublié</h2>
                    <p> Entrer votre adresse mail pour récuperer votre mot de passe</p> <br> <br>
                    <form method="POST" class="register-form " id="register-form" action='<?=EE?>Logins/forgetPassWord'>
                       
                        <div class="form-group">
                            <input type="emaii" name="gmail" id="gmail" placeholder="Adress G-mail" value='<?=isset($_POST['gmail'])?$_POST['gmail']:null ?>'/>
                        </div>
                       
                        <div class="form-group form-button">
                            <input type="submit" name="checkCompte" id="signup" class="form-submit" value="Suivant"/>
                        </div>
                        <?php
                    if(isset($this->erreur)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">oups!</h4>
                        <p class="mb-0"><?=$this->erreur ?></p>
                    </div>
                    
                    <?php }?>
                    </form>
                </div>
            </div>
        </div>
    </section>
