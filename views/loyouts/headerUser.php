<!-- link de template user -->
<link rel="stylesheet" href="<?=EE?>app/plugins/css/customUser.css?t=<?=time()?>">
<?php  const icone=EE."app/public/photos/img/icones/"?>
<main>
    <div class="head">
        <header id="headerUser">
            <i id="menu-close" class="fas fa-times text-dark"></i>
            <nav class="navbar">
                <a class="navbar-brand mx-3" href="<?=EE?>Actualites"><span class="text-success"> <img
                            src="<?=EE?>app/public/photos/img/logo.png" class="logo" alt="...">
                    </span>BTC</a>
                <div class="navigation w-100 d-flex">
                    <ul class="nav">
                        <?php 
                            if($_SESSION['roleUser']==='admin' or $_SESSION['idForm'] !=NULL OR  $_SESSION['idIns']!=NULL){
                                // ici on met les truc en commun ?>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Actualites" class="lien"><i
                                    class='fa fa-clone'></i> Actualites</a></li>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Messages" class="lien"> <i
                                    class="fa fa-message"></i> Nouveau Message</a></li>

                        <?php }
                         if($_SESSION['idForm']){?>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Actualites/publier" class="lien"> <i
                                    class="fa-solid fa-circle-plus"></i> Ajouter Actualité</a>
                        </li>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Evaluations/AddEvaluation" class="lien"> <i
                                    class="fa-solid fa-circle-plus"></i> Ajouter Evaluation</a>
                        </li>


                        <?php
                                 }

                                // On affiche le message qui demande de s'inscrire

                            if($_SESSION['roleUser']==='admin'){?>

                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Administrations/addOther" class="lien"><i
                                    class="fa-solid fa-layer-group"></i> Affectation</a></li>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Administrations/gestionUser" class="lien"> <i
                                    class="fa-solid fa-circle-user"></i> Gestion Utilisateurs</a></li>

                        <?php  }if($_SESSION['roleUser']==='admin' or $_SESSION['roleUser']==='appariteur'){?>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Administrations/index" class="lien"><i
                                    class="fa fa-gears"></i> Inscription</a>
                        </li>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Administrations/nodone" class="lien"><i class='fa fa-users'></i> non achevé</a>
                        </li>
                        
                        <?php  }
                            
                            if($_SESSION['idIns']!=NULL){?>
                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Evaluations/index" class="lien"><i
                                    class="fa-solid fa-box-archive"></i> Evalution</a>

                            <?php }?>

                        <li class="mx-2 d-inline-block"><a href="<?=EE?>Bibliotheques/index" class="lien"><i
                                    class="fa fa-book"></i> Bibliotheque</a></li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    <section id="main">

        <div class="barUser row">
            <!-- revoir le style -->
            <div class="col-md-11 col-sm-12 d-flex justify-content-end justify-content-evenly">
                <li class='nav-item'><span><i class="fas fa-bars w-icone" id="menu-btn"></i>
                </span>
                </li>
                <?php
                    if(($_SESSION['roleUser']==='admin' OR $_SESSION['idForm']!=null OR $_SESSION['idIns']!= NULL)){
                ?>
                <li class='nav-item'><a href="<?=EE?>Actualites">
                        <i class='fa fa-home w-icone'></i>
                        <span class='d-none d-md-inline-block'>Actualite</span> </a>
                </li>
                <li class='nav-item position-relative'><a href="<?=EE?>Messages">
                        <span class="position-absolute  bottom-0 start-50 translate-middle badge rounded-pill"
                            id='countMessage'>
                        </span>
                        <i class='fa fa-message w-icone'></i>
                        <span class='d-none d-md-inline-block'>Message</span>
                    </a>
                </li>

                <?php
                if($_SESSION['idIns']!=NULL){
                    ?>
                <li class='nav-item'><a href="<?=EE?>Evaluations/index"><i class='fa fa-book w-icone'></i>
                        <span class='d-none d-md-inline-block'>Cours</span> </a>
                </li>
                <?php
                }
             }else{
                ?>
                <h4>BTC LIBRARY</h4>
                <?php
             }
             ?>

                <li class='navbar  nav-item dropdown drop '>
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    </a>
                    <img src="<?=EE?>app/public/photos/profil/<?=$_SESSION['photoUser']?>"
                        class="img-fluid rounded-circle headerImg">
                    <div class="dropdown-menu  shadow-lg" style='top:0' aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="<?=EE?>Inscriptions/getProfil">Mon profil</a>
                        <a class="dropdown-item" href="<?=EE?>Logins/seDeconnecter">Deconnexion</a>
                    </div>
                </li>
            </div>
        </div>

        <script>
        $('#countMessage').addClass("d-none");

        setInterval(() => {
            checkNewMessage();
        }, 4000);

        function checkNewMessage() {
            $.ajax({
                type: "get",
                url: "<?=EE?>Messages/checkNewMessage",
                dataType: "json",
                success: function(response) {
                    $.each(response, function(key, value) {
                        $('#countMessage').html(value.messages + "+");
                        if (value.messages >= 1) {
                            $('#countMessage').removeClass("d-none");
                        } else {
                            $('#countMessage').addClass("d-none");
                        }
                    });
                }
            });
        }
        </script>

        <style>
        .badge {
            background: red;
            
        }
        </style>