<?php require_once 'views/layouts/header.php'; ?>

<div class="row">
    <ul>
        <li class=" text-blue-400 p-2 border bg-light">participation à l'elevaluation</li>
    </ul>
    <div class="col-md-12 col-sm-6">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 answer  d-flex flex-column g-1">
                <h5 class="border bg-light p-2"><?= $evaluation->contenuEval ?></h5>
                <div class="card-body p-2 mt-2 border">
                    <h5 class="card-title"><?= @$evaluation->promotion ?></h5>
                    <p>Promotion : ANGLAIS</p>
                    <h6>Envoyée le <?php
                                    $date = date_create($evaluation->dateDebutEval);
                                    echo date_format($date, 'd/m/Y H:i s');
                                    ?></h6>
                    <h6 class='mb-2'>Date limite le <?php
                                                    $date = date_create($evaluation->dateFinEval);
                                                    echo date_format($date, 'd/m/Y H:i s');
                                                    ?></h6>
                    <span type="button" class="btn remetre border" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-file"></i> ouvrir le fichier
                    </span>
                </div>
                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" style="height:90vh;" role="document">
                        <div class="modal-content h-100">
                            <iframe src="<?= EE ?>app/public/documents/evaluation/<?= $evaluation->fichierEval ?>" height="100%"></iframe>
                            <div class="modal-footer">
                                <button type="button" class="btn remetre border" data-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 col-sm-6">
                <h5 class="bg-light p-2 border">Apprenant qui ont remis</h5>
                <div class="border p-2">
                    <?php
                    if ($participations == null) {
                    ?>
                        <p class="text-muted"> Aucun Apprenant n'a remis</p>
                    <?php
                    } else {
                    ?>
                        <div class="table-responsive">

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <?php
                                        foreach ($participations as $value) {
                                        ?>

                                            <th scope="row">
                                                <img src="<?= EE ?>app/public/photos/profil/<?= $value->photoUser ?>" class='img-fluid rounded-full shadow-lg ml-2' style="height:40px; width:40px">
                                            </th>
                                            <td><?= $value->nomsUser ?></td>
                                            <td><?= !empty($value->contenuPart) ? substr($value->contenuPart, 0, 0) . '' : 'Aucun contenu' ?>
                                            </td>
                                            <?php
                                            // }
                                            ?>
                                            <td><a href="<?= EE ?>app/public/documents/participer/<?= $value->fichierPart ?>" class="btn remetre border">
                                                    <i class="fa fa-eye"></i> voir la reponse</a>
                                            </td>
                                            <td>
                                                <span class='small'>Remis le
                                                    <?= date_format(date_create($value->datePart), 'd/m/Y H:i') ?></span>
                                            </td>
                                    </tr>
                                <?php
                                        }
                                ?>
                                </tbody>
                            </table>
                        </div>

                    <?php
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>


</div>
</div>


<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<?php require_once 'views/layouts/footer.php'; ?>
