<?php 
require_once "views/loyouts/headerUser.php";
 ?>
<div class="row mt-0 justify-content-center px-3">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs m-0" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Inscription </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false"> Apprenants</button>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content m-0">
            <div class="tab-pane active m-0" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="mx-1">
                    <div class="shadow-lg p-1 d-flex justify-content-between align-items-center">
                        <h5 class="pt-2"> Non inscrit </h5>
                        <form class="d-flex" method="post">
                            <input class="form-control mx-1" type="search" name="critere" id="critere"
                                placeholder="Rechercher un apprenant" aria-label="Search">
                            <button class="btn form-submit m-0" type="button" onclick="recherche()"><i
                                    class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="shadow-lg mt-1">
                        <div class="container overTable"> 
                        <table class="table w-50 mx-auto">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Noms</th>
                                    <th>Sexe</th>
                                    <th>Inscrire </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id='data'>
                                    <?php 
                            foreach($nonInscrit as $data){
                            ?>
                                    <td id="headerApp">
                                        <a href='<?=EE?>Messages/getIdDestinateurs/<?=$this->vicha($data->idUser)?>' class="lien"><img src="<?=EE?>app/public/photos/profil/<?=!empty($data->photoUser)?$data->photoUser:'icons8_Male_User.ico'?>"
                                            class="img-fluid shadow-sm m-1" alt=""></a></td>
                                    <td><?= $data->nomsUser?></td>
                                    <td><?= $data->sexeUser?></td>
                                    <td>
                                        <button type="button" data-toggle="modal"
                                            onclick="transId('<?=$data->idUser?>', '<?=$data->nomsUser?>')"
                                            data-target="#modelId" class="btn btn-primary">Inscire</button>
                                    </td>
                                </tr>

                                <!-- Modal d'inscription -->
                                <div class="modal fade" id="modelId" tabindex="1" role="dialog"
                                    aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Affecter l'apprenant dans une promotion</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post" id='FormInscrire'>
                                                    <h5>Apprenant : <span id="nomsUser" class='lien'></span></h5>
                                                    <div class="form-group">
                                                        <input type="hidden" id="idUser" name="idUser">
                                                        <label for="">Promotion</label>
                                                        <select class="form-control" name="idProm" id="idProm">
                                                            <option>Séléctionner une promotion</option>
                                                            <?php foreach($promotions as $value){?>
                                                            <option value="<?= $value->idProm?>">
                                                                <?= $value->designProm ?>
                                                            </option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="matriculeIns"> Index number (Matricule)</label>
                                                        <input type="text" class='form-control' name='matriculeIns'
                                                            id='matriculeIns'>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="extensionIns">Extension d'apprentissage </label>
                                                        <input type="text" class='form-control' name='extensionIns'
                                                            id='extensionIns'>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="vacationIns"> Vacation a faire</label>
                                                        <input type="text" class='form-control' name='vacationIns'
                                                            id='vacationIns'>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="nomResp">Nom du responsable (Facultatif)</label>
                                                        <input type="text" class='form-control' name='nomResp'
                                                            id='nomResp'>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="numResp">Numéro téléphone responsable
                                                            (Facultatif)</label>
                                                        <input type="text" class='form-control' name='numResp'
                                                            id='numResp'>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?=EE?>Administrations/index"
                                                    class="btn btn-secondary">Fermer</a>
                                                <button type="submit" class="btn btn-primary">Inscrire
                                                    maintenant</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal d'inscription -->

                                <?php }?>
                           
                            
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="mx-1">
                    <div class="shadow-lg p-1 d-flex justify-content-between">
                        <h5 class=""> <span id="countUser"></span>  Apprenants enregistés</h5>
                        <div id="message"></div> 
                    </div>
                    <div class="  my-1">
                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <button type='button' class='btn btn-primary mx-2 p-1 d-block'
                                    onclick="printPdf('taleUser','utilisateur')"><i class='fa fa-download'></i> pdf
                                </button>
                            </div>
                            <div class="d-flex flex-row">
                                <select class="form-select mr-2" name='extensionIns'  id='extension'>
                                    <option value=''>Trier par extension</option>
                                        <option value="btc afia bora">btc afia bora</option>
                                        <option value="mugunga">mugunga</option>
                                        <option value="katoyi">katoyi</option>
                                </select>
                                <select class="form-select mr-2" name='idProm'  id='idpromotion'>
                                    <option value=''>Trier par promotion</option>
                                    <?php  foreach($promotions as $value){?>
                                    <option value="<?=$value->idProm?>"><?=$value->designProm?></option>
                                    <?php }?>
                                </select>
                                
                                
                            </div>

                        </div>
                    </div>
                    <div class="card-body overTable shadow-lg mt-1">
                    <div id="taleUser">
                        <div class="d-flex justify-content-between my-1" id='headPrint'>
                                    <img src="<?=EE?>app/public/photos/img/logo.png" height="50px" width="50px" class='img-fluid'>
                            <h4>Liste des apprenants </h4>
                            <img src="<?=EE?>app/public/photos/img/logo.png" height="50px" width="50px" class='img-fluid'>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Code Index </th>
                                    <th>Noms </th>
                                    <th>Sexe</th>
                                    <th>Téléphone</th>
                                    <th>Promotion </th>
                                    <th>Extension</th>
                                </tr>
                            </thead>
                            <tbody id='listeInscrit'>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab"> messages </div>
        </div>

    </div>
</main>
<!-- link javascript  -->

<script src="<?=EE?>app/plugins/js/customNav.js"></script>
<script>
getListe();
$('#headPrint').addClass("d-none");

$(document).ready(function() {
    $("#idpromotion").on('change', function() {
        let value = $(this).val();
        $.ajax({
            type: "POST",
            data: 'idProm=' + value,
            dataType: "json",
            url: "<?=EE?>Administrations/getListe",
            beforeSend: function() {
                $('#message').html("<img src='<?=EE."app/public/photos/img/Spinner-5.gif"?>' class='loader'/> Recherche en cours ...")
            },
            success: function(response) {
                var user = "";
                user = "<tr>"
                $.each(response, function(key, value) {
                    // if(){
                    //     getListe();
                    //     $('#message').html("Aucun resultat trouvé");
                    // }else{
                    user = user + "<td>" + value.matriculeIns + "</td>";
                    user = user + "<td>" + value.nomsUser + "</td>";
                    user = user + "<td>" + value.sexeUser + "</td>";
                    user = user + "<td>" + value.telUser + "</td>";
                    user = user + "<td>" + value.designProm + "</td>";
                    user = user + "<td>" + value.extensionIns + "</td>";
                    user = user + "</tr>";
                    $("#listeInscrit").html(user);
                    $('#message').html("");
                    // }
                });
               
            },
        });
    });
});

$(document).ready(function() {
    $("#extension").on('change', function() {
        let value = $(this).val();
        console.log(value);
        $.ajax({
            type: "POST",
            data: 'extensionIns=' + value,
            dataType: "json",
            url: "<?=EE?>Administrations/getListe",
            beforeSend: function() {
                $('#message').html("<img src='<?=EE."app/public/photos/img/Spinner-5.gif"?>' class='loader'/> Loading ...")
            },
            success: function(response) {
                var user = "";
                user = "<tr>"
                $.each(response, function(key, value) {
                    user = user + "<td>" + value.matriculeIns + "</td>";
                    user = user + "<td>" + value.nomsUser + "</td>";
                    user = user + "<td>" + value.sexeUser + "</td>";
                    user = user + "<td>" + value.telUser + "</td>";
                    user = user + "<td>" + value.designProm + "</td>";
                    user = user + "<td>" + value.extensionIns + "</td>";
                    user = user + "</tr>";
                    $("#listeInscrit").html(user);
                    $('#message').html("");
                });
            }
        })
    });
});



function getListe() {
    $.ajax({
        type: "get",
        dataType: "json",
        url: "<?=EE?>Administrations/getListe",

        success: function(response) {
            var user = "";
            user = "<tr>";
            $.each(response, function(key, value) {
                user = user + "<td>" + value.matriculeIns + "</td>";
                user = user + "<td>" + value.nomsUser + "</td>";
                user = user + "<td>" + value.sexeUser + "</td>";
                user = user + "<td>" + value.telUser + "</td>";
                user = user + "<td>" + value.designProm + "</td>";
                user = user + "<td>" + value.extensionIns + "</td>";
                user = user + "</tr>";
                $("#listeInscrit").html(user);
                $('#countUser').html(response.length)
            });
        },
        error: function(error) {
            console.log(error)
        }
    })
}

function printPdf(tablePrint, nomPdf){
    $.ajax({
        beforeSend:function(){
            $('#message').html("<img src='<?=EE."app/public/photos/img/Spinner-5.gif"?>' class='loader'/> Loading ...");
            $('#headPrint').removeClass("d-none");
                
            },
        success: function () {
            $('#message').html("");
            let element = document.getElementById(tablePrint);
             let opt = {
        margin:1,
        filename:nomPdf,
        image:{
             type: 'jpeg', 
             quality: 0.98
         },
        html2canvas:{
             scale: 2
             },
        jsPDF:        
        { unit: 'in',
         format: 'tabloid',
          orientation: 'landscape',
          font:'Arial'
         }
        };

        // New Promise-based usage:
        html2pdf().set(opt).from(element).save();

        // Old monolithic-style usage:
        html2pdf(element, opt);
        }
    });
    
 }
// get dernier message recu
function getdernier() {
    $.ajax({
        type: "get",
        url: "<?=EE?>Messages/getdernier",
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
        },
        error: function(error) {
            console.log(error)
        }
    });
}
getdernier();



function transId(idUser, nomsUser) {
    $('#idUser').val(idUser);
    $('#nomsUser').html(nomsUser);
}

document.getElementById("FormInscrire").addEventListener("submit", function(e) {

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
                title: 'Apprenant inscrit'
            });
        }


    };

    xhr.open("post", "<?=EE?>Administrations/inscrire");
    xhr.responseType = "json";

    xhr.send(data);

});




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
                user = user + " <td>" + value.sexeUser + "</td>";
                user = user + "<td> <button type='button' data-toggle='modal' onclick='" + transId(
                        value.idUser, value.nomsUser) +
                    "' data-target='#modelId' class='btn btn-primary'>Inscire</button> </td> </tr>";
                $("#data").html(user);
            });
            $("#critere").val('');
        },
        error: function(error) {
            console.log(error)
        }
    });
}

 




</script>