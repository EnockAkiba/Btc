<?php 
require_once "views/loyouts/headerUser.php";
?>
<div class="row m-2">
  <div class="text-left  d-flex justify-content-between w-100">
    <h5>BTC LIBRARY</h5>
  <?php if($_SESSION['roleUser']=='admin' or $_SESSION['idForm']!=null){?>
    <!-- Button trigger modal -->
    <button type="button" class="form-submit btn" data-toggle="modal" data-target="#modelId">
      Ajouter un livre
    </button>
    <?php }?>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ajouter un livre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="<?=EE?>Bibliotheques/AddLivre" method="post"enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="nomLivre">Nom du livre</label>
              <input type="text" name="nomLivre" id="nomLivre" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label for="DescriptionLivre">Description du livre</label>
                  <textarea name="DescriptionLivre" id="DescriptionLivre" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="photoLivre">photo du livre</label>
              <input type="file" name="photoLivre" id="photoLivre" class="form-control" placeholder="">
            </div>
            <div class="form-group">
              <label for="fichierLivre">fichier du livre</label>
              <input type="file" name="fichierLivre" id="fichierLivre" class="form-control" placeholder="">
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
    <div class="col-md-12 overflowMessage">
        <div class="row justify-content-center">
          <?php foreach ($livres as $value) {?>
    
            <div class="col-md-3 col-sm-6 col-lg-3 mt-2">
                <div class="text-left p-0 m-1 shadow-lg rounded">
                  <img class="m-0" src="<?=EE?>app/public/documents/bibliotheque/<?=$value->photoLivre?>" alt="" height='200px' width='100%'>
                  <div class="card-body mb-1">
                    <h5 class="card-title"><?=$value->nomLivre?></h5>
                    <p>
                    <?= substr($value->DescriptionLivre, 0,200)?>
                  </p>
                  <p>Ajouter le <?=$value->datePubLivre?></p>
                  </div>
                <div class="btn">
                  <!-- <a href="<?=EE?>app/public/documents/bibliotheque/<?=$value->fichierLivre?>" class='btn form-submit'><i class='fa fa-folder-open'></i> Lire</a> -->
                  <a href="<?=EE?>app/public/documents/bibliotheque/<?=$value->fichierLivre?>" class='btn form-submit'><i class='fa fa-download'></i> Télécharger</a>

                </div>
                </div>
            </div>
            <?php 
             }?>
        </div>
    </div>
</div>
</main>



















<script src="<?=EE?>app/plugins/js/customNav.js"></script>
