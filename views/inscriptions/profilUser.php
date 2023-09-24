<?php require_once 'views/layouts/header.php'; ?>

<div class="row p-2 ">
    <h4 class="border bg-light p-2 my-2">Mon profil</h4>
    <div class="col-md-3 col-lg-3 col-sm-3 mb-3 ">
        <h5 class="text-blue-400">Photo de profil</h5>
        <div class="border rounded sm:w-1/2">
            <form action="" method='post' class="form" id="formPhoto" enctype="multipart/form-data"
                name='uploadForm'>
                <label for="img-input" id="photoShow">
                    <img src="<?= EE ?>app/public/photos/profil/<?= $profil->photoUser ?>" class="img-fluid"
                        style="height:240px; width:100%" alt="AJouter une photo de profil" id='file-preview'>
                    <img id="upload-Preview" />
                </label>
                <input type="file" class="form-control photo d-none" accept="image/*" name="photoUser" id="img-input"
                    onchange="showFile(event)" class="img-fluid" style="height:240px; width:100%">
                <p class="card-text">
                    <button class="btn border p-1 ml-2" type="submit" id="modifier">Modifier la photo</button>
                </p>
                <h5 class="text-red-400 mx-2 text-sm"> Cliquer sur la photo pour Choisir une autre</h5>
                <span id='message'></span>
            </form>
        </div>
    </div>
    <div class="col-md-8 col-sm-6 col-lg-8">
        <ul class="nav nav-tabs bg-light mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Mon profl</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Modifier le
                    profil</button>
            </li>
            <?php
                         if($_SESSION['idForm']!=null){ ?>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bio" type="button"
                    role="tab" aria-controls="profile" aria-selected="false"> Ajouter votre
                    Biographie</button>
            </li>
            <?php }?>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content ">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row ml-2">
                    <div class="col-md-11 col-sm-6 border p-0">
                        <table class="table  table-hover">
                            <tbody>
                                <tr>
                                    <td scope="row">Nom complet </td>
                                    <td id='nomsUser'>: <?= $profil->nomsUser ?></td>
                                </tr>
                                <tr>
                                    <td scope="row">Date Naissance</td>
                                    <td id='dateNaissUser'>:<?= $profil->dateNaissUser ?></td>
                                </tr>
                                <tr>
                                    <td scope="row">Adresse mail </td>
                                    <td id='gmailUser'>: <?= $profil->gmailUser ?></td>
                                </tr>
                                <tr>
                                    <td scope="row">Sexe </td>
                                    <td id='sexeUser'>: <?= $profil->sexeUser ?></td>
                                </tr>
                                <tr>
                                    <td scope="row">Adresse locale</td>
                                    <td id='adresseUser'>: <?= $profil->adresseUser ?></td>
                                </tr>
                                <tr>
                                    <td>Téléphone</td>
                                    <td><?= $profil->telUser ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <form action="" class="border p-2" method='post' id='formProfil'>
                    <div class="form-group row mt-1">
                        <div class="col-md-6">
                            <label for="nom">Noms complet</label>
                            <input type="text" name="nomsUser" id="nomsUser" class="form-control"
                                value='<?= $profil->nomsUser ?>'>
                        </div>
                        <div class="col-md-6">
                            <label for="nom">Date de naissance</label>
                            <input type="date" name="dateNaissUser" id="dateNaissUser" class="form-control"
                                value='<?= $profil->dateNaissUser ?>'>
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                        <div class="col-md-6">
                            <label for="adresseUser"><i class='fa fa-location'></i>Adresse Locale</label>
                            <input type="text" name="adresseUser" id="adresseUser" class="form-control"
                                value='<?= $profil->adresseUser ?>'>
                        </div>
                        <div class="col-md-6">
                            <label for="sexeUser">Sexe</label>
                            <select class="form-select" name='sexeUser' id='sexeUser'>
                                <option value='<?= $profil->sexeUser ?>'> <?= $profil->sexeUser ?></option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-1">
                        <div class="col-md-6">
                            <label for="gmailUser "><i class='fa fa-'></i> Adresse Mail</label>
                            <input type="email" name="gmailUser" id="gmailUser" class="form-control"
                                value='<?= $profil->gmailUser ?>'>
                        </div>
                        <div class="col-md-6">
                            <label for="telUser "><i class='fa fa-phone'></i> Téléphone</label>
                            <input type="text" name="telUser" id="telUser" class="form-control"
                                value='<?= $profil->telUser ?>'>
                        </div>
                    </div>
                    <div class="btn-group mt-1" role="group" aria-label="Basic example">
                        <button type="submit" class="btn p-2 border">Modifier</button>
                    </div>

                </form>
            </div>
            <div class="tab-pane" id="bio" role="tabpanel" aria-labelledby="profile-tab">
                <form action="" class="border p-2" method='post' id="sendBio" enctype="multipart/form-data">
                    <div class="form-group row mt-1 p-2">
                        <div class="col-md-6">
                            <label for="nom">Votre photo</label>
                            <input type="file" name="photoForm" id="photoForm" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="nom">Adresse mail Professionnelle</label>
                            <input type="gmail" name="gmailForm" id="gmailForm" class="form-control">
                        </div>
                    </div>

                    <div class="form-group  mt-2 p-2">
                        <label for="adresseUser">Biographie</label>
                        <textarea name="biographieForm" id="biographieForm" cols="20" rows="8" class="form-control w-1/2">  </textarea>
                    </div>
                    <div class="p-2 mt-3 d-flex justify-content-between" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-success ">Ajouter</button>
                        <div id='loader' class="ml-1">
                        <span class="text-sm text-red-400"> pouvez modifier votre Biographie ainsi que votre adresse Mail</span>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Nav tabs -->

