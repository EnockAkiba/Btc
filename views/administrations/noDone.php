<?php require_once 'views/layouts/header.php'; ?>

<div class="row mt-2 p-2">
    <div class="col-md-12 col-sm-6 ">
        <div class="card shadow-none">
            <div class="d-flex justify-content-between bg-light p-1">
                <h5 class='ml-3'><i class='fa fa-users'></i> utilisateurs</h5>
                <div class="mr-2 btn btn-info">
                    <a href="<?= EE ?>Administrations/nonAchever" class="lien"><i class='fa fa-refresh'></i></a>
                </div>
            </div>
            <div class="card-body overflow-auto mt-2 p-0">
                <table class="table table-hover table-responsive-sm table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <!-- <th>Photo</th> -->
                            <th>Noms complet</th>
                            <th>sexeUser</th>
                            <th>Téléphone</th>
                            <th>Gmail</th>
                            <th>Date Création</th>
                            <th>Supprimer</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr id='data'>
                            <?php 
                            foreach($utilisateurs as $data){
                            ?>
                            <td>
                                <a href='<?= EE ?>Messages/getIdDestinateurs/<?= $this->vicha($data->idUser) ?>'
                                    class="btn"><?= $data->nomsUser ?></a>
                            </td>
                            <td class="h6"><?= $data->sexeUser ?></td>
                            <td><?= $data->telUser ?></td>
                            <td><?= $data->gmailUser ?></td>
                            <td><?= $data->dateCreation ?></td>
                            <td>
                                <button type="button" onclick="deleteUser('<?= $data->idUser ?>');"
                                    class="btn border btnColor shadow-sm"><img src="<?= icone ?>icons8_Trash_Can_16.png"
                                        alt="supprimer"></button>
                            </td>
                        </tr>

                        <!-- Modal d'inscription -->

                        <?php }?>
                    </tbody>
                    <style>
                        #headerApp img {
                            width: 40px;
                            height: 40px;
                        }
                    </style>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<!-- link javascript  -->

<script src="<?= EE ?>app/plugins/js/customNav.js"></script>
<script>
    // delete un compte
    function deleteUser(idUser) {
        console.log(idUser);
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

   
</script>
<?php require_once 'views/layouts/footer.php'; ?>
