<link rel="stylesheet" href="<?=EE?>app/plugins/css/template/fonts/material-icon/css/material-design-iconic-font.min.css">
<!-- Main css -->
<link rel="stylesheet" href="<?=EE?>app/plugins/css/template/css/style.css?t=<?= time()?>">
<!-- Sign up form -->
<style>
    .error
{
  color: red;
  size: 80%
}
.hidden
{
  display:none
}
</style>
<section class="signup ">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Prendre l'inscription</h2>
                <form method="POST" class="register-form" id="register-form" action='<?=EE?>Inscriptions/Inscription'>
                    <div class="row my-2">
                        <div class="col-md-6 col-sm-6 my-2">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i> Nom </label>
                                <input type="text" name="nom" id="nom" placeholder="" value='<?=isset($_POST['nom'])?$_POST['nom']:null ?>'/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 my-2">
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-emai"></i> Postnom</label>
                                <input type="text" name="postNom" id="postNom" placeholder="" value='<?=isset($_POST['postNom'])?$_POST['postNom']:null ?>'/>
                            </div>
                        </div>
                    </div>

                    <div class="row my-2">
                    <div class="col-md-6 col-sm-6 my-2 ">
                            <label for="email"><i class="fa fa-people-arrows"></i> Genre </label>
                            <select name="sexeUser" id="sexeUser">
                                <option value='<?=isset($_POST['sexeUser'])?$_POST['sexeUser']:null ?>'><?=isset($_POST['sexeUser'])?$_POST['sexeUser']:null ?></option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                        <div class="col-md-6 col-sm-6 my-2">
                            <div class="form-group">
                                <label for="email"><i class="fa fa-calendar"></i> Date de naissance </label>
                                <input type="date" name="dateNaissUser" id="dateNaissUser"
                                    placeholder="" value='<?=isset($_POST['dateNaissUser'])?$_POST['dateNaissUser']:null ?>' />
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-6 col-sm-6 my-2 ">
                                <label for="tel"><i class="fa fa-phone"></i> Phone </label>
                                <input type="text" name="telephoneUser" id="telephoneUser" placeholder="Entrer votre numéro de téléphone" 
                                required
                            value='<?=isset($_POST['telephoneUser'])?$_POST['telephoneUser']:null ?>' />
                            </div>
                        
                        <div class="col-md-6 col-sm-6 my-2 ">
                            <div class="form-group">
                                <label for="re-pass"><i class="fa fa-location-pin"></i> Votre addresse AV Q</label>
                                <input type="text" name="adresseUser" id="adresseUser"
                                    placeholder="Quartier/Avenue" value='<?=isset($_POST['adresseUser'])?$_POST['adresseUser']:null ?>'/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                         <div class="col-md-12 col-sm-6 my-2">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i> Adresse g-mail</label>
                                <input type="email" name="gmail" id="gmail" placeholder="Entrer votre Adresse Mail " value='<?=isset($_POST['gmail'])?$_POST['gmail']:null ?>'/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                         <div class="col-md-6 col-sm-6 my-2">
                            <div class="form-group">
                            <label for="pass" onclick="eye()"><i id="icone"></i> Votre mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="" value='<?=isset($_POST['password'])?$_POST['password']:null ?>' />
                        </div>
                        </div>
                        <div class="col-md-6 col-sm-6 my-2">
                            <div class="form-group">
                            <label for="pass" onclick="eye()"><i class="" id="icone2"></i> Confirmer votre mot de
                            passe</label>
                        <input type="password" name="password2" id="password2" placeholder="" value='<?=isset($_POST['password2'])?$_POST['password2']:null ?>' />
                    </div>
                        </div>
                    </div>

                   
                    <div class="text-left">
                        <a href="<?=EE?>Logins/seConnecter" class="">je suis déjà inscrit</a>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="btnInscription" id="signup"  class="form-submit"
                            value="Terminer"/>
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
                <!-- <div id="phone_error" class="error hidden"> Please enter a valid phone number </div> -->
            </div>
        </div>
    </div>
</section>
<script>
e = true;
$('#icone').addClass("fa fa-eye-slash");
$('#icone2').addClass("fa fa-eye-slash");

function eye() {
    if (e) {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("password2").setAttribute("type", "text");
        $('#icone').addClass("fa fa-eye");
        $('#icone2').addClass("fa fa-eye");
        e = false;
    } else {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("password2").setAttribute("type", "password");
        $('#icone').removeClass("fa fa-eye");
        $('#icone2').removeClass("fa fa-eye");
        $('#icone').addClass("fa fa-eye-slash");
        $('#icone2').addClass("fa fa-eye-slash");
        e = true;
    }
}
</script>
