<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
    <!-- Control sidebar content goes here -->
    <div class="row">
        <div class="col-lg-12 col-sm-6">
            <div class="">
                <div class="bg-dark p-3"><i class="fa fa-users"> </i> Mes Interlocuteurs</div>
                <div class="card-body overflow-auto">
                    <div id="getdernier">
                        <!-- there is a function here -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-6">
            <div class="">
                <div class="bg-dark p-3"><i class="fa fa-users"></i> Utilisateur en ligne</div>
                <div class="card-body overflow-auto">
                    <?php foreach ($this->onLine as $data) { ?>
                    <a href="<?= EE . 'Messages/getIdDestinateurs/' . $this->vicha($data->idUser) ?>" class=''>
                        <div class="conversation mb-2">
                            <div class="headerConversation">
                                <img src="<?= EE . 'app/public/photos/profil/' . $data->photoUser ?>"
                                    class="img-fluid rounded-circle headerImg" srcset=""
                                    style="height:45px; width:45px">
                                <h6><?= $data->nomsUser ?></h6>
                            </div>
                    </a>
                </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022- <?= date('Y') ?> <a href="#">BTC Management</a>.</strong> All rights reserved.
</footer>
<!-- ./wrapper -->
<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script>
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
                            " <div class='conversation mb-3'><a href='<?= EE ?>Messages/getIdDestinateurs/" +
                            value.idUser +
                            "' class='text-decoration-none text-muted'><div class='headerConversation'>";
                        getdernier = getdernier +
                            " <img src='<?= EE ?>app/public/photos/profil/" + value
                            .photoUser + "' class='img-fluid rounded-circle' style='height:45px; width:45px'> ";
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
</script>

<style>
    .headerConversation{
        display: flex;
        align-items: center;
    }
    .headerConversation img{
        box-shadow: 1px  1px 1px 2px gray;
    }
    .headerConversation h6{
        padding: 5px;
        margin-top: 10px;
    }
</style>