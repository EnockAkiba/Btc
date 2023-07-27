$('#menu-btn').click(function(){
    $('#headerUser').addClass('active')
})
$('#menu-close').click(function(){
    $('#headerUser').removeClass('active')
})



// function crypt
function vicha(text){
    var tex=text+'';
    //CRREE PAR AKIBA WANJUMBI ENOCK
    // les mots a inserer dans la phrase cryotee
    var tCodes=["BTCXyN","XzKa","3GScZEF","EfPLm0","46AQB5Iu","1DSK"];
    
    // va stockes les valeur deja cryptees
    var valCrypto="";
    var tab=[];

    // va stockes toutes la chaine cryptee
    var tab2=[];

    // cette boucle va me permettre de savoir le nombre de caractere et 
    // les inserer dans un tableau
    for (var i=1; i <= tex.length; i++) { 

        var crypto=tex.substr(i-1,1);

        switch (parseInt(crypto)) {
            case 0: valCrypto="B";  break;
            case 1: valCrypto="E"; break;
            case 2: valCrypto="F"; break;
            case 3: valCrypto="Z"; break;
            case 4: valCrypto="A"; break;
            case 5: valCrypto="J"; break;
            case 6: valCrypto="L"; break;
            case 7: valCrypto="M"; break;
            case 8: valCrypto="P"; break;
            case 9: valCrypto="O"; break;
        }
         tab[i]=valCrypto;
    }

    // cette boucle va completer $tab2 (tab contient seulement les lettres cryptees )
    for(var i=1; i<=6; i=i+1){

        if(tab[i]){
           crypto=tab[i];
        }
        else{
            crypto='r';
        }
        tab2[i]=tCodes[i-1]+crypto;
    }
    
    return tab2.join('');

}


