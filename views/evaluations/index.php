<?php 
require_once "views/loyouts/headerUser.php";
// $onLine=$this->Evaluation->OnLine();
// var_dump($evaluationRemis);
 ?>
<div class="row">
    <div class="col-md-9 col-sm-12 overflow">
        <div class="container-md">
            <div class="row mb-2 justify-content-between align-items-center ">
                <div class="col-md-7 col-sm-6">
                    <h3 class="d-flex">
                        <a href="<?=EE?>Evaluations/index" class="lien">MES DEVOIRS</a>
                        <?php if($_SESSION['photoUser']==null){?>
                        <a href="<?=EE?>Inscriptions/getProfil" class='lien'><i class='fa fa-image'></i> Ajouter une photo de profil</a>
                    </h3>
                    <?php }?>
                </div>
                <div class="col-md-4 col-sm-6 d-flex flex-md-row flex-sm-column justify-content-between">
                    <p class="text-muted"></p>
                </div>
            </div>
            <div class="">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Attribué</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Manquant</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                            type="button" role="tab" aria-controls="messages" aria-selected="false">Terminé</button>
                    </li>
                </ul>

                <!-- Tab panes  home-->
                <div class="tab-content mt-1">
                    <div class="tab-pane active " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container ">
                            <?php if(!empty($evaluationEncours)) {?>
                            <div class="row ">
                            
                                <?php 
                                foreach($evaluationEncours as $data) {
                                    $statut=$this->getStatut($this->vicha($data->idEval) );
                                     ?>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <div class="shadow-lg">
                                        <form action="<?=EE."Evaluations/participer/".$this->vicha($data->idEval) ?>" method='post'>
                                            <div class="card-header  headProf">
                                                <h4><?= $data->contenuEval?></h4>
                                                <span><?= $data->nomsUser?> </span>
                                                <img src="<?=EE?>app/public/photos/formateur/<?=$data->photoForm?>"
                                                            alt="" class='imgProf'>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><a
                                                        href="<?=EE?>Messages/getIdDestinateurs/<?=$this->vicha($data->idUser)?>"
                                                        class='lien'></a> </h5>
                                            <p class="card-text w-100 justify text-danger">
                                                    Date debut : <?php
                                                        $date=date_create($data->dateDebutEval);
                                                      echo  $dateConver=date_format($date, "d/m/Y H:i s");
                                                         ?>
                                                </p>
                                            <p class="card-text w-100 justify text-danger">
                                                    Date limite : <?php
                                                        $date=date_create($data->dateFinEval);
                                                        echo $dateCon=date_format($date, "d/m/Y H:i s");
                                                         ?>
                                                </p>
                                                <span class='w-100 justify'>
                                                    une fois la date limite dépasssée, le tp est considere comme non
                                                    remis
                                                </span>
                                                <div class="w-100">
                                                    <?php
                                                     if(!$statut){?>
                                                    <button type="submit" class="btn remetre mx-auto shadow-sm"><i
                                                            class='fa fa-book-open-reader'></i>
                                                        Lire pour remettre</button>
                                                    <?php }else{ ?>
                                                    <div class="mt-3 w-100 text-right remis">
                                                        <span class='border shadow-sm'> <i
                                                                class='fa fa-thumbs-up'></i>Remis</span>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>

                            <?php }else{
                                ?>
                            <div class="col-md-10-col-col-sm-12 empty justify">
                                <img src="<?=EE?>app/public/photos/img/Radar.gif" style='width: 80px;height: 80px;'>
                                <!-- <img src="<?=EE?>app/public/photos/img/logo.png" alt=""> -->
                                <h5 class="mt-2 justify">
                                    Votre liste de taches est vide pour le moment
                                </h5>
                                <p class="text-muted text-center">
                                    Revenez plus tard pour découvrir les nouveaux devoirs
                                </p>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Tab panes  home-->

                    <!-- fin section  de tout le tp -->

                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="container ">
                            <?php if(!empty($evaluationRater)) {?>
                                <div class="row ">
                                    <?php 
                                foreach($evaluationRater as $data) {
                                     ?>
                                    <div class="col-md-4 col-sm-6 mb-2">
                                    <div class="shadow-lg">
                                            <div class="card-header  headProf">
                                                <h4><?= $data->contenuEval ?> </h4>
                                                <span><?= $data->nomsUser?> </span>
                                                <img src="<?=EE?>app/public/photos/formateur/<?=$data->photoForm?>"
                                                            alt="" class='imgProf'>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><a
                                                        href="<?=EE?>Messages/getIdDestinateurs/<?$data->idUser?>"
                                                        class='lien'>
                                                       </a> </h5>
                                            <p class="card-text w-100 justify text-danger">

                                                    Date debut : <?php
                                                        $date=date_create($data->dateDebutEval);
                                                      echo  $dateConver=date_format($date, "d/m/Y H:i s");
                                                         ?>
                                                </p>
                                            <p class="card-text w-100 justify text-danger">
                                                    Date limite : <?php
                                                        $date=date_create($data->dateFinEval);
                                                        echo $dateCon=date_format($date, "d/m/Y H:i s");
                                                         ?>
                                                </p>
                                                <span class='w-100 justify'>
                                                    une fois la date limite dépasssée, le tp est considere comme non
                                                    remis
                                                </span>
                                                <div class="mt-3 w-100 ">
                                                    <div class="w-100 text-right remis">
                                                        <span class='border shadow-sm'> <i
                                                                class='fa fa-thumbs-down'></i> Manqué</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php }else{
                                ?>
                            <div class="col-md-10-col-col-sm-12 empty justify">
                                <img src="<?=EE?>app/public/photos/img/logo.png" alt="">
                                <h5 class="mt-2 justify">
                                    Félicitations vous n'avez pas encore manqué aucun tp 
                                </h5>
                                <p class="text-muted text-center">
                                Courage
                                </p>
                            </div>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                        <div class="row ">
                            <?php 
                            foreach($evaluationRemis as $data) {
                                     ?>
                                <div class="col-md-4 col-sm-6 mb-2">
                                    <div class="shadow-lg">
                                    <form action="<?=EE."Evaluations/participer/".$data->idEval ?>" method='post'>
                                        <div class="card-header  headProf">
                                            <h4><?= $data->contenuEval?></h4>
                                            <span><?= $data->nomsUser?> </span>
                                            <img src="<?=EE?>app/public/photos/formateur/<?=$data->photoForm?>"
                                                            alt="" class='imgProf'>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><a
                                                    href="<?=EE?>Messages/getIdDestinateurs/<?=$data->idUser?>"
                                                    class='lien'></a> </h5>
                                            <p class="card-text w-100 justify text-danger">
                                                Date debut : <?php
                                                        $date=date_create($data->dateDebutEval);
                                                      echo  $dateConver=date_format($date, "d/m/Y H:i s");
                                                         ?>
                                            </p>
                                            <p class="card-text w-100 justify text-danger">
                                                Date limite : <?php
                                                        $date=date_create($data->dateFinEval);
                                                        echo $dateCon=date_format($date, "d/m/Y H:i s");
                                                         ?>
                                            </p>
                                            <span class='w-100 justify'>
                                                une fois la date limite dépasssée, le tp est considere comme non
                                                remis
                                            </span>
                                            <div class="mt-3 w-100 ">
                                                <div class="w-100 text-right remis">
                                                    <span class='border shadow-sm'> <i
                                                            class='fa fa-thumbs-up'></i>Terminé</span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <?php } ?>
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