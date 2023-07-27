<link rel="stylesheet" href="<?=EE?>app/plugins/css/dropdown.css">
<script>
        function getMention(idPub){
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "<?=EE?>Actualites/getMention/" + vicha(idPub),
            success: function(response) {
                console.log(response);
            }
        });
    }

</script>
<?php 
require_once "views/loyouts/headerUser.php";
// var_dump($actualites);
if((isset($_SESSION['idForm']) and empty($_SESSION['idProm'])) or (isset($_SESSION['idIns']))){
?>
<div class="container">

    <!-- modale actualite recherhe -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Rechercher une Actualité</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex">
                    <input type="search" name="critere" id="critere" class='form-control mx-2'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="recherche()"><i
                            class='fa fa-search'></i></button>
                </div>
            </div>
        </div>
    </div>
    <!--  start main row -->
    <div class="row overflow ">
        <div class="col-md-12 col-sm-12">
            <div class="container ">
                <div class="row mb-2 justify-content-between align-items-center ">
                    <div class="col-md-12 col-sm-12 d-flex">
                        <h3 class="d-flex justify-content-between w-100 ">
                            <a href="<?=EE?>actualites/index" class="lien mx-1">BTC NEWS</a>
                            <?php if($_SESSION['photoUser']==null){?>
                            <a href="<?=EE?>Inscriptions/getProfil" class='lien'><i class='fa fa-image'></i> Ajouter une
                                photo de profil</a>
                            <?php }?>
                        </h3>
                        <!-- <li><a href="" type="button" data-toggle="modal" data-target="#modelId"><i class='fa fa-search w-icone'></i> </a> -->
                        </li>
                    </div>
                </div>
            </div>
            <div class="row " id="actualite">
                <?php 
                // var_dump($actualites);
                foreach($actualites as $value){
                    ?>
                <div class='col-md-4 col-sm-6 mb-2  px-1'>
                    <div class="shadow-lg news">
                        <div class="d-flex flex-column dropup w-100">
                            <h6 class='mx-2 d-flex justify-content-between w-100 p-2'> <span> <?=$value->nomsUser?>
                                </span><?php if($_SESSION['roleUser']==='admin'){?> <i
                                    class='fa fa-ellipsis-vertical mx-3 dropbtn'></i>
                                    <?php }?>
                            </h6>
                            <?php if($_SESSION['roleUser']==='admin'){?>
                            <div class='dropup-content'>
                                <a href="<?=EE?>Actualites/setActualite/<?= $this->vicha($value->idPub)?>"> Modifier</a>
                                <a href="<?=EE?>Actualites/setIsPrivate/<?= $this->vicha($value->idPub)?>">Rendre
                                    public</a>
                                <a href="<?=EE?>Actualites/delete/<?= $this->vicha($value->idPub)?>"> Supprimer</a>
                            </div>
                            <?php } ?>
                            <p class='datePub text-muted mx-2 text-right'>Publier:<?=$value->datePub?> </p>
                        </div>
                            <!-- <div class='headImg'> -->

                                <?php if(($value->fichierPub == null) && ($value->photoPub == null)){?>
                                    <div class='headImg'>
                                    <h5 class='text-color ml-3'><?=$value->titrePub?></h5>
                                 <a href='<?=EE?>Actualites/getActualite/<?= $this->vicha($value->idPub)?>'
                                    class='text-decoration-none'>
                                    <p class='text-dark' id='contenPub'> <?=substr($value->contenPub,0,465)?><span
                                            class='lien my-2'>... voir plus</span>
                                    </p>
                                </a> 
                                </div>
                                <?php  }else{?>
                            <div class='headImg'>
                                <h5 class='text-color ml-3'><?=$value->titrePub?></h5>
                               <a href='<?=EE?>Actualites/getActualite/<?= $this->vicha($value->idPub)?>'
                                    class='text-decoration-none'>
                                    <p class='text-dark' id='contenPub'><?=substr($value->contenPub,0,80)?><span
                                            class='lien'>... voir plus</span></p>
                                </a>
                                </div>
                                <?php }
                                    if(($value->fichierPub != null) && ($value->photoPub != null)) {?>
                            <div class='headImg'>
                            <h5 class='text-color ml-3'><?=$value->titrePub?></h5>
                                <video src='<?=EE?>app/public/videos/actualites/<?=$value->fichierPub?>' class='video'
                                    preload='none' controls
                                    poster='<?=EE?>app/public/photos/publication/<?=$value->photoPub?>'>changer votre
                                    navigateur</video> 
                                    </div>
                                <?php }else if ($value->fichierPub != null) {?>
                            <div class='headImg'>
                                 <video src='<?=EE?>app/public/videos/actualites/<?=$value->fichierPub?>' class='video' preload='none' controls> changer votre navigateur </video>
                                 </div>
                                <?php  }else if ($value->photoPub != null) {?>
                            <div class='headImg'>
                             <img src='<?=EE?>app/public/photos/publication/<?=$value->photoPub?>' class='img-fluid' alt='..'/>
                             </div>    
                             <?php }?>
                            <div class='d-flex justify-content-center btn-commenter my-2'><a href='<?=EE?>Actualites/getActualite/<?= $this->vicha($value->idPub)?>'
                                class='text-decoration-none w-50 liker text-center mx-1'><span id='value.commentaires'>
                                    <?=$value->commentaires?> <i class='fa fa-comment'></i></a></span><span
                                class='w-50 liker text-center mx-1'>
                                <form class='mx-2' id='formLike' onclick='aimer(<?=$value->idPub?>)'><i class='fa fa-thumbs-up <?=($this->getMention($value->idPub))?'aimer':'' ?>' id='<?=$value->idPub?>' type='button'
                                        >  <?=$value->aime?></i> 
                                  
                            </span></form>
                            
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }else{?>
    
        <div class="container overflow">
            <div class="row justify-content-center mt-4">

                <div class="col-md-8 col-sm-12  text-left">
                    <h2>Brotherly Training Center/<span class='w-icone'>BTC</span> </h2>
                    <div class=" justify">
                        <p> Bienvenue sur le site de Btc, vous avez déjà un compte utilisateur mais qui est incompet,
                            veuillez
                            vous diriger à notre bureau pour completer votre compte<br>
                        <p>Nous sommes aux quatre coins de la ville de goma</p>
                        <i class='fa fa-location-pin'></i> Adresse de BTC </p>
                        <table class="table m-3">
                            <tbody>
                                <tr>
                                    <td scope="row">RDC</td>
                                </tr>
                                <tr>
                                    <td scope="row"> * GOMA</td>
                                </tr>
                                <tr>
                                    <td scope="row">- AFIA BORA</td>
                                </tr>
                                <tr>
                                    <td>- MUGUNGA</td>
                                </tr>
                                <tr>
                                    <td>- KATOYI</td>
                                </tr>

                            </tbody>
                        </table>
                        <a href=""
                            class='rounded-pill border shadow-lg p-3 text-decoration-none text-dark  my-3 d-inline-block'><i
                                class='fa fa-phone'></i> +243 973 111 973 <br>Contacter-nous</a>
                        <p>THE BROTHERLY TRAINING CENTER BTC met en disposition une bibliotheque gratuite juste pour
                            vous !</p>
                        <span> Teaching is touching souls forever</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php }?>
    </section>

    </main>
    <!-- link javascript  -->
    <script src="<?=EE?>app/plugins/js/customNav.js"></script>
    <?php
if((isset($_SESSION['idForm']) and empty($_SESSION['idProm'])) or (isset($_SESSION['idIns']))){
?>
    <script>
   
    // aimer une actualite
    function aimer(idPub) {
        let value='';
        value= parseInt($("#"+idPub+"").html());
        console.log(value);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?=EE?>Actualites/aimer/" + idPub,
            success: function(response) {
                // getMention(idPub);
                if(response==="Vrai"){
                    $("#"+idPub+"").addClass("aimer");
                    $("#"+idPub+"").html(value=value + 1);
                }else{
                    $("#"+idPub+"").removeClass("aimer");
                    
                    $("#"+idPub+"").html(value=value - 1);
                }
            }
        })
    }
    

    function deletePub(idPub) {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "<?=EE?>Actualites/delete/" + vicha(idPub),
            success: function(response) {}
        });
    }
      

    </script>

    <?php } ?>