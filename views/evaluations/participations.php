<?php 
require_once "views/loyouts/headerUser.php";
 ?>
<div class="row">
    <div class="col-md-9 col-sm-12 overflow">
        <div class="container-md">
            <div class="row mb-2 justify-content-between align-items-center ">
                <div class="col-md-7 col-sm-6">
                    <h3 class="d-flex">
                        <?php if($_SESSION['photoUser']==null){?>
                        <a href="<?=EE?>Inscriptions/getProfil" class='lien'><i class='fa fa-image'></i> Ajouter une
                            photo de profil</a>
                    </h3>
                    <?php }?>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 answer  d-flex flex-column g-1">
                        <div class="">
                            <h5 class=" shadow-lg p-2"><?=$evaluation->contenuEval?></h5>
                            <div class="shadow-lg p-2 mt-2">
                                <h5 class="card-title"><?=@$evaluation->promotion?></h5>
                                <p>Promotion : ANGLAIS</p>
                                <h6>Envoyée le <?php
                                         $date=date_create($evaluation->dateDebutEval);
                                         echo date_format($date, "d/m/Y H:i s");
                                         ?></h6>
                                <h6 class='mb-2'>Date limite le <?php
                                         $date=date_create($evaluation->dateFinEval);
                                         echo date_format($date, "d/m/Y H:i s");
                                         ?></h6>
                                <span type="button" class="btn remetre border" data-toggle="modal"
                                    data-target="#modelId">
                                    <i class="fa fa-file"></i> ouvrir le fichier
                                </span>
                            </div>
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" style="height:90vh;" role="document">
                                    <div class="modal-content h-100">
                                        <iframe
                                            src="<?=EE?>app/public/documents/evaluation/<?=$evaluation->fichierEval?>"
                                            height="100%"></iframe>
                                        <div class="modal-footer">
                                            <button type="button" class="btn remetre border"
                                                data-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-6">
                            <h5 class=" shadow-lg p-2">Apprenant qui ont remis</h5>
                            <div class=" shadow-lg p-2 mt-2">
                                <?php
                                // if($participations==null){
                                    ?>
                                <p class="text-muted"> Aucun Apprenant n'a remis</p>
                                <?php
                                // }else {
                                    ?>
                                <div class="table-responsive">
                                    
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <?php
                                    foreach($participations as $value){
                                        ?>
                                       
                                                <th scope="row"><img src="<?=EE?>app/public/photos/profil/<?=$value->photoUser?>" class="img-fluid headerImg" alt="..."> </th>
                                                <td><?= $value->nomsUser ?></td>
                                                <td>
                                                <?php
                                                //  if(strlen($value->contenuPart)>10){
                                                    ?>
                                                    <!-- <span type="button" class="btn remetre border" data-toggle="modal"
                                                        data-target="#modelId1">
                                                        <i class="fa fa-file"></i> ouvrir le contenu
                                                    </span>-->

                                                    <!-- Modal -->
                                                  <!--   <div class="modal fade" id="modelId1" tabindex="-1" role="dialog"
                                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                   contenu
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <?php 
                                                // }else{
                                                    ?>
                                                </td>
                                                <td><?=!empty($value->contenuPart)?substr($value->contenuPart,0,0).'':'Aucun contenu' ?></td>
                                                <?php 
                                            // }
                                            ?>
                                                <td><a href="<?=EE?>app/public/documents/participer/<?= $value->fichierPart?>"
                                                        class="btn remetre border">
                                                        <i class="fa fa-eye"></i> voir la reponse</a>
                                                </td>
                                                <td>
                                                <span class='small'><?=$value->datePart ?></span>
                                                </td>
                                            </tr>
                                    <?php
                                    }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php
                                // }
                                ?>


                            </div>
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
</script>


<td><img src="<?=EE?>app/public/photos/profil/<?=$value->photoUser?>" class="img-fluid headerImg" alt="...">
                                                </td>
                                                <td><?= $value->nomsUser ?></td>
                                                <td class="contenuPart">
                                                    <?php if(strlen($value->contenuPart)>10){?>
                                                    <span type="button" class="btn remetre border" data-toggle="modal"
                                                        data-target="#modelId1">
                                                        <i class="fa fa-file"></i> ouvrir le contenu
                                                    </span>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modelId1" tabindex="-1" role="dialog"
                                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <?= $value->contenuPart?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="button"
                                                                        class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                </td>

                                                <td><?=!empty($value->contenuPart)?substr($value->contenuPart,0,20).'...':'Aucun contenu' ?></td>
                            
                                                <td><a href="<?=EE?>app/public/documents/participer/<?= $value->fichierPart?>"
                                                        class="btn remetre border">
                                                        <i class="fa fa-file"></i> ouvrir la reponse</a>
                                                </td>
                                                <td> <span class='small'><?=$value->datePart ?></span></td>