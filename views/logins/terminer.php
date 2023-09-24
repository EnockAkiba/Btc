<body class="d-flex justify-content-center align-items-center h-10" style="height:100vh">
    <div class="contenair col-10 col-md-4 ">
        <h2 class="text-center pb-3 text-info">Confirmation du compte</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Code de Confirmation</label>
                <input type="text" class="form-control text-center" name="confirmeComp"
                    value='<?=isset($_POST['confirmeComp'])?$_POST['confirmeComp']:null ?>' />
            </div>
            <div class="form-group">
                <p>Nous venons de vous envoyer le code de Confirmation sur votre adresse mail.</p>
                <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="term-service ">Vérifier votre
                    boite G-mail</a>
                <h6><a href="">je n'ai pas recu de mail</a></h6>
            </div>
            <div class="form-group d-flex justify-content-between">
                <p class="col-0 "></p>
                <?php 
                 if($this->erreur){
                    ?>
                <div class="alert alert-danger mb-0 mt-0 pt-1 b-0">
                    <?=$this->erreur?>
                </div>
                <?php
                 }
                ?>
                <button class="btn btn-primary " name="terminer">Terminer</button>
            </div>
        </form>
        <h6 class="bg-success pb-2 text-white pl-2 pt-2">Etape finale</h6>
    </div>
    </dody>