</div>


<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script>
    function showFile(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById("file-preview");
            output.src = dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }
    // changer la photo de profil
    function setPhotoProfil() {
        // var photo = $('#photo').val();
        var uploadFile = document.getElementById("upload-Image").files[0];
        $.ajax({
            type: "post",
            url: "<?= EE ?>Inscriptions/setPhotoProfil",
            data: uploadFile,
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
                    title: 'Photo de profil modifiée'
                });
                $('#photo').val("");
            }
        });
    }
    $(document).ready(function() {
        $('#formPhoto').submit(function(event) {
            event.preventDefault();
            var form = $('#formPhoto')[0];
            var data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= EE ?>Inscriptions/setPhotoProfil",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#message').html(
                        "<img src='<?= EE . 'app/public/photos/img/Spinner-5.gif' ?>' class='loader'/>"
                    )
                },
                success: function(response) {
                    $('#message').html("")
                },
                complete: function() {
                    $('#message').html("")
                    const msg = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    msg.fire({
                        type: 'success',
                        title: 'modifier reusi avec succes'
                    });
                }
            });
        })
    });
    // send biographie

    $(document).ready(function() {
        $('#sendBio').submit(function(event) {
            event.preventDefault();
            var form = $('#sendBio')[0];
            var data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= EE ?>Inscriptions/setProfilForm",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#loader').html(
                        "<img src='<?= EE . 'app/public/photos/img/loader.gif' ?>' class='loader'/>"
                    );
                },
                success: function(response) {
                    $('#loader').html("");
                },
                complete: function() {
                    $('#loader').html("");
                    $('#biographieForm').val('');
                    $('#photoForm').val('');
                    $('#gmailForm').val('');
                    const msg = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    msg.fire({
                        type: 'success',
                        title: 'Biographie ajouteé'
                    });
                }
            });
        })
    });


    //----------modifier alors-----

    $(document).ready(function() {
        $('#formProfil').submit(function(event) {
            event.preventDefault();
            var form = $('#formProfil')[0];
            var data = new FormData(form);
            $.ajax({
                type: "post",
                url: '<?= EE ?>Inscriptions/setProfil',
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
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
                        title: 'modifier reusi avec succes'
                    });

                }
            });
        })
    });
</script>
