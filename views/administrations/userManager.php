<?php 
require_once "views/loyouts/headerUser.php";
 ?>
<div class="row mt-2 justify-content-center p-2">
    <div class="col-md-9 col-sm-12 ">
        <div class="mx-1">
            <div class="d-flex justify-content-between shadow-lg p-1">
                <h5 class='ml-3'><i class='fa fa-users'></i> utilisateurs</h5>
                <form class="d-flex" method="post">
                    <input class="form-control mx-1" type="search" name="critere" id="critere"
                        placeholder="Rechercher un utilisateur" aria-label="Search">
                    <button class="btn btn-info" type="button" onclick="recherche()"><i
                            class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="card-body overflowMessage shadow-lg mt-2 px-5">
                <table class="table table-hover table-responsive-sm border">
                    <thead>
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
                                    src="<?=EE?>app/public/photos/profil/<?=!empty($data->photoUser)?$data->photoUser:'icons8_Male_User.ico'?>"
                                    class="img-fluid shadow-sm m-1" alt=""></td>
                            <td><a href='<?=EE?>Messages/getIdDestinateurs/<?=$this->vicha($data->idUser)?>'
                                    class="btn"><?= $data->nomsUser?></a></td>
                            <td>
                                <button type="button" onclick="nomerAdmin('<?=$data->idUser?>');"
                                    class="btn border btnColor shadow-sm"><?= $data->roleUser=='admin'?"<img src='".icone."admin.png' alt='admin'>":"<img src='".icone."deadmin.png' alt='appariteur'>"?></button>
                            </td>
                            <td>
                                <button type="button" onclick="setAppariteur('<?=$data->idUser?>');"
                                    class="btn border btnColor shadow-sm"><?= $data->roleUser=='appariteur'?"<img src='".icone."apari.png' alt='appariteur'>":"<img src='".icone."user_16.png' alt='appariteur'>"?></button>
                            </td>
                            <td>
                                <button type="button" onclick="userBloque('<?=$data->idUser?>');"
                                    class="btn border btnColor shadow-sm"> <?= $data->etatComp=='active'?"<img src='".icone."locl.png' alt='block'>":"<img src='".icone."ulock_16.png' alt='deblock'>"?></button>
                            </td>
                            <td>
                                <button type="button" onclick="deleteUser('<?=$data->idUser?>');"
                                    class="btn border btnColor shadow-sm"><img src="<?=icone?>icons8_Trash_Can_16.png" alt="supprimer"></button>
                            </td>
                        </tr>

                        <!-- Modal d'inscription -->

                        <?php }?>
                    </tbody>
                    <style>
                        #headerApp img{
                                width:40px;
                                height: 40px;
                        }   
                    </style>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3 right col-sm-6 d-none d-md-block">
        <div class=" chat shadow-lg">
            <div class="card-body">
                <h4 class="card-title text-center">
                    <i class="fa fa-users"></i> Users Online
                </h4>
                <?php foreach($this->onLine as $data){?>
                <a href="<?=EE."Messages/getIdDestinateurs/".$this->vicha($data->idUser)?>" class='lien'>
                    <div class="conversation border-bottom">
                        <div class="headerConversation">
                            <img src="<?=EE."app/public/photos/profil/".$data->photoUser?>"
                                class="img-fluid rounded-circle headerImg" srcset="">
                            <h6><?= $data->nomsUser ?></h6>
                        </div>
                </a>
            </div>
            </a>
            <?php } ?>
        </div>
    </div>

    <div class="card chat2  shadow-lg mt-3 ">
        <div class="card-body">
            <h4 class="card-title text-center">
                <i class="fa fa-users"> </i> Mes Interlocuteurs
            </h4>
            <div id="getdernier">
                <!-- there is a function here -->
            </div>
        </div>
    </div>


</div>

</div>
</main>
<!-- link javascript  -->

<script src="<?=EE?>app/plugins/js/customNav.js"></script>
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
                url: "<?=EE?>Administrations/setAdmin/" + vicha(idUser),
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
                url: "<?=EE?>Administrations/userBloque/" + vicha(idUser),
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
                url: "<?=EE?>Administrations/deleteUser/" + vicha(idUser),
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
function setAppariteur(idUser){
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
                url: "<?=EE?>Administrations/setAppariteur/" + vicha(idUser),
                dataType: "json",
                success: function(response) {
                    if (result.isConfirmed) {
                        Swal.fire(
                            "Appariteur Ajouté "
                            );
                        }
                },
                complete: function(response){
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
        url: "<?=EE?>Administrations/rechercher",
        success: function(response) {
            var user = "";
            $.each(response, function(key, value) {
                user = user + "<td id='headerApp'><img src='<?=EE?>app/public/photos/profil/" +
                    value.photoUser + "' class='img-fluid shadow-sm m-1'></td>";
                user = user + "<td><a href='<?=EE?>Messages/getIdDestinateurs/" + vicha(value
                    .idUser) + "' class='btn'>" + value.nomsUser + "</a></td>";
                user = user +
                    "<td> <button type='button' onclick='nomerAdmin('<?=$data->idUser?>')' class='btn border shadow-sm'><img src='<?=icone?>admin.png' alt='admin'></button>";
                user = user +
                    "<td> <button type='button' onclick='setAppariteur('<?=$data->idUser?>')' class='btn border shadow-sm'><img src='<?=icone?>apari.png' alt='appariteur'></button>";
                user = user +
                    "<td> <button type='button' onclick='userBloque('<?=$data->idUser?>')' class='btn border shadow-sm'><img src='<?=icone?>locl.png' alt='lock'></button>";
                user = user +
                    "<td> <button type='button' onclick='deleteUser('<?=$data->idUser?>')' class='btn border shadow-sm'><img src='<?=icone?>icons8_Trash_Can_16.png' alt='admin'></button></tr>";

                $("#data").html(user);
            });
            $("#critere").val('');

        },
        error: function(error) {
            console.log(error)
        }
    })
}


function getdernier() {
    var response;
    $.getJSON('<?=EE?>Messages/getdernier', function(data) {
        var getdernier = "";
        if (data == []) {
            $('#getdernier').html(
                "Vous n'avez pas encore envoyer ou reçu un message </br> Veuillez Rechercher un ami ou prof pour débuter la conversation "
            );
        } else {
            $.each(data, function(key, value) {
                getdernier = getdernier +
                    " <div class='conversation'><a href='<?=EE?>Messages/getIdDestinateurs/" +
                    vicha(value.idUser) +
                    "' class='text-decoration-none text-muted'><div class='headerConversation'>";
                getdernier = getdernier + " <img src='<?=EE?>app/public/photos/profil/" + value
                    .photoUser + "' class='img-fluid rounded-circle'>";
                getdernier = getdernier + " <h6>" + value.nomsUser + "</h6>";
                getdernier = getdernier + " </div>";
                getdernier = getdernier + " </div>";
                $('#getdernier').html(getdernier);
            });
        }
    })
}
getdernier();
</script>