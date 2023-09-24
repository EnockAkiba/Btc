<?php

 class App extends Controller {

    // les traitement lies a toute l'apk seront ici

    public function indexa(){
        echo "jsuis executee";
    }

    public function onLine($idUser){
        $tab=$this->getUserOnline($idUser);
        return $tab ;
    }

    public function seDeconnecter(){
        $_SESSION=array();
        session_destroy();

        $this->cleanCookie();
        header('location:'.EE.'Logins');
        exit;

    }
    
    public function cleanCookie(){
        setcookie('userName', NULL);
        setcookie('password', NULL);
    }

    public function sendMail($destinataire="btcagapd-drc@btcagaped.com", $message,$from="btcagapd-drc@btcagaped.com"){
        // Mes paramrtes null doivemt etre remplacer par le compte de btc
        // $entete="FROM :".$from;
        // $entete.=" Cc : btcagapd-drc@btcagaped.com";

        

        $headers = array(
            'From' => $from,
            'MIME-Version' => '1.0',
            'content-type' => 'text/html; charset=utf-8',
            'Content-Transfer-Encoding' => '8bit',
            'Reply-To' => 'btcagapd-drc@btcagaped.com'. '\r\n',
            'Cc'=> 'btcagapd-drc@btcagaped.com',
            'X-Mailer' => 'PHP/' . phpversion()
        );

        if(mail($destinataire,'BTC, Lien de confirmation',$message,$headers)){
            // Message envoye avec succes
        
        }

    }
    public function sendSMS($numero,$code){

        $providers=array('vtext.com','tmomail.net','txt.att.net','mobile.pinger.com','page.nextel.com');
        $message="BTC, Votre code de confirmation est :".$code;

        foreach($providers as $provider){
            if(mail($numero.'@'. $provider ,'',$message)){
                break;
                // le fournisseur a envoye le message
            }
            else{
                // l'envoi a echoue je vais essayer avec un autre fournisseur dams mon tab
                continue;
            }
            break;
        }
    }

    public function cleanFichier($adresse){
        $fichier=$adresse;
        if(file_exists($fichier)){
            unlink($fichier);
        }

    }

    public function photoStatement($photo, $emplacement){
        // ici file est le nom de l'input
        if(isset($_FILES[$photo])){
            $tmpName = $_FILES[$photo]['tmp_name'];

            $name = $_FILES[$photo]['name'];
            $size = $_FILES[$photo]['size'];
            $error = $_FILES[$photo]['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
        
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 20000000;
        
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        
                $uniqueName = uniqid('Img', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                while(file_exists($emplacement.$file)){
                    $file = $uniqueName.".".$extension;
                }

                // ici je vais essayer de reduire la taille de l'image
                // $source=imagecreatefrompng($photo);
                // $image=imagecreatetruecolor(450,150);
                // imagecopystres



                // A cet androit ./photo/ est l'emplacement de ma photo
                move_uploaded_file($tmpName, "$emplacement".$file);

                // echo "Image bien convertie";
            }
            else{
                // echo "Une erreur est survenue";
                $file=NULL;
            }
            return $file;
        }
    }

    public function videoStatement($video, $emplacement){
        // ici file est le nom de l'input
        if(isset($_FILES[$video])){
            $tmpName = $_FILES[$video]['tmp_name'];

            $name = $_FILES[$video]['name'];
            $size = $_FILES[$video]['size'];
            $error = $_FILES[$video]['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
        
            $extensions = ['mp4', 'AVI', 'MKV', 'webm'];
            
            $maxSize = 1000000000; // pour 100mb
            // $maxSize = 20000000; POUR 2MB 
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        
                $uniqueName = uniqid('Img', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                while(file_exists($emplacement.$file)){
                    $file = $uniqueName.".".$extension;
                }

                // A cet androit ./photo/ est l'emplacement de ma photo
                move_uploaded_file($tmpName, "$emplacement".$file);
                // echo "Image bien convertie";
            }
            else{
                // echo "Une erreur est survenue";
                $file=NULL;
            }
            return $file;
        }
    }

    public function DocStatement($doc, $emplacement){
        // ici file est le nom de l'input
        if(isset($_FILES[$doc])){
            $tmpName = $_FILES[$doc]['tmp_name'];

            $name = $_FILES[$doc]['name'];
            $size = $_FILES[$doc]['size'];
            $error = $_FILES[$doc]['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
        
            $extensions = ['pdf', 'txt', 'doc', 'docx'];
            $maxSize = 20000000;
        
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        
                $uniqueName = uniqid('Eval', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                while(file_exists($emplacement.$file)){
                    $file = $uniqueName.".".$extension;
                }

                // A cet androit ./photo/ est l'emplacement de ma photo
                move_uploaded_file($tmpName, "$emplacement".$file);
                // echo "Image bien convertie";
            }
            else{
                // echo "Une erreur est survenue";
                $file=NULL;
            }
            return $file;
        }
    }

    public function vicha($text){
        //CRREE PAR AKIBA WANJUMBI ENOCK
        // les mots a inserer dans la phrase cryotee
        $tCodes=array("BTCXyN","XzKa","3GScZEF","EfPLm0","46AQB5Iu","1DSK");
        
        // va stockes les valeur deja cryptees
        $valCrypto="";
        $tab=array();
    
        // va stockes toutes la chaine cryptee
        $tab2=array();
    
        // cette boucle va me permettre de savoir le nombre de caractere et 
        // les inserer dans un tableau
        for ($i=1; $i <= strlen($text); $i++) { 
            $crypto=substr($text,$i-1,1);
            switch ($crypto) {
                case 0: $valCrypto="B";  break;
                case 1: $valCrypto="E"; break;
                case 2: $valCrypto="F"; break;
                case 3: $valCrypto="Z"; break;
                case 4: $valCrypto="A"; break;
                case 5: $valCrypto="J"; break;
                case 6: $valCrypto="L"; break;
                case 7: $valCrypto="M"; break;
                case 8: $valCrypto="P"; break;
                case 9: $valCrypto="O"; break;
            }
            $tab[$i]=$valCrypto;
        }
    
        // cette boucle va completer $tab2 (tab contient seulement les lettres cryptees )
        for($i=1; $i<=6; $i=$i+1){
    
            if(isset($tab[$i]) ){
               $crypto=$tab[$i];
            }
            else{
                $crypto='r';
            }
            $tab2[$i]=$tCodes[$i-1].$crypto;
        }
        
        return implode('',$tab2);
    
    }
    
    public function vichuwa($text){
    
        //CRREE PAR AKIBA WANJUMBI ENOCK

        // cette variable va stocker la lettre decryptee (autant de fois qu'il faudra decrypter, on va stocker la valeur ici)
        $valdecrypto="";
    
        // ce tableau va contenir la valeur decryptee
        $tab=array();
    
        // ce tableau contient les mots a hometre pour decoder (c'est en qlq sorte la cle unique du cryptage)
        $tCodes=array("BTCXyN","XzKa","3GScZEF","EfPLm0","46AQB5Iu","1DSK");
        
    
        // cette boucle va me permettre de tourner pour enlever la cle et chercher la valeur cryptee 
        for ($i=0; $i <6 ; $i++) { 
         
            // ici jenleve le mot cle qui est dans $tCodes, le caractere suivant est a decoder
            $text=str_replace($tCodes[$i],'',$text);
            
            // $decry contient maintenant le caractere a decoder
            $decry=substr($text,0,1);
    
            // Avant de decoder, je verifie si $decry ne contient pas r (si la valeur a decode est r CAD que j'ai fini a decoder)
            if($decry==='r'){
                break;
            }
            else{
                // ici je cherche la vraie valeur 
                switch ($decry) {
                    case "B": $valdecrypto=0;  break;
                    case "E": $valdecrypto=1; break;
                    case "F": $valdecrypto=2; break;
                    case "Z": $valdecrypto=3; break;
                    case "A": $valdecrypto=4; break;
                    case "J": $valdecrypto=5; break;
                    case "L": $valdecrypto=6; break;
                    case "M": $valdecrypto=7; break;
                    case "P": $valdecrypto=8; break;
                    case "O": $valdecrypto=9; break;
                    default : $valdecrypto=Null;
                }
    
                // ici j'enleve le caractere que je viens de decoder
                $text=substr($text,1,-1)  ;
    
    
            }
            // ici j'affecter la valeur decryptee a mon tableau
            $tab[$i]=$valdecrypto;        
    
        }
        //ici je return un string au lien d'un tableau
      return implode('',$tab);
    }

} 




// Back up
// <?php
	// // On définit les infos de la base de données
	// $host = "localhost"; //nom du serveur MySQL
	// $user = "root"; //nom de l'utilisateur
	// $pass = "";  //son mot de passe
	// $db = "database"; //la base où se connecter
	
	// $date = date("d-m-Y"); // On définit le variable $date (ici, son format)

	// $backup = $db."bdd-backup_".$date.".sql.gz";
	// // Utilise les fonctions système : MySQLdump & GZIP pour générer un backup gzipé
	// $command = "mysqldump -h$host -u$user -p$pass $db | gzip> $backup";
	// system($command);
	// // Démarre la procédure de téléchargement
	// $taille = filesize($backup);
	// header("Pragma: public");
	// header("Expires: 0");
	// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	// header("Cache-Control: public");
	// header("Content-Description: File Transfer");
	// header("Content-Type: application/gzip");
	// header("Content-Disposition: attachment; filename=$backup;");
	// header("Content-Transfer-Encoding: binary");
	// header("Content-Length: ".$taille);
	// @readfile($backup);
	// // Supprime le fichier temporaire du serveur
	// unlink($backup);/
 

