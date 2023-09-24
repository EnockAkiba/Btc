<?php require_once 'views/layouts/header.php'; ?>

<div class="row">
    <div class="col-md-12 col-sm-6">
        <div class="p-0">
            <h5 class="card-header p-2">
                Ajouter une Evaluation
            </h5>
            <div class="row mt-2">
                <form action="" method='post' class=" col-md-4 col-lg-4 col-sm-6" id="formEvaluation"
                    enctype="multipart/form-data">
                    <div class="border">
                        <div class="card-body h-100 mb-0">
                            <div class="form-group d-flex flex-column">
                                <label for="">Tittre d'evaluation</label>
                                <input type="text" class="form-control" name="contenuEval" id="contenuEval"
                                    placeholder="entrer le tittre d'evaluation">
                            </div>
                            <div class="form-group d-flex flex-column mt-3">
                                <label for="">Departement ou promotion</label>
                                <select class="form-select" name='idProm'>
                                    <option>Selectionnez une promotion</option>
                                    <?php
                                    foreach ($promotions as $value) { ?>
                                    <option value="<?= $value->idProm ?>"><?= $value->designProm ?></option>
                                    <?php
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="">Fichier du contenu</label>
                                <input type="file" class="form-control" name="fichierEval" id="fichierEval"
                                    placeholder="">
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="">Date du debut d'evaluation</label>
                                <input type="datetime-local" class="form-control" name="dateDebutEval"
                                    id="dateDebutEval" placeholder="">
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="">Date de fin d'evaluation</label>
                                <input type="datetime-local" class="form-control" name="dateFinEval" id="dateFinEval"
                                    placeholder="">
                            </div>

                        </div>
                        <div class="d-flex justify-start items-start m-1" id='footer'>
                            <button type="submit" class="border  p-2 bg-green-400">Enregister</button>
                            <p class="text-muted text-center mx-1">
                                <?php
                                echo $this->erreur;
                                ?>
                            </p>
                        </div>
                    </div>
                </form>
                <div class="col-md-8 col-lg-8 col-sm-6 overflow-auto" style="height:73vh ">

                    <h5 class="bg-light p-2 border">evaluations Envoyées</h5>
                    <div class="row ml-1">
                        <?php
                                if ($getEvaluations != null) {
                                    foreach ($getEvaluations as  $value) {
                                ?>
                        <div class="col-md-4 col-sm-3  p-1">
                        <div class="border">
                            <a href="<?= EE ?>Evaluations/getParticipations/<?= $this->vicha($value->idEval) ?>"
                                class="btn">
                                <h5 class="text-sm font-bold text-left text-blue-500"><?= $value->contenuEval ?></h5>
                                <p class="text-left">Promotion : <?= $value->designProm ?></p>
                                <h6 class="text-left">Envoyée le <?php
                                $date = date_create($value->dateDebutEval);
                                echo date_format($date, 'd/m/Y H:i s');
                                ?></h6>
                                <h6 class='mb-2'>Date limite le <?php
                                $date = date_create($value->dateFinEval);
                                echo date_format($date, 'd/m/Y H:i s');
                                ?>H</h6>
                            </a>
                        </div>
                        </div>
                        <?php }
                                } ?>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
</div>

<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script>
    e = true;

    function ch() {
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

</script>

<?php require_once 'views/layouts/footer.php'; ?>
