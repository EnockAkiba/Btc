<?php 
require_once "views/loyouts/headerUser.php";
 ?>

    <!-- modale actualite recherhe -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title">Rechercher un interlocuteur</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body d-flex">
                        <input type="search" name="critere" id="critere" class='form-control mx-2'>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="recherche()"><i class='fa fa-search'></i></button>
                    </div>
                </div>
            </div>
        </div>
<!--  start main row -->

<div class="row mx-2">    
    <div class="col-md-9 col-sm-12">
        <div class="container-md">
        <div class="row mb-2 justify-content-between align-items-center ">
                <div class="col-md-12 col-lg-12 col-sm-12 d-flex justify-content-between ">
                <div class="d-flex justify-content-between p-0  w-100 mx-auto">
                    <div class="d-flex align-items-center overOline pr-2  mr-2" id='overOline'>

                    </div>
                    <li><a href="" class='btn form-submit' type="button" data-toggle="modal" data-target="#modelId"><i class='fa fa-search w-icone'></i></a>
                    </li>
                </div>
                </div>
            <div class="overflowMessage border-top  mt-2">
                <div class="row flex-column " id="resultat">
                    <?php 
                     foreach ($destinataire as $data): 
                      if($data->idUser != $_SESSION['idUser']){
                      ?>
                    <a href='<?=EE?>Messages/getIdDestinateurs/<?=$this->vicha($data->idUser)?>' class='w-100 d-flex lien'>
                        <div class='conversation d-flex border-bottom'>
                            <div class='headerConversation w-100'>
                                <div class="">
                                <img src='<?=EE?>app/public/photos/profil/<?=$data->photoUser?>'
                                    class='img-fluid rounded-circle'>
                                </div>
                                <h6><?=$data->nomsUser?></h6>
                            </div>
                    </div>
                    </a>
                <?php }
                   endforeach ?>
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
// recherher un utilisateur a envoyer un message



function recherche() {
    var critere = $("#critere").val();
    $.ajax({
        type: "post",

        dataType: "json",
        data: {
            critere: critere
        },
        url: 'Messages/rechercherUser',
        success: function(response) {
            if (critere != "") {
                var resultat = "";
                $.each(response, function(key, value) {
                   

                    resultat = resultat + "<a href='<?=EE?>Messages/getIdDestinateurs/" + vicha(value
                        .idUser) + "' class='w-100 d-flex lien'>";
                    resultat = resultat + "<div class='conversation d-flex'>";
                    resultat = resultat + "<div class='headerConversation w-100'>";
                    resultat = resultat + "<img src='<?=EE?>app/public/photos/profil/" + value
                        .photoUser + "' class='img-fluid rounded-circle'>";
                    resultat = resultat + "<h6 class='border-bottom'>" + value.nomsUser + "</h6>";
                    resultat = resultat + "</div> </a> </div> ";
                    $('#resultat').html(resultat);
                });
                $("#critere").val("");
            } else {
                $('#resultat').html("<div style='color:red'>aucun resultat</div>");
            }
        },
        error: function(error) {
            console.log(error)
        }
    })
}
// getdernier
function getdernier() {
    $.ajax({
        type: "get",
        url: "<?=EE?>Messages/getdernier",
        dataType: "json",
        success: function(response) {
            var getdernier = "";
            if(response==[]){
                $('#getdernier').html("Vous n'avez pas encore envoyer ou reçu un message </br> Veuillez Rechercher un ami ou prof pour débuter la conversation ");
            }else{
            $.each(response, function(key, value) {
                getdernier = getdernier +  " <div class='conversation'><a href='<?=EE?>Messages/getIdDestinateurs/"+ vicha(value
                        .idUser)+"' class='text-decoration-none text-muted'><div class='headerConversation'>";
                getdernier = getdernier +  " <img src='<?=EE?>app/public/photos/profil/"+value.photoUser+"' class='img-fluid rounded-circle'>";
                getdernier = getdernier + " <h6 class='border-bottom'>"+value.nomsUser+"</h6>";
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
function onLine(){
    $.ajax({
        type: "get",
        url: "<?=EE?>Messages/getUserOnline",
        dataType: "json",
        success: function(response) {
            let onLine='';
            $.each(response, function(key, value) {
                onLine=onLine+" <a href='<?=EE?>Messages/getIdDestinateurs/"+ vicha(value.idUser)+"' class='lien imgOnline shadow-sm'>";
                onLine=onLine+"<img src='<?=EE?>app/public/photos/profil/"+value.photoUser+"' class='img-fluid rounded-circle'>";
                onLine=onLine+"</a>";
                $('#overOline').html(onLine);
            });
        },
        error: function(error) {
            console.log(error)
        }
    });
};



onLine();
checkNewMessage();
</script>