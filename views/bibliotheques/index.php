<?php require_once 'views/layouts/header.php'; ?>

<div class="row">
    <div class="text-left  flex justify-between border bg-light items-center">
        <h5>BTC LIBRARY</h5>
        <?php if($_SESSION['roleUser']=='admin' or $_SESSION['idForm']!=null){?>
        <!-- Button trigger modal -->
        <button type="button" class=" border my-1 bg-primary btn" data-toggle="modal" data-target="#modelId">
            Ajouter un livre
        </button>
        <?php }?>
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ajouter un livre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= EE ?>Bibliotheques/AddLivre" method="post"enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nomLivre">Nom du livre</label>
                                <input type="text" name="nomLivre" id="nomLivre" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="DescriptionLivre">Description du livre</label>
                                <textarea name="DescriptionLivre" id="DescriptionLivre" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photoLivre">photo du livre</label>
                                <input type="file" name="photoLivre" id="photoLivre" class="form-control"
                                    placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="fichierLivre">fichier du livre</label>
                                <input type="file" name="fichierLivre" id="fichierLivre" class="form-control"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn form-submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-6">
        <div class="row">
            <?php foreach ($livres as $value) {?>

            <div class="col-md-3 col-sm-6 col-lg-3 my-2 ">
                <div class="text-left p-0  border rounded">
                    <img class="m-0" src="<?= EE ?>app/public/documents/bibliotheque/<?= $value->photoLivre ?>"
                        alt="" height='200px' width='100%'>
                    <div class="card-body mb-1">
                        <h5 class="card-title"><?= $value->nomLivre ?></h5>
                        <p>
                            <?= substr($value->DescriptionLivre, 0, 200) ?>
                        </p>
                        <p>Ajouter le <?= $value->datePubLivre ?></p>
                    </div>
                    <a href="<?= EE ?>app/public/documents/bibliotheque/<?= $value->fichierLivre ?>"
                        class='inline-block p-1 m-2 border rounded-sm'><i class='fa fa-download'></i> Télécharger</a>
                </div>
            </div>
            <?php 
             }?>
        </div>
    </div>
</div>


















<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
