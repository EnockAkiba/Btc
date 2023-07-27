<?php
require_once "views/loyouts/headerUser.php";
 ?>
<link rel="stylesheet" href="<?=EE?>app/plugins/css/dropdown.css">
<div class="row mx-2 ">
    <div class="col-md-9 col-sm-12 p-0 m-0">
        <div class="container-fluid message">
            <div class="btcAll1 border-bottom mb-1">
                <div class='lien'><a href="<?=EE?>Messages" class='lien'><i class='fa fa-mail-reply'></i> <span
                            id='PhotoDes' id='mt-1'></span><span id='nomDes'>Vous avez aucun message </span> </a> </div>
            </div>
            <form method='post' id='btnTaille' class=' d-flex m-0'>
                <button class='voirPLus rounded-2 rounded border' type='button' id='more'>Messages plus anciens
                </button>
                <input type='hidden' id='tailes' name='limit'>
            </form>

            <div class="overMessage row justify-content-center  align-items-end" id="message">
                <!-- show message -->

            </div>
            <form class='chat-form' action="" id="sendMessage" method="post" enctype="multipart/form-data">
                <input type="hidden" name="destinataire" id="destinataire" value="<?= $destinataire?>">
                <div class="container-input shadow-lg">

                    <div class="files">
                        <label for="fichierMess" title='Choisir une image'><i class="fa fa-image"></i></label>
                        <input type="file" name="fichierMess" id="fichierMess" class="d-none"
                            onchange="showFile(event)">
                    </div>

                    <div class="group-inp">
                        <textarea id="contenuMess" name="contenuMess" placeholder='Ecrire un message...'
                            minlegth="1"></textarea>
                    </div>
                    <button class='submit' type="submit"><i class='fa fa-paper-plane'></i></button>

                </div>
                <img src="" class='imgSend' id='file-preview' alt='photo envoyer'>
            </form>
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
                <i class="fa fa-users "> </i> Mes Interlocuteurs
            </h4>
            <div id="getdernier">
                <!-- there is a function here -->
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="idUser" value="<?= $_SESSION['idUser']?>">
</main>
<!-- link javascript  -->
<script src="<?=EE?>app/plugins/js/customNav.js"></script>
<script>
$('#file-preview').addClass("d-none");

function showFile(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        var output = document.getElementById("file-preview");
        $('#file-preview').removeClass("d-none");
        output.src = dataURL;
    }
    reader.readAsDataURL(input.files[0]);
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

