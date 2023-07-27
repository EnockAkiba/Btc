<?php 
require_once "views/loyouts/headerUser.php";
?>
<div class="row mx-2">
    <div class="col-md-9 col-sm-12 p-0">
        <div class="container-fluid  p-0">
            <div class="overflowMessage p-0">
                <div class="commenter-content m-2 row">
                    <div class="col-md-11 mx-auto col-sm-6  p-0">
                        <div class="btcAll1 shadow-lg my-2 p-2 ">
                            <h4 id="titrePub"><?=$actualite->titrePub?></h4>
                        </div>
                        <div class="shadow-lg mx-auto ">
                        <?php   if(($actualite->fichierPub != null) && ($actualite->photoPub != null)) {?>

                        <div class="headvideo overflow-hidden ">
                            <video src='<?=EE?>app/public/videos/actualites/<?=$actualite->fichierPub?>'
                                class='video h-100' preload='none' controls
                                poster='<?=EE?>app/public/photos/publication/<?=$actualite->photoPub?>'>changer votre
                                navigateur</video>
                        </div>
                        <?php    }elseif ($actualite->fichierPub != null) {?>
                        <div class="headImgAc">
                            <video src='<?=EE?>app/public/videos/actualites/<?=$actualite->fichierPub?>'
                                preload='none' controls style="height:300px"> changer votre navigateur </video>
                        </div>

                        <?php }elseif ($actualite->photoPub != null) {?>
                        <div class="headImgAc">
                            <img src="<?=EE?>app/public/photos/publication/<?=$actualite->photoPub?>" id="photoPub"
                                class="img-fluid w-100 imgAc">
                        </div>

                        <?php }?>
                        <div class=" col-md-12 col-sm-12 shadow-sm rounded px-5 pt-3 d-flex flex-column contenPub">
                            <a href="<?=EE."Messages/getIdDestinateurs/".$this->vicha($actualite->idUser)?>"
                                class='lien'>
                                <div class="header d-flex align-items-end ">
                                    <div class=" d-flex w-100">
                                        <img src="<?=EE?>app/public/photos/profil/<?=$actualite->photoUser?>"
                                            class="img-fluid rounded-circle headerImg" style="margin-left:20px">
                                        <div class="d-flex flex-column w-100 justify-content-between">
                                            <h6 class='mx-2'> <?=$actualite->nomsUser?></h6>
                                            <h6 class='datePub text-right'>le <?=$actualite->datePub?></h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <p class="text-muted justify mt-3">
                                <?=$actualite->contenPub?>
                            </p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-11 mx-auto col-sm-6  p-0 mt-3 commenter shadow-lg">
                    <?php 
                foreach($commentaires as $data){ ?>
                    <div class="d-flex flex-column content  mx-2  mb-3 p-2 rounded  border-bottom">
                        <a href="<?=EE."Messages/getIdDestinateurs/".$this->vicha($actualite->idUser)?>" class='lien'>
                            <div class="headerCommenter d-flex align-items-center">
                                <div class="headerImg">
                                    <img src="<?=EE?>app/public/photos/profil/<?=$data->photoUser?>"
                                        class="img-fluid rounded-circle w-100 h-100 mx-2">
                                </div>
                                <h6 class='w-100  mx-4'> <?= $data->nomUser?></h6>
                            </div>
                        </a>
                        <p class="text-muted justify" id='contentCom'><?=$data->contenuCom?></p>
                        <?php if($data->fichierCom!==null){
                            ?>
                        <img src="<?=EE?>app/public/photos/commentaire/<?=$data->fichierCom?>"
                            class="img-fluid imgCommenter" alt="...">
                        <?php
                        }?>
                        <span class='datePub'> <?=$data->dateCom?></span>
                    </div>
                    <?php } ?>
                </div>
                <hr>

            </div>
            <form action="" method="post" id="FormCommenter" class='d-flex'>
                <input type="hidden" name="idPub" id="idPub" value='<?= $actualite->idPub?>'>
                <div class="d-flex mb-1 containerCom justify-content-center align-items-start">
                    <textarea id="contenuCom" name="contenuCom"
                        placeholder="Laisser votre Commentaire ici ..."></textarea>
                    <!-- <img src="" class="img-fluid headerImg shadow-sm mx-3" alt="" id='file-preview'> -->
                    <button type="submit" class="btn"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
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

<!-- script navigation -->
<script src="<?=EE?>app/plugins/js/customNav.js"></script>
<script>
$('#file-preview').addClass("d-none");

function showFile(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        var output = document.getElementById("file-preview");
        $('#file-preview').addClass("d-inline-block");
        output.src = dataURL;
    }
    reader.readAsDataURL(input.files[0]);
}
// 

document.getElementById("FormCommenter").addEventListener("submit", function(e) {

    e.preventDefault();
    var contenuCom = $('#contenuCom').val();
    var idPub = $('#idPub').val();
    var data = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(data) {
        if (this.readyState == 4 && this.status == 200) {
            const msg = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            })
            msg.fire({
                type: 'success',
                title: 'Commentaire envoyé'
            });
        }
        $('#contenuCom').val("");
        $('#file-preview').addClass("d-none");
        $('#fichierCom').val('');
        // location.reload();

    };

    xhr.open("post", "<?=EE?>Actualites/commenter/" + vicha(idPub), );
    xhr.responseType = "json";

    xhr.send(data);

});

// getdernier
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
                        value.idUser +
                        "' class='text-decoration-none text-muted'><div class='headerConversation'>";
                    getdernier = getdernier +
                        " <img src='<?=EE?>app/public/photos/profil/" + value
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
</script>