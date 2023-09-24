<?php require_once 'views/layouts/header.php'; ?>

<input type="hidden" id='idEval' value='<?= $evaluation->idEval ?>'>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="border bg-light  p-2">
            <h3 class="d-flex">
                <a href="<?= EE ?>Evaluations/index" class="text-sm">MES DEVOIRS</a>
                <?php if($_SESSION['photoUser']==null){?>
                <a href="<?= EE ?>Inscriptions/getProfil" class='text-sm'><i class='fa fa-image'></i> Ajouter une
                    photo de profil</a>
            </h3>
            <?php }?>
        </div>
        <div class="card-body bg-slate-500">
            <div class="row">
                <div class="border col-md-5 col-sm-6 p-0 g-3">
                    <div class="card-header flex justify-between">
                        <h4><?= $evaluation->contenuEval ?></h4>
                        <div class=" ml-auto flex">
                        <h5> <?= $evaluation->nomsUser ?> </h5>
                        <img src="<?= EE ?>app/public/photos/formateur/<?= $evaluation->photoForm ?>" alt="../"
                            class='img-fluid rounded-full shadow-lg ml-2' style="height:40px; width:40px">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?= EE ?>Messages/getIdDestinateurs/<?$evaluation->idUser?>"
                                class='lien'>
                            </a> </h5>
                        <p class="card-text w-100 justify">
                            Date debut : <?= $evaluation->dateDebutEval ?>
                        </p>
                        <p class="card-text w-100 justify">
                            Date limite : <?= $evaluation->dateFinEval ?>
                        </p>
                        <span class='w-100 justify'>
                            une fois la date limite dépasssée, le tp est consideré comme non
                            remis
                        </span>
                        <p>
                            <a href="<?= EE ?>app/public/documents/evaluation/<?= $evaluation->fichierEval ?>"
                                class='lien btn remis shadow-sm border'><i class='fa fa-file'></i>
                                Ouvrir le fichier</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-7 col-sm-12  g-3">
                    <form action="" method='post' class="form" id="formEvaluation"
                        enctype="multipart/form-data">
                        <div class="border">
                            <h5 class="card-header p-2  py-3 mb-2">Remettre l'evaluation</h5>
                            <div class="card-body mt-2">
                                <textarea id="contenuPart" name="contenuPart" rows="5" class="form-control" placeholder='Rediger votre reponse'></textarea>
                                <div class="d-flex w-100 justify-content-between px-3 m-2 flex-wrap" id='footer'>
                                    <div class="d-flex flex-column mb-2">
                                        <label for="fichierPart"><i class='fa fa-file-pdf'></i> Joindre un Fichier
                                        </label>
                                        <input type="file" class='inputFile w-100' name='fichierPart'
                                            id='fichierPart'>
                                    </div>
                                    <div class="form-group d-flex align-items-end">
                                        <button type="submit" name="" id="Remettre" class="btn d-flex border">
                                            <i class="fa-solid fa-paper-plane mx-1"></i>
                                            Remettre</button>
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
<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>

<?php require_once 'views/layouts/footer.php'; ?>