// send Message 
$(document).ready(function() {
    $('#sendMessage').submit(function(event) {
        event.preventDefault();
        var form = $('#sendMessage')[0];
        var data = new FormData(form);
        $.ajax({
            type: "post",
            url: "<?=EE?>Messages/sendMessage",
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(data) {
                const msg = Swal.mixin({
                    toast: true,
                    position: 'bottom',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
                msg.fire({
                    type: 'success',
                    title: 'Message envoié'
                });
                $scrollTo = $(".bas");
            if ($scrollTo.length) {
                $("#message").animate({
                    scrollTop: $scrollTo.offset().bottom
                });
            }
                getMessage();
                $('#contenuMess').val("");
                $('#fichierMess').val("");
                $('#file-preview').addClass("d-none");

            }
        });
    })
});
// 

//  get all messages
function getMessage(limit = '') {
    var dest = parseInt($('#destinataire').val());
    var idUser = parseInt($('#idUser').val());
    let taile = '';
    $.ajax({
        type: "get",
        url: "<?=EE?>Messages/getConversation/" + vicha(<?= $destinataire ?>) + "/" + limit,
        dataType: "json",
        success: function(response) {
            var message = "";
            var photo = null;
            var nom = "";
            let nomDes = "";
            var styleRight = "";
            var date = "";
            var className = "";
            let styleLeft = "";
            let contentClass = '';
            message = message + "<form method='post' id='btnTaille' class=' d-none m-0 '>";
            message = message +
                " <button class='voirPLus rounded-2 rounded border'  type='button' id='more'>Messages plus anciens </button>";
            message = message + "    <input type='hiddens' id='taile' name='limit' value='" + limit +
                "skssksk'>";
            message = message + "    </form>";
            message = message + "<div class='container-fluid'>";
            $.each(response.reverse(), function(key, value) {
                $('#tailes').val(response.length)
                if (idUser === value.idUser) {
                    photo = value.photoUser;
                    nom = "moi";
                    styleRight = "justify-content-end ";
                    date = value.dateMess;
                    className = "partRight ";
                    contentClass = "right";
                    $('#nomDes').html(value.nomDestinataire);
                    $('#PhotoDes').html(
                        "<img class='ImgMes rounded-circle mx-2' src='<?=EE?>app/public/photos/profil/" +
                        value.photoDestinataire + "'>");
                } else {
                    photo = value.photoUser;
                    nom = value.nomsUser;
                    nomDes = value.nomsUser;
                    className = "partLeft ";
                    contentClass = "left";
                    styleLeft = "ml-2 justify-content-start";
                    date = value.dateMess;
                }


                message = message + "<div class='" + styleRight + styleLeft + " '>";
                message = message + "<div class='col-md-5 " + className + "d-flex'>";
                message = message + "<div class='d-flex p-0  my-1 w-100 " + contentClass + "'>";
                message = message + "             <div class=' p-2 shadow-lg contentMess'>"
                message = message + "                   <p class='contenuMess '> " + value
                    .contenuMess + "</p>";
                if (value.fichierMess != null) {
                    message = message + "<p><img src='<?=EE?>app/public/photos/message/" + value
                        .fichierMess + "' class='img-fluid w-100 h-100 ' alt=''/></p>";
                }
                message = message + "  <span class='date'>" + date + "</span>"
                message = message + "</div></div></div></div>";
                photo = null;
                // $('#message').html(message);
            });
            message = message + "<div class='bas'></div>";
            // message=message+ "</div>";
            $('#message').html(message);
            $scrollTo = $(".bas");
            if ($scrollTo.length) {
                $("#message").animate({
                    scrollTop: $scrollTo.offset().bottom
                });
            }
        },
        error: function(error) {
            console.log(error)
        }
    });
}


// interval

// setInterval(() => {
//     getMessage();
// },5000);



getMessage();
$(document).on("click", "#more", function() {
    var dest = parseInt($('#destinataire').val());
    var idUser = parseInt($('#idUser').val());
    let limit = parseInt($('#tailes').val());
    limit = limit + 10
    console.log(limit)
    $.ajax({
        type: "post",
        data: {
            limit: limit
        },
        url: "<?=EE?>Messages/getConversation/" + vicha(<?= $destinataire ?>) + "/" + limit,
        dataType: "json",
        success: function(response) {
            $('#tailes').val(response.length)
            var message = "";
            var photo = null;
            var nom = "";
            let nomDes = "";
            var styleRight = "";
            var date = "";
            var className = "";
            let styleLeft = "";
            let contentClass = '';
            message = message + "<form method='post' id='btnTaille' class=' d-none m-0 '>";
            message = message +
                " <button class='voirPLus rounded-2 rounded border'  type='button' id='more'>Messages plus anciens </button>";
            message = message + "    <input type='hiddens' id='taile' name='limit' value='" + limit +
                "skssksk'>";
            message = message + "    </form>";
            message = message + "<div class='container-fluid'>";
            $.each(response.reverse(), function(key, value) {
                $('#tailes').val(response.length)
                if (idUser === value.idUser) {
                    photo = value.photoUser;
                    nom = "moi";
                    styleRight = "justify-content-end ";
                    date = value.dateMess;
                    className = "partRight ";
                    contentClass = "right";
                    $('#nomDes').html(value.nomDestinataire);
                    $('#PhotoDes').html(
                        "<img class='ImgMes rounded-circle mx-2' src='<?=EE?>app/public/photos/profil/" +
                        value.photoDestinataire + "'>");
                } else {
                    photo = value.photoUser;
                    nom = value.nomsUser;
                    nomDes = value.nomsUser;
                    className = "partLeft ";
                    contentClass = "left";
                    styleLeft = "ml-2 justify-content-start";
                    date = value.dateMess;
                }
                message = message + "<div class='" + styleRight + styleLeft + " '>";
                message = message + "<div class='col-md-5 " + className + "d-flex'>";
                message = message + "<div class='d-flex p-0  my-1 w-100 " + contentClass + "'>";
                message = message + "             <div class=' p-2 shadow-lg contentMess'>"
                message = message + "                   <p class='contenuMess '> " + value
                    .contenuMess + "</p>";
                if (value.fichierMess != null) {
                    message = message + "<p><img src='<?=EE?>app/public/photos/message/" + value
                        .fichierMess + "' class='img-fluid w-100 h-100 ' alt=''/></p>";
                }
                message = message + "  <span class='date'>" + date + "</span>"
                message = message + "</div></div></div></div>";
                photo = null;
                // $('#message').html(message);
            });
            message = message + "<div class='bas'></div>";
            // message=message+ "</div>";
            $('#message').html(message);

        },
    });
})
</script>

<style>
@media screen and (max-width:800px) {
    .barUser {
        display: none;
    }
}
</style>