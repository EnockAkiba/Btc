<?php require_once 'views/layouts/header.php'; ?>

<div class="content">
    <div class="row">

        <div class="col-lg-9 col-md-9 col-sm-6">
            <div class="card-header bg-light">
                <span class="text-blue-400"> <?= $actualite->titrePub ?> </span>
            </div>
            <div class="p-1 border my-2">

                <div class="p-2">
                    <a href="<?= EE . 'Messages/getIdDestinateurs/' . $this->vicha($actualite->idUser) ?>" class='lien'>
                        <div class="header d-flex align-items-end ">
                            <div class=" d-flex w-100">
                                <img src="<?= EE ?>app/public/photos/profil/<?= $actualite->photoUser ?>"
                                    class="img-fluid rounded-circle headerImg" style="margin-left:20px">
                                <div class="d-flex flex-column w-100 justify-content-between">
                                    <h6 class='mx-2'> <?= $actualite->nomsUser ?></h6>
                                    <h6 class='datePub text-right'>le <?= $actualite->datePub ?></h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <?php if (($actualite->fichierPub != null) or ($actualite->photoPub != null)) { ?>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 bg-light flex  items-center">
                            <?php if (($actualite->fichierPub != null) and ($actualite->photoPub != null)) { ?>
                            <video src='<?= EE ?>app/public/videos/actualites/<?= $actualite->fichierPub ?>'
                                class='w-full' preload='none' controls
                                poster='<?= EE ?>app/public/photos/publication/<?= $actualite->photoPub ?>'>changer
                                votre
                                navigateur</video>

                            <?php    } elseif ($actualite->fichierPub != null) { ?>
                            <video src='<?= EE ?>app/public/videos/actualites/<?= $actualite->fichierPub ?>'
                                preload='none' controls class="w-full" style="height:300px"> changer votre
                                navigateur </video>

                            <?php } elseif ($actualite->photoPub != null) { ?>

                            <img src="<?= EE ?>app/public/photos/publication/<?= $actualite->photoPub ?>" id="photoPub"
                                class="w-full">
                            <?php } ?>
                        </div>
                        <div class="col-lg-6 col-sm-6 p-3" style="height:56vh ;overflow:auto">
                            <p class="border-b"> <?= $actualite->contenPub ?></p>
                            <?php
                                foreach ($commentaires as $data) { ?>
                            <div class="w-full my-1 border-b">
                                <a href="<?= EE . 'Messages/getIdDestinateurs/' . $this->vicha($actualite->idUser) ?>">
                                    <div class="flex justify-between items-center">
                                        <img src="<?= EE ?>app/public/photos/profil/<?= $data->photoUser ?>"
                                            style="height:40px; width:40px" class="rounded-full">
                                        <h6 class='text-bold'> <?= $data->nomUser ?></h6>
                                    </div>
                                </a>
                                <p class="text-muted text-justify" id='contentCom'><?= $data->contenuCom ?></p>
                                <p class='text-right text-muted'> <?= $data->dateCom ?></p>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <?php } elseif (($actualite->fichierPub == null) and ($actualite->photoPub == null)) { ?>
                    <div class="col-lg-12 col-sm-6 p-3" style="height:56vh ;overflow:auto">
                        <p class="border-b"> <?= $actualite->contenPub ?></p>

                        <?php
                            foreach ($commentaires as $data) { ?>
                        <div class="w-full my-1 border-b">
                            <a href="<?= EE . 'Messages/getIdDestinateurs/' . $this->vicha($actualite->idUser) ?>">
                                <div class="flex justify-between items-center">
                                    <img src="<?= EE ?>app/public/photos/profil/<?= $data->photoUser ?>"
                                        style="height:40px; width:40px" class="rounded-full">
                                    <h6 class='text-bold'> <?= $data->nomUser ?></h6>
                                </div>
                            </a>
                            <p class="text-muted text-justify" id='contentCom'><?= $data->contenuCom ?></p>
                            <p class='text-right text-muted'> <?= $data->dateCom ?></p>
                        </div>
                        <?php } ?>

                    </div>
                    <?php } ?>


                </div>
            </div>
            <div class="mb-3 border-2 border-blue-200 p-2">
                <form action="" method="post" id="FormCommenter" class='flex'>
                    <input type="hidden" name="idPub" id="idPub" value='<?= $actualite->idPub ?>'>
                    <textarea id="contenuCom" class="w-full border-none outline-none" name="contenuCom"
                        placeholder="Laisser votre Commentaire ici ..."></textarea>
                    <!-- <img src="" class="img-fluid headerImg shadow-sm mx-3" alt="" id='file-preview'> -->
                    <button type="submit" class="btn"><i class="fa-solid fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
<?php require_once 'views/layouts/footer.php'; ?>




<!-- script navigation -->
<script>
    $('#file-preview').addClass("d-none");

    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
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
