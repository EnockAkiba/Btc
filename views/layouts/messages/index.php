<?php require_once 'views/layouts/header.php'; ?>

<!-- modale actualite recherhe -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">Rechercher une personne</h5>
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

<div class="row px-5">
    <div class="col-md-7 col-lg-7 col-sm-6">
        <div class=" row mb-2 justify-content-between align-items-center ">
            <div class="card col-md-12 col-lg-12 col-sm-12 d-flex justify-content-between ">
                <div class="d-flex justify-content-between p-0  w-100 mx-auto">
                    <div class="d-flex align-items-center p-2  mr-2 h-14 overflow-y-hidden" id='overOline'>
                    </div>

                </div>
                <li class="flex mb-2">
                    <input type="search" name="critere" id="critere" class='form-control mx-2'
                        placeholder="recherche">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="recherche()"><i
                            class='fa fa-search'></i></button>
                </li>
            </div>
            <div class="card mt-2 p-0">
                <div class="card-header">
                    <h4 class="text-sm">Mes messages</h4>
                </div>
                <div class="card-body row flex-column " id="resultat">
                    <?php
                    foreach ($destinataire as $data) :
                        if ($data->idUser != $_SESSION['idUser']) {
                    ?>
                    <a href='<?= EE ?>Messages/getIdDestinateurs/<?= $this->vicha($data->idUser) ?>'
                        class='w-10/12 d-flex border rounded-full p-2 m-auto my-1'>
                        <div class='conversation d-flex'>
                            <div class='flex w-100 mx-4'>
                                <div class="mx-3">
                                    <img src='<?= EE ?>app/public/photos/profil/<?= $data->photoUser ?>'
                                        class='h-11 rounded-circle'>
                                </div>
                                <h6><?= $data->nomsUser ?></h6>
                            </div>
                        </div>
                    </a>
                    <?php }
                    endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 sm:hidden md:block">
        <div class="row">
            <div class="col-lg-12 col-sm-6">
                <div class="card">
                    <div class="card-header bg-light"><i class="fa fa-users"> </i> Mes Interlocuteurs</div>
                    <div class="card-body">
                        <div id="getdernier flex">
                            <!-- there is a function here -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-sm-6">
                <div class="card">
                    <div class="card-header bg-light"><i class="fa fa-users"></i> Users Online</div>
                    <div class="card-body">
                        <?php foreach ($this->onLine as $data) { ?>
                        <a href="<?= EE . 'Messages/getIdDestinateurs/' . $this->vicha($data->idUser) ?>"
                            class='lien'>
                            <div class="conversation border-bottom">
                                <div class="headerConversation flex">
                                    <img src="<?= EE . 'app/public/photos/profil/' . $data->photoUser ?>"
                                        class="mx-3 img-fluid rounded-circle headerImg" srcset=""
                                        style="height:40px; width:40px">
                                    <h6 ><?= $data->nomsUser ?></h6>
                                </div>
                        </a>
                    </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script>
    // recherher un utilisateur a envoyer un message



    function recherche() {
        var critere = $("#critere").val();
        $.ajax({
            type: "post",

            dataType: "json",
            data: {
                critere: critere
            },
            url: 'Messages/rechercherUser',
            success: function(response) {
                if (critere != "") {
                    var resultat = "";
                    $.each(response, function(key, value) {


                        resultat = resultat + "<a href='<?= EE ?>Messages/getIdDestinateurs/" +
                            vicha(value
                                .idUser) + "' class='w-100 d-flex lien'>";
                        resultat = resultat + "<div class='conversation d-flex'>";
                        resultat = resultat + "<div class='headerConversation w-100'>";
                        resultat = resultat + "<img src='<?= EE ?>app/public/photos/profil/" + value
                            .photoUser + "' class='h-11 w-11 rounded-circle'>";
                        resultat = resultat + "<h6 class='border-bottom'>" + value.nomsUser +
                            "</h6>";
                        resultat = resultat + "</div> </a> </div> ";
                        $('#resultat').html(resultat);
                    });
                    $("#critere").val("");
                } else {
                    $('#resultat').html("<div style='color:red'>aucun resultat</div>");
                }
            },
            error: function(error) {
                console.log(error)
            }
        })
    }
    // getdernier
    function getdernier() {
        $.ajax({
            type: "get",
            url: "<?= EE ?>Messages/getdernier",
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
                            " <div class='conversation'><a href='<?= EE ?>Messages/getIdDestinateurs/" +
                            vicha(value
                                .idUser) +
                            "' class='text-decoration-none text-muted'><div class='headerConversation'>";
                        getdernier = getdernier + " <img src='<?= EE ?>app/public/photos/profil/" +
                            value.photoUser + "' class='h-11 w-11 rounded-circle shadow-sm'>";
                        getdernier = getdernier + " <h6 class='border-bottom'>" + value.nomsUser +
                            "</h6>";
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

    function onLine() {
        $.ajax({
            type: "get",
            url: "<?= EE ?>Messages/getUserOnline",
            dataType: "json",
            success: function(response) {
                let onLine = '';
                $.each(response, function(key, value) {
                    onLine = onLine + " <a href='<?= EE ?>Messages/getIdDestinateurs/" + vicha(value
                        .idUser) + "' class='h-11 w-11 online'> ";
                    onLine = onLine + "<img src='<?= EE ?>app/public/photos/profil/" + value
                        .photoUser + "' class='h-11 w-11 rounded-circle shadow-sm'>";
                    onLine = onLine + "</a>";
                    $('#overOline').html(onLine);
                });
            },
            error: function(error) {
                console.log(error)
            }
        });
    };



    onLine();
    checkNewMessage();
</script>

<style>
    .online {
        position: relative;
    }

    .onLine::after {
        position: absolute;
        content: '';
        background-color: red;
        width: 10px;
        height: 10px;
        z-index: 111;
    }
</style>
<?php require_once 'views/layouts/footer.php'; ?>
