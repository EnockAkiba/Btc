<?php 
require_once "views/loyouts/headerUser.php";?>
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
                    <div class="accordion" id="accordionExample">
                      <div class="">
                        <div class="shadow-lg p-2 d-flex justify-content-between" id="headingOne">
                          <h5 class="mb-0">
                            Ajouter une Evaluation
                          </h5>
                          <i class="fa fa-chevron-circle-down" id="icone" onclick="ch()" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"></i>
                        </div>
                    
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="shadow-lg mt-2">
                          <form action="" method='post' class="form" id="formEvaluation" enctype="multipart/form-data">
                            <div class="card shadow-sm border-0">
                                <div class="card-body h-100 mb-0">
                                <div class="form-group d-flex flex-column">
                                      <label for="">Tittre d'evaluation</label>
                                      <input type="text" class="form-control" name="contenuEval" id="contenuEval" placeholder="entrer le tittre d'evaluation">
                                    </div>
                                    <div class="form-group d-flex flex-column mt-3">
                                      <label for="">Departement ou promotion</label>
                                      <select class="form-select" name='idProm'>
                                        <option>Selectionnez une promotion</option>
                                        <?php
                                         foreach ($promotions as $value) { ?>
                                        <option value="<?=$value->idProm?>"><?= $value->designProm?></option>
                                            <?php
                                        }?>
                                      </select>
                                        </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Fichier du contenu</label>
                                      <input type="file" class="form-control" name="fichierEval" id="fichierEval" placeholder="">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Date du debut d'evaluation</label>
                                      <input type="datetime-local" class="form-control" name="dateDebutEval" id="dateDebutEval" placeholder="">
                                    </div>
                                    <div class="form-group d-flex flex-column">
                                      <label for="">Date de fin d'evaluation</label>
                                      <input type="datetime-local" class="form-control" name="dateFinEval" id="dateFinEval" placeholder="">
                                    </div>
                                                    
                                    </div>
                                <div class="d-flex w-100 justify-content-left px-3 m-3" id='footer'>
                                    <button type="submit"  class="btn form-submit"><i class='fa fa-paper-plane'></i>   </button>
                                    <p class="text-muted text-center mx-3">
                                        <?php 
                                         echo $this->erreur
                                         ?>
                                        </p>
                                </div>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class=" mt-3">
                            <h5 class="shadow-lg p-2">evaluations Envoyées</h5>
                            <div class="">
                                <div class="row justify-content-center">
                                    <?php 
                                    if($getEvaluations !=null){
                                     foreach ($getEvaluations as  $value) {
                                    ?>
                                    <div class="col-md-3 col-sm-3 border shadow-lg m-1 survol">
                                        <a href="<?=EE?>Evaluations/getParticipations/<?=$this->vicha($value->idEval)?>" class="btn w-100">
                                        <h5><?=$value->contenuEval ?></h5> <hr>
                                        <p>Promotion : <?= $value->designProm?></p>
                                        <h6>Envoyée le <?php
                                         $date=date_create($value->dateDebutEval);
                                         echo date_format($date, "d/m/Y H:i s");
                                         ?></h6>
                                        <h6 class='mb-2'>Date limite le <?php
                                         $date=date_create($value->dateFinEval);
                                         echo date_format($date, "d/m/Y H:i s");
                                         ?></h6>
                                    </a>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
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
    e=true;
    function ch(){
        if (e) {
        $('#icone').removeClass(" fa fa-chevron-circle-down");
        $('#icone').addClass("fa fa-chevron-circle-up");
        e = false;
    } else {
        $('#icone').removeClass("fa-chevron-circle-up");
        $('#icone').addClass("fa-chevron-circle-down");
        e = true;
    }
    }
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