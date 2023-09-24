<?php require_once 'views/layouts/header.php'; ?>

<div class="content mx-2 my-4 p-2">
    <div class="row">

        <div class="col-lg-10 col-md-10 col-sm-6">
            <div class="row justify-content-center">
                <?php if(isset($publication) and $publication!=null){?>
                <div class="col-md-12 col-sm-12 answer  d-flex flex-column g-1">
                    <form action="<?= EE ?>Actualites/modification" method='post' class="form" id="EvaluationMod"
                        enctype="multipart/form-data">
                        <div class="card">
                            <h5 class="card-header mb-3 p-3 bg-light">Modifier l'actualité</h5>
                            <div class="form-group p-2">
                                <input type="hidden" value='<?= $publication->idPub ?>' name='idPub'>
                                <label for="">Tittre d'actualité</label>
                                <input type="text" class="form-control" name="titrePub" id="titrePub"
                                    value="<?= $publication->titrePub ?>">
                            </div>
                            <div class="form-group d-flex flex-column p-2">
                                <label for="">Contenu</label>
                                <textarea class="form-control" name="contenPub" id="contenPub" rows="3"><?= $publication->contenPub ?></textarea>
                            </div>

                            <div class="d-flex w-100 m-2 justify-content-left" id='footer'>
                                <button type="submit" name="btnModif" id="Remettre" class="btn border"><i
                                        class='fa fa-pencil'></i> Modifier </button>
                            </div>
                            <?php
                                if(isset($this->erreur)){
                                ?>
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading"> 😔 oups!</h4>
                                <p class="mb-0"><?= $this->erreur ?></p>
                            </div>

                            <?php }?>
                        </div>
                    </form>
                </div>

                <?php }else{?>
                <div class="col-md-12 col-sm-12 answer  d-flex flex-column g-1">

                    <form action="" method='post' class="form" id="formEvaluation"
                        enctype="multipart/form-data">
                        <div class="card border-0">
                            <h5 class="card-header mb-3 p-3 bg-light">Ajouter l'actualité</h5>
                            <div class="p-2">
                                <div class="form-group d-flex flex-column">
                                    <label for="">Tittre d'actualité</label>
                                    <input type="text" class="form-control" name="titrePub" id="titrePub"
                                        placeholder="entrer le tittre d'actualité">
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label for="">Contenu</label>
                                    <textarea class="form-control" name="contenPub" id="contenPub" rows="3" placeholder="contenu de l'actualité"></textarea>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label for="">Photo</label>
                                    <input type="file" class="form-control" name="photoPub" id="photoPub"
                                        placeholder="entrer la photo d'actualité">
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <label for="">video</label>
                                    <input type="file" class="form-control" name="fichierPub" id="fichierPub"
                                        placeholder="entrer la video d'actualité">
                                </div>


                                <div class="d-flex w-100 mt-3 justify-content-left" id='footer'>
                                    <button type="submit" onclick="load()" name="btnPublier" id="Remettre"
                                        class="p-2 border">Envoyer </button>
                                </div>
                                <span id='message'></span>
                                <?php
                    if(isset($this->erreur)){
                    ?>
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading"> 😔 oups!</h4>
                                    <p class="mb-0"><?= $this->erreur ?></p>
                                </div>

                                <?php }?>
                            </div>

                        </div>
                    </form>
                </div>

                <?php }?>
            </div>
        </div>

    </div>

</div>
</div>

<?php  require_once 'views/layouts/footer.php'?>

<!-- script navigation -->
<script>
    $('#file-preview').addClass("d-none");

    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {u
            var dataURL = reader.result;
            var output = document.getElementById("file-preview");
            $('#file-preview').addClass("d-inline-block");
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
    // 

    document.getElementById("FormCommenter").addEventListener("submit", function(e) {

        e.preventDefault();
        var contenuCom = $('#contenuCom').val();
        var idPub = $('#idPub').val();
        var data = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(data) {
            if (this.readyState == 4 && this.status == 200) {
                const msg = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                msg.fire({
                    type: 'success',
                    title: 'Commentaire envoyé'
                });
            }
            $('#contenuCom').val("");
            $('#file-preview').addClass("d-none");
            $('#fichierCom').val('');
            // location.reload();

        };

        xhr.open("post", "<?= EE ?>Actualites/commenter/" + vicha(idPub), );
        xhr.responseType = "json";

        xhr.send(data);

    });

</script>
