<?php 
require_once "views/loyouts/headerUser.php";
 ?>
 </script>
<div class="row">
    <div class="col-md-9 col-sm-12 overflow">
        <div class="container-md">
            <div class="row mb-2 justify-content-between align-items-center ">
                <div class="col-md-7 col-sm-6">
                    <h3 class="d-flex">
                        <?php if($_SESSION['photoUser']==null){?>
                        <a href="<?=EE?>Inscriptions/getProfil" class='lien'><i class='fa fa-image'></i> Ajouter une photo de profil</a>
                    </h3>
                    <?php }?>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12 answer  d-flex flex-column g-1">
                        <?php if(isset($publication) and $publication!=null){?>
                            <form action="<?=EE?>Actualites/modification" method='post' class="form" id="EvaluationMod" enctype="multipart/form-data">
                            <div class=" border-0">
                                <h5 class=" shadow-lg mb-3 p-2">Modifier l'actualité</h5>
                                <div class="shadow-lg h-100 mb-0 p-2">
                                    <!-- <div class="form-group d-flex flex-column">
                                      <label for="">Public ou privée</label>
                                      <select name="porteePub"  class='form-control' id="porteePub">
                                         <option></option>
                                         <option value='private'>privée</option>
                                         <option value='public'>Public</option>
                                      </select>
                                    </div> -->
                                    <input type="hidden" value='<?=$publication->idPub?>' name='idPub'>
                                      <label for="">Tittre d'actualité</label>
                                      <input type="text" class="form-control" name="titrePub" id="titrePub" value="<?=$publication->titrePub?>">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Contenu</label>
                                        <textarea class="form-control" name="contenPub" id="contenPub" rows="3" ><?=$publication->contenPub?></textarea>
                                   </div>
                                    <!-- <div class="form-group d-flex flex-column">
                                      <label for="">Photo</label>
                                      <input type="file" class="form-control" name="photoPub" id="photoPub">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">video</label>
                                      <input type="file" class="form-control" name="fichierPub" id="fichierPub" >
                                    </div> -->

                                                    
                                <div class="d-flex w-100 mt-3 justify-content-left" id='footer'>
                                    <button type="submit" name="btnModif" id="Remettre" class="btn border"><i class='fa fa-pencil'></i> Modifier  </button>
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
                    </div>
                    </div>
                        <?php }else{?>
                        <form action="" method='post' class="form" id="formEvaluation" enctype="multipart/form-data">
                            <div class=" border-0">
                                <h5 class=" shadow-lg mb-3 p-2">Ajouter l'actualité</h5>
                                <div class="shadow-lg h-100 mb-0 p-2">
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Tittre d'actualité</label>
                                      <input type="text" class="form-control" name="titrePub" id="titrePub" placeholder="entrer le tittre d'actualité">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Contenu</label>
                                        <textarea class="form-control" name="contenPub" id="contenPub" rows="3" placeholder="contenu de l'actualité"></textarea>
                                   </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Photo</label>
                                      <input type="file" class="form-control" name="photoPub" id="photoPub" placeholder="entrer la photo d'actualité">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">video</label>
                                      <input type="file" class="form-control" name="fichierPub" id="fichierPub" placeholder="entrer la video d'actualité">
                                    </div>

                                                    
                                <div class="d-flex w-100 mt-3 justify-content-left" id='footer'>
                                    <button type="submit" onclick="load()" name="btnPublier" id="Remettre" class="btn btn-info"><i class='fa fa-paper-plane'></i>   </button>
                                </div>
                                <span id='message'></span>
                                <?php
                    if(isset($this->erreur)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"> 😔 oups!</h4>
                        <p class="mb-0"><?=$this->erreur ?></p>
                    </div>
                    
                    <?php }?>
                                    </div>

                            </div>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-3 right col-sm-6 d-none d-md-block">
        <div class=" chat shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center">
                    <i class="fa fa-users"></i> Users Online
                </h4>
                <?php foreach($this->onLine as $data){?>
                <a href="<?=EE."Messages/getIdDestinateurs/".$this->vicha($data->idUser)?>" class='lien'>
                    <div class="conversation border-bottom">
                        <div class="headerConversation">
                            <img src="<?=EE."app/public/photos/profil/".$data->photoUser?>"
                                class="img-fluid rounded-circle headerImg" srcset="">
                            <h6><?= $data->nomsUser ?></h6>
                        </div>
                </a>
            </div>
            </a>
            <?php } ?>
        </div>
    </div>

    <div class="card chat2  shadow-lg mt-3 ">
        <div class="card-body">
            <h4 class="card-title text-center">
                <i class="fa fa-users"> </i> Mes Interlocuteurs
            </h4>
            <div id="getdernier">
                <!-- there is a function here -->
            </div>
        </div>
    </div>
</div>
</main>
<!-- link javascript  -->

<script src="<?=EE?>app/plugins/js/customNav.js"></script>
<script>
    function getdernier() {
    $.ajax({
        type: "get",
        url: "<?=EE?>Messages/getdernier",
        dataType: "json",
        success: function(response) {
            var getdernier = "";
            if (response == []) {
                $('#getdernier').html(
                    "Vous n'avez pas encore envoyer ou reçu un message </br> Veuillez Rechercher un ami ou prof pour débuter la conversation "
                    );
            } else {
                $.each(response, function(key, value) {
                    getdernier = getdernier +
                        " <div class='conversation'><a href='<?=EE?>Messages/getIdDestinateurs/" +
                        vicha(value.idUser) +
                        "' class='text-decoration-none text-muted'><div class='headerConversation'>";
                    getdernier = getdernier + " <img src='<?=EE?>app/public/photos/profil/" + value
                        .photoUser + "' class='img-fluid rounded-circle'>";
                    getdernier = getdernier + " <h6>" + value.nomsUser + "</h6>";
                    getdernier = getdernier + " </div>";
                    getdernier = getdernier + " </div>";
                    $('#getdernier').html(getdernier);
                });
            }
        },
        error: function(error) {
            console.log(error)
        }
    });
}
getdernier();
function load(){
    $.ajax({
        beforeSend:function(){
            $('#message').html("<img src='<?=EE."app/public/photos/img/Spinner-5.gif"?>' class='loader'/>");
            },
        success: function () {
            $('#message').html("")
                const msg = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                msg.fire({
                    type: 'success',
                    title: 'Actualité ajoutée'
                });
        }
    });
    
}
</script>
