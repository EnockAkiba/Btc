<?php 
require_once "views/loyouts/headerUser.php";
 ?>
<input type="hidden" id='idEval' value='<?=$evaluation->idEval?>'>
<div class="row">
    <div class="col-md-9 col-sm-12 overflow">
        <div class="container-md">
            <div class="row mb-2 justify-content-between align-items-center ">
                <div class="col-md-7 col-sm-6">
                    <h3 class="d-flex">
                        <a href="<?=EE?>Evaluations/index" class="lien">MES DEVOIRS</a>
                        <?php if($_SESSION['photoUser']==null){?>
                        <a href="<?=EE?>Inscriptions/getProfil" class='lien'><i class='fa fa-image'></i> Ajouter une
                            photo de profil</a>
                    </h3>
                    <?php }?>
                </div>
                <div class="col-md-4 col-sm-6 d-flex flex-md-row flex-sm-column justify-content-between">
                    <p class="text-muted"></p>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-sm-6 tp d-flex flex-column mx-1 ">
                        <div class="shadow-lg">
                            <div class="card-header  headProf">
                                <h4><?= $evaluation->contenuEval?></h4>
                                <span> <?= $evaluation->nomsUser?> </span>
                                <img src="<?=EE?>app/public/photos/formateur/<?=$evaluation->photoForm?>" alt="../"
                                    class='imgProf'>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="<?=EE?>Messages/getIdDestinateurs/<?$evaluation->idUser?>" class='lien'>
                                    </a> </h5>
                                <p class="card-text w-100 justify">
                                    Date debut : <?=$evaluation->dateDebutEval ?>
                                </p>
                                <p class="card-text w-100 justify">
                                    Date limite : <?= $evaluation->dateFinEval?>
                                </p>
                                <span class='w-100 justify'>
                                    une fois la date limite dépasssée, le tp est consideré comme non
                                    remis
                                </span>
                                <p>
                                    <a href="<?=EE?>app/public/documents/evaluation/<?= $evaluation->fichierEval?>"
                                        class='lien btn remis shadow-sm border'><i class='fa fa-file'></i>
                                        Ouvrir le fichier</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 answer  d-flex flex-column g-1">
                        <form action="" method='post' class="form" id="formEvaluation" enctype="multipart/form-data">
                            <div class="border-0">
                                <h5 class="shadow-lg p-2 mb-2">Remettre l'evaluation</h5>
                                <div class="card-body h-100 m shadow-lg">
                                    <textarea id="contenuPart" name="contenuPart" rows="5" class="form-control"
                                        placeholder='Rediger votre reponse'></textarea>
                                    <div class="d-flex w-100 justify-content-between px-3 m-2 flex-wrap" id='footer'>
                                        <div class="d-flex flex-column mb-2">
                                            <label for="fichierPart"><i class='fa fa-file-pdf'></i> Joindre un Fichier
                                            </label>
                                            <input type="file" class='inputFile w-100' name='fichierPart'
                                                id='fichierPart'>
                                        </div>
                                        <div class="form-group d-flex align-items-end">
                                            <button type="submit" name="" id="Remettre" class="btn d-flex border"> <i
                                                    class="fa-solid fa-paper-plane mx-1"></i> Remettre</button>
                                        </div>
                                    </div>

                                    <?= $mgs ?>
                                    <span class='text-center'>Vous pouvez rediger l'evaluation ou envoyer un un
                                        fichier</span>
                                </div>
                            </div>
                        </form>
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