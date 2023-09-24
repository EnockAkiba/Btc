<?php require_once 'views/layouts/header.php'; ?>
<script>
    function getMention(idPub) {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "<?= EE ?>Actualites/getMention/" + vicha(idPub),
            success: function(response) {
                console.log(response);
            }
        });
    }
</script>
<?php
if ((isset($_SESSION['idForm']) and empty($_SESSION['idProm'])) or (isset($_SESSION['idIns']))) {
?>
<div class="content">

    <!-- modale actualite recherhe -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Rechercher une Actualité</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex">
                    <input type="search" name="critere" id="critere" class='form-control mx-2'>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="recherche()"><i
                            class='fa fa-search'></i></button>
                </div>
            </div>
        </div>
    </div>
    <!--  start main row -->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- header to all -->
            <div class="content">
                <div class="row mb-2 justify-content-between align-items-center border-b">
                    <div class="col-md-12 col-sm-12 d-flex">
                        <h3 class="d-flex justify-content-between w-100">
                            <a href="<?= EE ?>actualites/index" class="text-blue-400 text-sm m-2">BTC NEWS</a>
                            <?php if ($_SESSION['photoUser'] == null) { ?>
                            <a href="<?= EE ?>Inscriptions/getProfil" class='text-sm'><i class='fa fa-image'></i>
                                Ajouter
                                une
                                photo de profil</a>
                            <?php } ?>
                        </h3>
                        <!-- <li><a href="" type="button" data-toggle="modal" data-target="#modelId"><i class='fa fa-search w-icone'></i> </a> -->
                        </li>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mx-auto mb-2" id="actualite">
            <?php
                // var_dump($actualites);
                foreach ($actualites as $value) {
                ?>
            <div class="col-lg-4 col-sm-6">
                <div class="text-start border-2 border-gray-100 rounded-b-md bg-light mb-2">
                    <div class="w-100 bg-dark">
                        <?php
                                if (($value->fichierPub != null) && ($value->photoPub != null)) { ?>
                        <video src='<?= EE ?>app/public/videos/actualites/<?= $value->fichierPub ?>'
                            class='w-full h-64  rounded-md' preload='none' controls
                            poster='<?= EE ?>app/public/photos/publication/<?= $value->photoPub ?>'>changer votre
                            navigateur</video>

                        <?php } elseif ($value->fichierPub != null) { ?>
                        <video src='<?= EE ?>app/public/videos/actualites/<?= $value->fichierPub ?>'
                            class='w-full h-64 rounded-md' preload='none' controls> changer votre navigateur </video>
                        <?php  } else if ($value->photoPub != null) { ?>
                        <img src='<?= EE ?>app/public/photos/publication/<?= $value->photoPub ?>'
                            class='w-full h-64 rounded-md' alt='..' />
                        <?php } elseif (($value->fichierPub == null) && ($value->photoPub == null)) { ?>
                        <div class="bg-light py-3 px-2">
                            <h4 class=" border-b mb-2"> <?= $value->titrePub ?></h4>
                            <a href='<?= EE ?>Actualites/getActualite/<?= $this->vicha($value->idPub) ?>'
                                class='text-decoration-none'>
                                <p class='text-dark' id='contenPub'><?= substr($value->contenPub, 0, 520) ?><span
                                        class='text-blue-400'>... voir plus</span></p>
                            </a>
                        </div>

                        <?php  } ?>
                    </div>

                    <div class="body p-2">
                        <?php if (($value->fichierPub != null) or ($value->photoPub != null)) { ?>
                        <div class="flex justify-between w-full content-start">
                            <h4> <?= $value->titrePub ?></h4>
                            <?php if ($_SESSION['roleUser'] === 'admin') { ?>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                        <i class='fa fa-ellipsis-vertical mx-3'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; top: 0;">
                                        <div class="flex flex-column p-2">
                                            <a class="border p-2 text-center m-1 text-blue-400"
                                                href="<?= EE ?>Actualites/setActualite/<?= $this->vicha($value->idPub) ?>">
                                                Modifier</a>
                                            <a class="border p-2 text-center m-1 text-green-400"
                                                href="<?= EE ?>Actualites/setIsPrivate/<?= $this->vicha($value->idPub) ?>">Rendre
                                                public</a>
                                            <a class="border  p-2 text-center m-1 text-red-400"
                                                href="<?= EE ?>Actualites/delete/<?= $this->vicha($value->idPub) ?>">
                                                Supprimer</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <?php } ?>
                        </div>
                        <a href='<?= EE ?>Actualites/getActualite/<?= $this->vicha($value->idPub) ?>'
                            class='text-decoration-none'>
                            <p class='text-dark' id='contenPub'><?= substr($value->contenPub, 0, 40) ?><span
                                    class='text-blue-400'>... voir plus</span></p>
                        </a>
                        <?php } ?>
                        <div class='flex'>
                            <a href='<?= EE ?>Actualites/getActualite/<?= $this->vicha($value->idPub) ?>'
                                class='border-2 rounded-full  text-center mx-1 w-1/2 p-2'>
                                <span id='value.commentaires'>
                                    <?= $value->commentaires ?> <i class='fa fa-comment'></i>
                                </span>
                            </a>
                            <span class='border-2 rounded-full text-center mx-1 w-1/2 p-2 '>
                                <form class='mx-2' id='formLike' onclick='aimer(<?= $value->idPub ?>)'><i
                                        class='fa fa-thumbs-up <?= $this->getMention($value->idPub) ? 'text-red-500'
                                        : '' ?>' id='<?= $value->idPub ?>' type='button'> <?= $value->aime ?></i>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</div>
</div>

<?php
} else {
?>

<div class="row p-3">

    <div class="col-md-12 col-sm-6 card p-0">
        <h4 class="card-header">Brotherly Training Center/<span class='text-blue-400'>BTC</span> </h4>
        <div class="text-justify p-2">
            <p class="ml-3"> Bienvenue sur le site de Btc, vous avez déjà un compte utilisateur mais qui est
                incompet,
                veuillez
                vous diriger à notre bureau pour completer votre compte<br>
            <p class="ml-3">Nous sommes aux quatre coins de la ville de goma</p>
            <p class="ml-3 text-blue-500"> <i class='fa fa-location-pin'></i> BTC Extensions dans la ville de goma</p>
            <div class="row ml-3">
                <div class="col-md-6 col-sm-6">
                    <div class="row ">
                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="border  p-3 text-center  rounded">
                                <h3 class="">AFIA BORA</h3>
                                <span> <a href="tel:+243 973 111 973">+243 973 111 973</a> Administateur </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="border  p-3 text-center  rounded">
                                <h3 class="">MUGUNGA</h3>
                                <span> <a href="tel:+243 973 111 973">+243 973 111 973</a> Appariteur </span>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6 mb-2">
                            <div class="border  p-3 text-center  rounded">
                                <h3 class="">KATOYI</h3>
                                <span> <a href="tel:+243 973 111 973">+243 973 111 973</a> Appariteur </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <iframe src="" frameborder="0"></iframe>
                </div>
            </div>

            <!-- <a href=""
                class='rounded-pill border shadow-lg p-3 text-decoration-none text-dark  my-3 d-inline-block'><i
                    class='fa fa-phone'></i> +243 973 111 973 <br>Contacter-nous</a>
            <p>THE BROTHERLY TRAINING CENTER BTC met en disposition une bibliotheque gratuite juste pour
                vous !</p> -->
        </div>
    </div>
    <p class="text-right"> Teaching is touching souls forever</p>
</div>
</div>


<?php
}
?>
</section>
<?php require_once 'views/layouts/footer.php'; ?>


<?php
if ((isset($_SESSION['idForm']) and empty($_SESSION['idProm'])) or (isset($_SESSION['idIns']))) {
?>
<script>
    // aimer une actualite
    function aimer(idPub) {
        let value = '';
        value = parseInt($("#" + idPub + "").html());
        console.log(value);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "<?= EE ?>Actualites/aimer/" + idPub,
            success: function(response) {
                // getMention(idPub);
                if (response === "Vrai") {
                    $("#" + idPub + "").addClass("aimer");
                    $("#" + idPub + "").html(value = value + 1);
                } else {
                    $("#" + idPub + "").removeClass("aimer");

                    $("#" + idPub + "").html(value = value - 1);
                }
            }
        })
    }


    function deletePub(idPub) {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "<?= EE ?>Actualites/delete/" + vicha(idPub),
            success: function(response) {}
        });
    }
</script>

<?php } ?>
