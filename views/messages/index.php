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
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="recherche()"><i class='fa fa-search'></i></button>
            </div>
        </div>
    </div>
</div>

<!--  start main row -->
<div class="border mb-2 p-2 bg-light">
    <h4 class="text-muted">Mes messages</h4>
</div>
<div class="row px-1">
    <div class="col-md-7 col-lg-7 col-sm-6 mx-auto">
        <div class=" row mb-2 justify-content-between align-items-center ">
            <div class="card col-md-12 col-lg-12 col-sm-12 d-flex justify-content-between ">
                <div class="d-flex justify-content-between p-0  w-100 mx-auto">
                    <div class="d-flex align-items-center p-2  mr-2 h-14 overflow-y-hidden" id='overOline'>
                    </div>

                </div>
                <li class="flex mb-2">
                    <input type="search" name="critere" id="critere" class='form-control mx-2' placeholder="recherche">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="recherche()"><i class='fa fa-search'></i></button>
                </li>
            </div>
            <div class=" mt-2 p-3">

                <div class=" row flex-column " id="resultat">
                    <?php
                    foreach ($destinataire as $data) :
                        if ($data->idUser != $_SESSION['idUser']) {
                    ?>
                            <a href='<?= EE ?>Messages/getIdDestinateurs/<?= $this->vicha($data->idUser) ?>' class='w-10/12 d-flex  p-2 m-auto my-1 border-b'>
                                <div class='conversation d-flex'>
                                    <div class='flex w-100 mx-4 items-center'>
                                        <div class="mx-3">
                                            <img src='<?= EE ?>app/public/photos/profil/<?= $data->photoUser ?>' class='img-circle shadow-lg m-1' alt='not picture' style='height: 50px; width: 50px;'>
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
                            .photoUser + "' class='img-circle shadow-lg m-1' alt='not picture' style='height: 50px; width: 50px;'>";
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

    function onLine() {
        $.ajax({
            type: "get",
            url: "<?= EE ?>Messages/getUserOnline",
            dataType: "json",
            success: function(response) {
                let onLine = '';
                $.each(response, function(key, value) {
                    onLine = onLine + " <a href='<?= EE ?>Messages/getIdDestinateurs/" + vicha(value
                        .idUser) + "' class='imgOnline'> ";
                    onLine = onLine + "<img src='<?= EE ?>app/public/photos/profil/" + value
                        .photoUser + "' class='img-circle shadow-sm m-1' alt='not picture' style='height: 50px; width: 50px;'>";
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
     .imgOnline{
    position: relative;
  }
  .imgOnline::after {
    content: '';
    position: absolute;
    width: 15px;
    height: 15px;
    right: 0;
    background: #01d151;
    border: 3px solid rgb(255, 255, 255);
    bottom: 1px;
    border-radius: 50%;
    z-index: 1;
  }
</style>
<?php require_once 'views/layouts/footer.php'; ?>