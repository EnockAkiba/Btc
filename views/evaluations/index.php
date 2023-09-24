<?php require_once 'views/layouts/header.php'; ?>

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 overflow">
        <div class=" card-header my-2 w-full">
            <h4 class="d-flex text-sm">
                <a href="<?= EE ?>Evaluations/index" class="text-sm">MES DEVOIRS</a>
                <?php if($_SESSION['photoUser']==null){?>
                <a href="<?= EE ?>Inscriptions/getProfil" class='ml-auto'><i class='fa fa-image'></i> Ajouter une photo
                    de profil</a>
            </h4>
            <?php }?>
        </div>
        <div class="card p-0 shadow-none">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs bg-light mb-2" id="myTab" role="tablist">
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
            <div class="tab-content mt-2 card-body p-0">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container">
                        <?php if(!empty($evaluationEncours)) {?>
                        <div class="row ">
                            <?php 
                                foreach($evaluationEncours as $data) {
                                    $statut=$this->getStatut($this->vicha($data->idEval) );
                                     ?>
                            <div class="col-md-3 col-sm-6 mb-2">
                                <div class="border-2 ">
                                    <form action="<?= EE . 'Evaluations/participer/' . $this->vicha($data->idEval) ?>"
                                        method='post'>
                                        <div class="card-header  headProf">
                                            <h4 class="text-sm"><?= $data->contenuEval ?></h4>
                                            <div class="flex justify-end">
                                                <h4 class="text-sm"><?= $data->nomsUser ?> </h4>
                                                <img src="<?= EE ?>app/public/photos/formateur/<?= $data->photoForm ?>"
                                                    alt="" class='img-fluid rounded-full shadow-lg ml-2'
                                                    style="height:40px; width:40px">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><a
                                                    href="<?= EE ?>Messages/getIdDestinateurs/<?= $this->vicha($data->idUser) ?>"
                                                    class='lien'></a> </h5>
                                            <p class="card-text w-100 justify text-danger">
                                                Date debut : <?php
                                                $date = date_create($data->dateDebutEval);
                                                echo $dateConver = date_format($date, 'd/m/Y H:i s');
                                                ?>
                                            </p>
                                            <p class="card-text w-100 justify text-danger">
                                                Date limite : <?php
                                                $date = date_create($data->dateFinEval);
                                                echo $dateCon = date_format($date, 'd/m/Y H:i s');
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
                                                    <span class='border shadow-sm p-2'> <i
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
                        <div class="col-md-10-col-col-sm-12 empty">
                            <img src="<?= EE ?>app/public/photos/img/Radar.gif" style='width: 80px;height: 80px;'
                                class="mx-auto">
                            <!-- <img src="<?= EE ?>app/public/photos/img/logo.png" alt=""> -->
                            <h5 class="mt-2 text-center">
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
                                <div class="col-md-3 col-sm-6 mb-2">
                                    <div class="border-2 ">
                                        <div class="card-header  headProf">
                                            <h4 class="text-sm"><?= $data->contenuEval ?> </h4>
                                           <div class="flex justify-end">
                                                <h4 class="text-sm"><?= $data->nomsUser ?> </h4>
                                                <img src="<?= EE ?>app/public/photos/formateur/<?= $data->photoForm ?>"
                                                    alt="" class='img-fluid rounded-full shadow-lg ml-2'
                                                    style="height:40px; width:40px">
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><a
                                                    href="<?= EE ?>Messages/getIdDestinateurs/<?$data->idUser?>"
                                                    class='lien'>
                                                </a> </h5>
                                            <p class="card-text w-100 justify text-danger">

                                                Date debut : <?php
                                                $date = date_create($data->dateDebutEval);
                                                echo $dateConver = date_format($date, 'd/m/Y H:i s');
                                                ?>
                                            </p>
                                            <p class="card-text w-100 justify text-danger">
                                                Date limite : <?php
                                                $date = date_create($data->dateFinEval);
                                                echo $dateCon = date_format($date, 'd/m/Y H:i s');
                                                ?>
                                            </p>
                                            <span class='w-100 justify'>
                                                une fois la date limite dépasssée, le tp est considere comme non
                                                remis
                                            </span>
                                            <div class="mt-3 w-100 ">
                                                <div class="w-100 text-right remis">
                                                    <span class='border shadow-sm p-2'> <i class='fa fa-thumbs-down'></i>
                                                        Manqué</span>
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
                                <img src="<?= EE ?>app/public/photos/img/logo.png" alt="" class="mx-auto">
                                <h5 class="mt-2 text-center">
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
                        <div class="col-md-3 col-sm-6">
                            <div class="border mb-2">
                                <form action="<?= EE . 'Evaluations/participer/' . $data->idEval ?>" method='post'>
                                    <div class="card-header  headProf">
                                        <h4 class="text-sm"><?= $data->contenuEval ?></h4>
                                       <div class="flex justify-end">
                                                <h4 class="text-sm"><?= $data->nomsUser ?> </h4>
                                                <img src="<?= EE ?>app/public/photos/formateur/<?= $data->photoForm ?>"
                                                    alt="" class='img-fluid rounded-full shadow-lg ml-2'
                                                    style="height:40px; width:40px">
                                            </div>
                                    </div>
                                    <div class="card-body mb-2">
                                        <h5 class="card-title"><a
                                                href="<?= EE ?>Messages/getIdDestinateurs/<?= $data->idUser ?>"
                                                class='lien'></a> </h5>
                                        <p class="card-text w-100 justify text-danger">
                                            Date debut : <?php
                                            $date = date_create($data->dateDebutEval);
                                            echo $dateConver = date_format($date, 'd/m/Y H:i s');
                                            ?>
                                        </p>
                                        <p class="card-text w-100 justify text-danger">
                                            Date limite : <?php
                                            $date = date_create($data->dateFinEval);
                                            echo $dateCon = date_format($date, 'd/m/Y H:i s');
                                            ?>
                                        </p>
                                        <span class='w-100 justify'>
                                            une fois la date limite dépasssée, le tp est considere comme non
                                            remis
                                        </span>
                                        <div class="mt-3 w-100 ">
                                            <div class="w-100 text-right remis">
                                                <span class='border shadow-sm p-2'> <i
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
</div>

<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>

<?php require_once 'views/layouts/footer.php' ?>
