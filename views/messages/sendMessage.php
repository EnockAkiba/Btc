<?php require_once 'views/layouts/header.php'; ?>
<link rel="stylesheet" href="<?= EE ?>app/plugins/css/customUser.css?t=<?= time() ?>">

<div class="row">
    <div class="col-md-9 col-sm-12 p-0 m-0">
        <div class="message">
            <div class="card-header border-bottom mb-1">
                <div class='lien'>
                    <a href="<?= EE ?>Messages" class='text-blue-500 flex'><i class='fa fa-reply'></i> <span id='PhotoDes' id='mt-1'></span><span id='nomDes'>Vous avez aucun message </span>
                    </a>
                </div>
            </div>
            <div class="card mt-1 shadow-none border-2 overMessage">
                <form method='post' id='btnTaille' class=' d-flex m-0'>
                    <button class='voirPLus rounded-2 rounded border' type='button' id='more'>Messages plus anciens
                    </button>
                    <input type='hidden' id='tailes' name='limit'>
                </form>
                <div class=" row justify-content-center  align-items-end" id="message">
                    <!-- show message -->
                </div>
            </div>
            <form class='chat-form' action="" id="sendMessage" method="post" enctype="multipart/form-data">
                <input type="hidden" name="destinataire" id="destinataire" value="<?= $destinataire ?>">
                <div class="container-input shadow-lg">

                    <div class="files">
                        <label for="fichierMess" title='Choisir une image'><i class="fa fa-image"></i></label>
                        <input type="file" name="fichierMess" id="fichierMess" class="d-none" onchange="showFile(event)">
                    </div>

                    <div class="group-inp">
                        <textarea id="contenuMess" name="contenuMess" placeholder='Ecrire un message...' minlegth="1"></textarea>
                    </div>
                    <button class='submit' type="submit"><i class='fa fa-paper-plane'></i></button>

                </div>
                <img src="" class='imgSend' id='file-preview' alt='photo envoyer'>
            </form>
        </div>

    </div>



</div>
</div>

<input type="hidden" id="idUser" value="<?= $_SESSION['idUser'] ?>">
<?php require_once 'views/layouts/footer.php'; ?>

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

    // send Message 
    $(document).ready(function() {
        $('#sendMessage').submit(function(event) {
            event.preventDefault();
            var form = $('#sendMessage')[0];
            var data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= EE ?>Messages/sendMessage",
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
            url: "<?= EE ?>Messages/getConversation/" + vicha(<?= $destinataire ?>) + "/" + limit,
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
                            "<img class='ImgMes rounded-circle mx-2' src='<?= EE ?>app/public/photos/profil/" +
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
                    message = message + "             <div class=' p-2 shadow-md contentMess'>"
                    message = message + "                   <p class='contenuMess '> " + value
                        .contenuMess + "</p>";
                    if (value.fichierMess != null) {
                        message = message + "<p><img src='<?= EE ?>app/public/photos/message/" + value
                            .fichierMess + "' class='img-fluid w-100 h-100 ' alt=''/></p>";
                    }
                    message = message + "  <span class='text-sm'>" + date + "</span>"
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
            url: "<?= EE ?>Messages/getConversation/" + vicha(<?= $destinataire ?>) + "/" + limit,
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
                            "<img class='ImgMes rounded-circle mx-2' src='<?= EE ?>app/public/photos/profil/" +
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
                        message = message + "<p><img src='<?= EE ?>app/public/photos/message/" + value
                            .fichierMess + "' class='img-fluid w-100 h-100 ' alt=''/></p>";
                    }
                    message = message + "  <span class='date text-sm'>" + date + "</span>"
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