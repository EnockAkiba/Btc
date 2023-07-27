<link rel="stylesheet" href="<?=EE?>app/plugins/css/getActualite.css?t=<?= time()?>">
<header id="header" class='d-flex justify-content-between p-2'>
    <div class="logo d-flex  w-25">
        <a class="navbar-brand" href="<?=EE?>Acceuils/index"><span class="text-success"> <img
                    src="<?=EE?>app/public/photos/img/logo.png" class="logo" alt="...">
            </span>
        </a>
        <div class="d-flex flex-column lien">
            <h6 class="mt-2 d-none d-md-inline-block"> Brotherly Training Center/ <span class='text-primary'>BTC</span>
            </h6>
            <span class='text-primary mt-2 d-md-none'>BTC</span>
            <span>AGAPD/Asbl</span>
        </div>
    </div>
    <div class="back">
        <a href="<?=EE?>Acceuils/index" class='btn'> <i class='fa fa-home'></i> Acceuil</a>
    </div>
</header>

<section id="about">
    <div class="container-lg">
        <div class=" row justify-content-center align-items-center">
            <div class="containerTime col-md-12 col-lg-12 col-sm-12 ">
                <div class="marketing p-2">
                    <div class="col-sm-11 d-flex justify-content-center mx-auto">
                        <!-- Three columns of text below the carousel -->
                        <div class="row justify-content-center">
                            <?php 
                             foreach($teachers as $teacher){
                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="shadow-lg p-4 profile">
                                    <div class=" text-center">
                                        <img src="<?=EE?>app/public/photos/formateur/<?=$teacher->photoForm?>" alt=""
                                            srcset="" class="rounded-circle img-fluid cardImg">
                                        <h6 class="text-dark mt-4"><?=$teacher->nomsUser?></h6>
                                        <div class="pro-link">
                                            <i class="fab fa-facebook-f"></i>
                                            <i class="fab fa-instagram"></i>
                                            <i class="fab fa-linkedin-in"></i>
                                        </div>
                                    </div>
                                    <span class='bt btn border p-2 m-3 text-primary' data-toggle="modal" onclick="getOneFomateur(<?=$teacher->idForm?>)" data-target="#modelId">
                                    Voir plus</span>
                                </div>
                            </div>
                            <?php }?>
                        </div><!-- /.row -->

                        <!-- Modal -->
                        <div class="modal fade mt-5 pt-5" id="modelId" tabindex="11111111" role="dialog"
                aria-labelledby="modelTitleId" aria-hidden="true">

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-outline-success m-1 d-inline-block " data-dismiss="modal">fermer</button>
                                    </div>
                                    <div class="shadow-lg p-3 profile">
                                        <div class=" text-center">
                                            <span id='photoForm'>
                                            </span>
                                           
                                            <h6 class="text-dark mt-2" id='nomsUser'></h6>
                                            <p class="text-muted text-left" id='biographieForm'></p>
                                            <div class="pro-link">
                                                <i class="fab fa-facebook-f"></i>
                                                <i class="fab fa-instagram"></i>
                                                <i class="fab fa-linkedin-in"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function getOneFomateur(idForm){
        $.ajax({
        type: "get",
        dataType: "json",
        url: "<?=EE?>Acceuils/getOneFomateur/" + vicha(idForm),
        success: function(response) {
            $.each(response, function(key, value) {
                console.log(value);
                $('#photoForm').html("<img src='<?=EE?>app/public/photos/formateur/"+value.photoForm+"' class='rounded-circle img-fluid cardImg'>");
                $('#biographieForm').html(value.biographieForm);
                $('#nomsUser').html(value.nomsUser);
            });
        }
    });
    }
</script>