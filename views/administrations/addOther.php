<?php require_once 'views/layouts/header.php'; ?>

<div class="content">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs w-100 mx-auto bg-light" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Affectation</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Promotion & Departement</button>
        </li>
        <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                            type="button" role="tab" aria-controls="messages" aria-selected="false">Terminé</button>
                    </li> -->
    </ul>

    <!-- Tab panes  home-->
    <div class="tab-content">
        <div class="tab-pane active " id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card mt-2">
                <div class="card-header flex justify-content-between">
                    <div class="">
                        <p class='m-0 p-0'><i class='fa fa-circle-exclamation'></i> Veuillez affecter que l'utilisateur
                            Formateur </p>
                    </div>
                    <div class="ml-auto">
                        <form class="d-flex" method="post">
                            <input class="form-control mx-1" type="search" name="critere" id="critere"
                                placeholder="Rechercher un utilisateur" aria-label="Search">
                            <button class="btn form-submit m-0" type="button" onclick="recherche()"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <!-- container affectation -->
                    <div class="col-md-12 col-lg-12 col-sm-6">
                        <table class="table table-striped table-responsive table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Photo</th>
                                    <th>Noms </th>
                                    <th>Sexe</th>
                                    <th>Affecter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id='data'>
                                    <?php
                                    foreach ($nonInscrit as $data) {
                                    ?>
                                    <td id="headerApp"><img
                                            src="<?= EE ?>app/public/photos/profil/<?= !empty($data->photoUser) ? $data->photoUser : 'icons8_Male_User.ico' ?>"
                                            class="img-circle shadow-lg " style="height:50px; width:50px"
                                            alt=""></td>
                                    <td><a href='<?= EE ?>Messages/getIdDestinateurs/<?= $this->vicha($data->idUser) ?>'
                                            class="btn"><?= $data->nomsUser ?></a></td>
                                    <td><?= $data->sexeUser ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal"
                                            onclick="transId('<?= $data->idUser ?>', '<?= $data->nomsUser ?>');"
                                            data-target="#modelId1" class="btn"> <i class='fa fa-toggle-on'></i>
                                        </button>
                                    </td>
                                </tr>

                                <!-- Modal d'inscription -->
                                <div class="modal fade" id="modelId1" tabindex="1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Affecter le formateur dans un departement</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post" id='FormAffectation'>
                                                    <h5> <i class='fa fa-user'></i> <span id="nomsUser"></span></h5>
                                                    <div class="form-group">
                                                        <input type="hidden" id="idUser" name="idUser">
                                                        <label for="">Promotion</label>
                                                        <select class="form-control" name="idDepart" id="idDepart">
                                                            <option>Séléctionner un departement</option>
                                                            <?php foreach ($departements as $value) { ?>
                                                            <option value="<?= $value->idDepart ?>">
                                                                <?= $value->designDepart ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= EE ?>Administrations/addOther"
                                                    class="btn border">Fermer</a>
                                                <button type="submit" class="btn border shadow-sm">Afecter
                                                    maintenant</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal d'inscription -->

                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- Tab panes  home-->

        <!-- fin section  de tout le tp -->
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="card col-md-3 col-sm-6 mx-1  my-2 p-0">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Departement</h5>
                        <h5 type="button" class="btn form-submit ml-auto p-1 border" data-toggle="modal"
                            data-target="#modelId"><i class="fa fa-plus"></i> departement</h5>
                    </div>
                    <table class="table table-striped">
                        <thead class="bg-dark">
                            <tr>
                                <th>Designation</th>
                                <!-- <th>Description</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                foreach ($departements as $data) {
                                ?>
                                <td><?= $data->designDepart ?></td>
                                <!-- <td><?= $data->designDepart ?></td> -->
                            </tr>
                            <!-- Modal d'inscription -->
                            <div class="modal fade" id="modelId1" tabindex="1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Affecter le formateur dans un departement</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" id='FormAffectation'>
                                                <h5> <i class='fa fa-user'></i> : <span id="nomsUser"></span></h5>
                                                <div class="form-group">
                                                    <input type="hidden" id="idUser" name="idUser">
                                                    <label for="">Promotion</label>
                                                    <select class="form-control" name="idDepart" id="idDepart">
                                                        <option>Séléctionner un departement</option>
                                                        <?php foreach ($departements as $value) { ?>
                                                        <option value="<?= $value->idDepart ?>">
                                                            <?= $value->designDepart ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= EE ?>Administrations/addOther"
                                                class="btn btn-secondary">Fermer</a>
                                            <button type="submit" class="btn btn-primary">Inscrire
                                                maintenant</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Modal d'inscription -->

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="card col-md-8 col-sm-6  my-2 p-0 mx-1">
                    <div class="card-header d-flex justify-content-between p-2">
                        <h5>Les Promotions</h5>
                        <!-- button de modal promotion -->
                        <h5 type="button" class="ml-auto text-sm border p-1 bg-blue-300" data-toggle="modal"
                            data-target="#modelId2"><i class="fa fa-plus"></i>Ajouter Promotion</h5>
                    </div>
                    <!-- modal ajouter promotion -->
                    <div class="modal fade" id="modelId2" tabindex="-1" role="dialog"
                        aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter Promotion</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Departement</label>
                                            <select class="form-control" name="idDepart" id="idDepartAdd">
                                                <option></option>
                                                <?php foreach ($departements as $value) { ?>
                                                <option value="<?= $value->idDepart ?>"> <?= $value->designDepart ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">designation</label>
                                            <input type="text" class="form-control" name="designProm"
                                                id="designProm" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Prix promotion</label>
                                            <input type="text" class="form-control" name="prixProm"
                                                id="prixProm" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Debut Promotion</label>
                                            <input type="date" class="form-control" name="dateDebutProm"
                                                id="dateDebutProm" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Fin de la promotion</label>
                                            <input type="date" class="form-control" name="dateFinProm"
                                                id="dateFinProm" placeholder="">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            onclick="addPromotion()"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- modal promotion -->
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Designation</th>
                                    <th>Prix</th>
                                    <th>debut</th>
                                    <th>Fin</th>
                                    <th>Modifier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    foreach ($promotions as $data) {
                                        $date1 = date_create($data->dateDebutProm);
                                        $dateF1 = date_format($date1, "d.m.Y");
                                        $date2 = date_create($data->dateFinProm);
                                        $dateF2 = date_format($date2, "d.m.Y");
                                    ?>
                                    <td><?= $data->designProm ?></td>
                                    <td><?= $data->prixProm ?></td>
                                    <td><?= $dateF1 ?></td>
                                    <td><?= $dateF2 ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal"
                                            onclick="transIdPromotion('<?= $data->idDepart ?>','<?= $data->idProm ?>',
                                        '<?= $data->designProm ?>','<?= $data->dateDebutProm ?>','<?= $data->dateFinProm ?>','<?= $data->prixProm ?>'
                                        );"
                                            data-target="#modelId3" class="btn"><i
                                                class="fa fa-edit text-blue-400"></i> </button>
                                    </td>
                                </tr>
                                <!-- Modal modification -->
                                <div class="modal fade" id="modelId3" tabindex="1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modifier une promotion</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="idPromEdit" name="idProm">
                                                        <div class="form-group">
                                                            <label for="">Departement</label>
                                                            <select class="form-control" name="idDepart"
                                                                id="idDepartEdit">
                                                                <option id="idDep">Séléctionner un departement
                                                                </option>
                                                                <?php foreach ($departements as $value) { ?>
                                                                <option value="<?= $value->idDepart ?>">
                                                                    <?= $value->designDepart ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">designation</label>
                                                            <input type="text" class="form-control"
                                                                name="designProm" id="designPromEdit" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Prix promotion</label>
                                                            <input type="text" class="form-control"
                                                                name="prixProm" id="prixPromEdit" placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Debut Promotion</label>
                                                            <input type="date" class="form-control"
                                                                name="dateDebutProm" id="dateDebutPromEdit"
                                                                placeholder="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Fin de la promotion</label>
                                                            <input type="date" class="form-control"
                                                                name="dateFinProm" id="dateFinPromEdit"
                                                                placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="<?= EE ?>Administrations/addOther"
                                                        class="btn border">Fermer</a>
                                                    <button type="button" class="btn border shadow-sm"
                                                        onclick="editPromotion()"> modifier</button>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal d'inscription -->

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- modal departement-->

<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un departement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" id='addDepartement'>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Designation</label>
                        <input type="text" class="form-control" name="designDepart" id="designDepart"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Photo Departement</label>
                        <input type="file" class="form-control" name="photoDepart" id="photoDepart"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <textarea class="form-control" name="descriptionDepart" id="descriptionDepart"
                            placeholder="ce champs est obligatoire" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>





<!-- modal departement fin -->
<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script></script>
<script>
    // fx transation de donnees poster en compact pour le modifier 
    function transId(idUser, nomsUser) {
        $('#idUser').val(idUser);
        $('#nomsUser').html(nomsUser);
    }

    function transIdPromotion(idDepart, idProm, designProm, dateDebutProm, dateFinProm, prixProm) {
        $('#idDep').val(idDepart);
        $('#idPromEdit').val(idProm);
        $('#designPromEdit').val(designProm);
        $('#dateDebutPromEdit').val(dateDebutProm);
        $('#dateFinPromEdit').val(dateFinProm);
        $('#prixPromEdit').val(prixProm);
    }


    // insertion de l'affectation

    document.getElementById("FormAffectation").addEventListener("submit", function(e) {

        e.preventDefault();
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
                    title: ' Affectation éffectuée '
                });
            }


        };

        xhr.open("post", "<?= EE ?>Administrations/affectationForm");
        xhr.responseType = "json";

        xhr.send(data);

    });


    // Rechercher un utilisateur a affecter
    function recherche() {
        var critere = $("#critere").val();
        $.ajax({
            type: "post",
            dataType: "json",
            data: {
                critere: critere
            },
            url: "<?= EE ?>Administrations/rechercher",
            success: function(response) {
                var user = "";
                $.each(response, function(key, value) {
                    user = user +
                        "<td id='headerApp'><img src='<?= EE ?>app/public/photos/profil/" + value
                        .photoUser +
                        "' alt='not' class='img-circle shadow-lg' style='heigth:50px; width:50px'></td>";
                    user = user + "<td><a href='<?= EE ?>Messages/getIdDestinateurs/" + vicha(value
                        .idUser) + "' class='btn'>" + value.nomsUser + "</a></td>";
                    user = user + " <td>" + value.sexeUser + "</td>";
                    user = user + "<td> <button type='button' data-toggle='modal' onclick='" +
                        transId(
                            value.idUser, value.nomsUser) +
                        "' data-target='#modelId1' class='btn'><i class='fa fa-toggle-on'></i></button> </td> </tr>";
                    $("#data").html(user);
                });
                $("#critere").val('');

            },
            error: function(error) {
                console.log(error)
            }
        })
    }


    // insertion departement

    document.getElementById("addDepartement").addEventListener("submit", function(e) {

        e.preventDefault();
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
                    title: ' Departement ajouté '
                });
            }


        };

        xhr.open("post", "<?= EE ?>Administrations/ajouterDepartement");
        xhr.responseType = "json";

        xhr.send(data);

    });

    // add Promotion
    function addPromotion() {
        var idDepart = $('#idDepartAdd').val();
        var designProm = $('#designProm').val();
        var dateDebutProm = $('#dateDebutProm').val();
        var dateFinProm = $('#dateFinProm').val();
        var prixProm = $('#prixProm').val();
        $.ajax({
            type: "post",
            url: "<?= EE ?>Administrations/ajouterPromotion",
            data: {
                idDepart: idDepart,
                designProm: designProm,
                dateDebutProm: dateDebutProm,
                prixProm: prixProm,
                dateFinProm: dateFinProm
            },
            dataType: "json",
            success: function(response) {
                const msg = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                msg.fire({
                    type: 'success',
                    title: 'Promotion ajoutée'
                });
            }
        });
    }

    // moodifier une promotion
    function editPromotion() {
        var idProm = $('#idPromEdit').val();
        var idDepart = $('#idDepartEdit').val();
        var designProm = $('#designPromEdit').val();
        var dateDebutProm = $('#dateDebutPromEdit').val();
        var dateFinProm = $('#dateFinPromEdit').val();
        var prixPromEdit = $('#prixPromEdit').val();
        $.ajax({
            type: "post",
            url: "<?= EE ?>Administrations/editPromotion",
            data: {
                idProm: idProm,
                idDepart: idDepart,
                designProm: designProm,
                dateDebutProm: dateDebutProm,
                prixPromEdit: prixPromEdit,
                dateFinProm: dateFinProm
            },
            dataType: "json",
            success: function(response) {
                const msg = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                msg.fire({
                    type: 'success',
                    title: ' Promotion modifiée '
                });
            }
        });
    }
</script>
<?php require_once 'views/layouts/footer.php'; ?>
