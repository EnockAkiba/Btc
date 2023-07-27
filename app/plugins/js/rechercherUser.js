function recherche() {
    var utilisateur = $("#utilisateur").val();
    $.ajax({
        type: "post",
        dataType: "json",
        data: {
            utilisateur: utilisateur
        },
        url: 'Messages/rechercherUser',
        success: function(response) {
            console.log(response)
            if (utilisateur != "") {
                var resultat="";
                var lien="ee"
                $.each(response, function(key, value) {

                    resultat = resultat + "<a href=<?= 'EE'?> class='w-100 d-flex lien'>";
                    resultat = resultat + "<div class='conversation d-flex'>";
                    resultat = resultat + "<div class='headerConversation w-100'>";
                    resultat = resultat + "<img src='<?=EE?>app/public/photos/profil/"+value.photoUser+"' class='img-fluid rounded-circle'>";
                    resultat = resultat + "<h6>" + value.nomsUser + "</h6>";
                    resultat = resultat + "</div> </a> </div> ";
                    $('#resultat').html(resultat);
                });
              
            } else {
                $('#resultat').html("<div style='color:red'>aucun resultat</div>");
            }
        },
        error: function(error) {
            console.log(error)
        }
    })
}