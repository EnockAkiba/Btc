<?php
require_once 'views/layouts/header.php';
const icone = EE . 'app/public/photos/img/icones/'; ?>
<div class="content">
    <div class="row">

        <div class="col-md-12 col-sm-6 col-lg-12">
            <div class="card p-0">
                <div class="card-header d-flex justify-content-between p-2 bg-light">
                    <h5 class='ml-3'><i class='fa fa-users'></i> utilisateurs</h5>
                    <form class="d-flex ml-auto" method="post">
                        <input class="form-control mx-1" type="search" name="critere" id="critere"
                            placeholder="Rechercher un utilisateur" aria-label="Search">
                        <button class="border p-1" type="button" onclick="recherche()"><i
                                class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="p-0 overflow-auto">
                    <table class="table table-hover table-responsive-sm table-striped table-bordered">
                        <thead class="bg-dark">
                            <tr>
                                <th>Photo</th>
                                <th>Noms complet</th>
                                <th>Admin</th>
                                <th>Appariteur</th>
                                <th>Blocage</th>
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='data'>
                                <?php 
                            foreach($utilisateurs as $data){
                            ?>
                                <td id="headerApp"><img
                                        src="<?= EE ?>app/public/photos/profil/<?= !empty($data->photoUser) ? $data->photoUser : 'icons8_Male_User.ico' ?>"
                                        class='img-circle shadow-lg m-1' alt='not picture'  style='height: 50px; width: 50px;'></td>
                                <td><a href='<?= EE ?>Messages/getIdDestinateurs/<?= $this->vicha($data->idUser) ?>'
                                        class="btn"><?= $data->nomsUser ?></a></td>
                                <td>
                                    <button type="button" onclick="nomerAdmin('<?= $data->idUser ?>');"
                                        class="btn border btnColor shadow-sm"><?= $data->roleUser == 'admin' ? "<img src='" . icone . "admin.png' alt='admin'>" : "<img src='" . icone . "deadmin.png' alt='appariteur'>" ?></button>
                                </td>
                                <td>
                                    <button type="button" onclick="setAppariteur('<?= $data->idUser ?>');"
                                        class="btn border btnColor shadow-sm"><?= $data->roleUser == 'appariteur' ? "<img src='" . icone . "apari.png' alt='appariteur'>" : "<img src='" . icone . "user_16.png' alt='appariteur'>" ?></button>
                                </td>
                                <td>
                                    <button type="button" onclick="userBloque('<?= $data->idUser ?>');"
                                        class="btn border btnColor shadow-sm">
                                        <?= $data->etatComp == 'active' ? "<img src='" . icone . "locl.png' alt='block'>" : "<img src='" . icone . "ulock_16.png' alt='deblock'>" ?></button>
                                </td>
                                <td>
                                    <button type="button" onclick="deleteUser('<?= $data->idUser ?>');"
                                        class="btn border btnColor shadow-sm"><i
                                            class="fa fa-trash text-sm text-red-400"></i></button>
                                </td>
                            </tr>

                            <!-- Modal d'inscription -->

                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script>
    // nommer un utilisateur comme admin
    function nomerAdmin(idUser) {
        if (idUser != null) {
            Swal.fire({
                text: "voulez-vous nommer cet utilisateur comme Admin",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'yes'
            }).then((result) => {
                $.ajax({
                    type: "get",
                    url: "<?= EE ?>Administrations/setAdmin/" + vicha(idUser),
                    dataType: "json",
                    success: function(response) {
                        if (result.isConfirmed) {
                            Swal.fire(
                                'Effectué'
                            );
                            location.reload();
                        }
                    }
                });

            })
        }
    }

    // blocker un utilisateur
    function userBloque(idUser) {
        if (idUser != null) {
            Swal.fire({
                text: "Voulez-vous bloquer cet utilisateur",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                $.ajax({
                    type: "get",
                    url: "<?= EE ?>Administrations/userBloque/" + vicha(idUser),
                    dataType: "json",
                    success: function(response) {
                        if (result.isConfirmed) {
                            Swal.fire(
                                "Utilisateur Bloqué "
                            );
                            location.reload();
                        }
                    }
                });

            })
        }
    }
    // delete un compte
    function deleteUser(idUser) {
        if (idUser != null) {
            Swal.fire({
                text: "Voulez-vous supprimer cet utilisateur",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {

                $.ajax({
                    type: "get",
                    url: "<?= EE ?>Administrations/deleteUser/" + vicha(idUser),
                    dataType: "json",
                    success: function(response) {
                        if (result.isConfirmed) {
                            Swal.fire(
                                "Compte supprimé "
                            )
                        }
                    }
                });

            })
        }
    }

    function setAppariteur(idUser) {
        if (idUser != null) {
            Swal.fire({
                text: "Voulez-vous nommer  comme Appariteur",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                $.ajax({
                    type: "get",
                    url: "<?= EE ?>Administrations/setAppariteur/" + vicha(idUser),
                    dataType: "json",
                    success: function(response) {
                        if (result.isConfirmed) {
                            Swal.fire(
                                "Appariteur Ajouté "
                            );
                        }
                    },
                    complete: function(response) {
                        // location.reload();

                    }
                });

            })
        }
    }
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
                        "<td id='headerApp'><img src='<?= EE ?>app/public/photos/profil/" +
                        value.photoUser + "' class='img-circle shadow-lg m-1' alt='not picture'  style='height: 50px; width: 50px;'></td>";
                    user = user + "<td><a href='<?= EE ?>Messages/getIdDestinateurs/" + vicha(value
                        .idUser) + "' class='btn'>" + value.nomsUser + "</a></td>";
                    user = user +
                        "<td> <button type='button' onclick='nomerAdmin('<?= $data->idUser ?>')' class='btn border shadow-sm'><img src='<?= icone ?>admin.png' alt='admin'></button>";
                    user = user +
                        "<td> <button type='button' onclick='setAppariteur('<?= $data->idUser ?>')' class='btn border shadow-sm'><img src='<?= icone ?>apari.png' alt='appariteur'></button>";
                    user = user +
                        "<td> <button type='button' onclick='userBloque('<?= $data->idUser ?>')' class='btn border shadow-sm'><img src='<?= icone ?>locl.png' alt='lock'></button>";
                    user = user +
                        "<td> <button type='button' onclick='deleteUser('<?= $data->idUser ?>')' class='btn border shadow-sm'><img src='<?= icone ?>icons8_Trash_Can_16.png' alt='admin'></button></tr>";

                    $("#data").html(user);
                });
                $("#critere").val('');

            },
            error: function(error) {
                console.log(error)
            }
        })
    }
</script>
<?php require_once 'views/layouts/footer.php'; ?>
