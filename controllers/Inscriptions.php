<?php
class Inscriptions extends App{
    
    protected $erreur;
    protected $idUser;
    protected $nomsUser;
    protected $gmail;
    protected $dateNaissUser;
    protected $sexeUser;
    protected $telephoneUser;
    protected $adresseUser;
    protected $username;
    protected $password;
    protected $etatComp;
    protected $confirmeComp;
    protected $idCompt;
    
    protected $onLine;

    public function __construct(){
        $this->idUser=!empty($_SESSION['idUser'])?$_SESSION['idUser']:NULL;
        $this->loadModel("Inscription");
        $this->onLine=$this->Inscription->onLine($this->idUser);

    }
    public function index(){
        $this->render('inscription');                    
    }

    public function cleanMe(){
        $this->render('cleaMe');                    
    }

    public function Inscription(){

        if(isset($_POST['btnInscription'])){
            if(!empty($_POST['nom']) && !empty($_POST['postNom']) && !empty($_POST['gmail']) && !empty($_POST['dateNaissUser']) && !empty($_POST['adresseUser'])
             && !empty($_POST['sexeUser']) && !empty($_POST['telephoneUser']) && !empty($_POST['password'])){
                
                if(strlen($_POST['password'])>6){

                    if($_POST['password']===$_POST['password2']){ 

                        // Traitement de la date de naissance
                        $dateExp=explode('-',$_POST['dateNaissUser']);
                        $annee=$dateExp[0];
                        // ici je dois verifier l'age de l'apprennant 
                        if((int) $annee <= ((int)date('Y'))-4){
                            $this->nomsUser=htmlspecialchars(strip_tags(trim($_POST['nom']))).' '.htmlspecialchars(strip_tags(trim($_POST['postNom'])));
                            $this->gmail= htmlspecialchars(strip_tags(trim($_POST['gmail'])));
                            $this->dateNaissUser=htmlspecialchars(strip_tags(trim($_POST['dateNaissUser'])));
                            $this->sexeUser=htmlspecialchars(strip_tags(trim($_POST['sexeUser'])));
                            $this->telephoneUser=htmlspecialchars(strip_tags(trim($_POST['telephoneUser'])));
                            $this->adresseUser=htmlspecialchars(strip_tags(trim($_POST['adresseUser'])));
                            $this->password=htmlspecialchars(sha1($_POST['password'])); 

                            $inscription=$this->Inscription->saveUser($this->nomsUser,$this->sexeUser,$this->adresseUser,$this->dateNaissUser,$this->gmail,$this->telephoneUser,$this->password);
                            if(empty($inscription['@Erreur'])){
                                
                                $lien="www.btcagaped.com/Inscriptions/activerCompte/". $this->vicha($inscription['@idCompt'])."/".$inscription['@codeConfirme'];
                                $message='
                                    <html>
                                        <head>
                                            <title>Voici votre lien de confirmation</title>
                                        </head>
                                        <body style="margin:5% ;">
                                            <h1 style="font-family: ;">Valider votre adresse e-mail</h2>
                                            <h3>Bonjour</h3>
                                            <p>Cette adresse e-mail est utiliée pour un compte sur BTC-Agapd. 
                                                S\'il s\'agit de vous ou votre enfant veuillez <strong> cliquer </strong> sur le lien ci-dessous pour valider votre adresse e-mail
                                            </p> <br>
                                            <a style="
                                                color: white;
                                                background: rgba(13, 13, 109, 0.603);
                                                padding: 10px 9px;
                                                border-radius: 10px;
                                                margin-left: 20%;
                                                font-family:\'Lucida Sans\', \'Lucida Sans Regular\', \'Lucida Grande\', \'Lucida Sans Unicode\';
                                                text-align: center;
                                                font-weight: bold;
                                                text-decoration: none;
                                            " href="'.$lien.'">Valider votre e-gmail</a> <br>
                                            <p>Merci de votre fidelité</p>
                                        </body>
                                    </html>'
                                ;

                                $this->sendMail($this->gmail, $message);
                                $this->render('passwordConf');
                            }
                            else{
                                $this->erreur=$inscription['@Erreur'];
                            } 
                        }
                        else{
                            $this->erreur="Revennez quand vous aurez 5 ans \r Vous êtes trop jeune";
                        
                        }
                    }
                    else{

                        $this->erreur="Les mots de passe doivent correspondre";
                    }
                }
                else{

                    $this->erreur="le mot de passe doit comporter aumoins sept caractères";
                }                      
            }
            else{
                $this->erreur="Complètez tous les champs obligatoires SVP !!!";

            } 
        }

        $this->render('inscription',['']);

    }

    public function creatUserCompte(){
        // $idEval=!empty($idEval)?$this->vichuwa($idEval):NULL; je ne sais plus a quoi elle sert
        
        if(isset($_POST['btnCompte'])) {
            if(!empty($_POST['username'])&& !empty($_POST['password'])&& !empty($_POST['password2'])){
                if(strlen($_POST['password'])>6){
                    if($_POST['password']===$_POST['password2']){
                        $this->idUser=!empty($idUser)?$idUser:$_SESSION['idUser']; 

                        $this->username=htmlspecialchars(strip_tags($_POST['username'])) ; 
                        $this->password=htmlspecialchars(sha1($_POST['password'])); 
                        $this->confirmeComp="BTC-".$this->idUser."-401";
                        $compte=$this->Inscription->compteSave($this->idUser,$this->username,$this->password,$this->confirmeComp);
                        if($compte['@idCompt']){
                            $idCompt=$_SESSION['idCompt']=$compte['@idCompt'];  
                            $this->sendSMS($_SESSION['telephoneUser'],$this->confirmeComp);
                            $this->render('passwordConf',compact("idCompt"));
                        }
                        else{
                            $this->erreur="Echec de la création du compte";
                        }
                    }
                    else{

                        $this->erreur="Les mots de passe doivent correspondre";
                    }
                }
                else{

                    $this->erreur="le mot de passe doit comporter aumoins sept caractères";
                }
                
            }
            else{   
                $this->erreur="Complètez tous les champs obligatoires";
            }
        }
        $this->render('userCompte',['']);

    }
    // par l'avenir cette methode permettra a un user d'activer son compte
    // tant que un compte ne sera pas active, l'utilisateur sera rediriger vers
    //  la page qui demande de confirmation
    public function activerCompte($idCompt=NULL,$confirmeComp=null){
        
        $this->idCompt=$this->vichuwa($idCompt);
        $this->confirmeComp=$confirmeComp;

        $etatComp=$this->Inscription->compteActive($this->idCompt,$this->confirmeComp);
        if($etatComp['@res']>=1){
            header('location:'.EE.'Logins/seConnecter');
            exit;
        }
        else{
            echo $this->erreur="<h3 class='alert alert-primary'> Problème d'activation de compte </h3>";
        }
        $this->render('passwordConf',['']);
        
    }


    // return les donnees du compte pour les opertion (mod, nomer com admin,..)
    public function getProfil(){
        $profil=$this->Inscription->getProfil($_SESSION['idUser']);
        $profilForm=$this->Inscription->getProfilForm($_SESSION['idForm']);

        $this->render('profilUser', compact("profil","profilForm"));
    }

    public function getProfilForm(){
        $profilForm=$this->Inscription->setProfilForm($_SESSION['idForm']);
        $this->render('profilUser', compact("profilForm"));
    }

    public function setProfil(){
        
        if(!empty($_POST['nomsUser']) && !empty($_POST['sexeUser']) && !empty($_POST['adresseUser'])&& !empty($_POST['dateNaissUser']) 
        && !empty($_POST['gmailUser'])&& !empty($_POST['telUser']) ){
            $this->nomsUser=$_POST['nomsUser'];
            $this->sexeUser=$_POST['sexeUser'];
            $this->adresseUser=$_POST['adresseUser'];
            $this->dateNaissUser=$_POST['dateNaissUser'];
            $this->gmailUser=$_POST['gmailUser'];
            $this->telUser=$_POST['telUser'];
            $this->Inscription->setProfil($this->nomsUser,$this->sexeUser,$this->adresseUser,$this->dateNaissUser,$this->gmailUser,$this->telUser,$this->idUser);
            $erreur="Modifiés avec succes";
        }
        else{
            $erreur="complètez tous les champs svp";
        }

        echo json_encode($erreur);
    }

    public function setProfilForm(){
        if(isset($_POST)){
        $emplacement=ROOT."app/public/photos/formateur/";

            if(isset($_POST['biographieForm']) AND isset($_POST['gmailForm'])){

                $biographieForm=$_POST['biographieForm'];
                $gmailForm=$_POST['gmailForm'];
                
                if(!empty($_FILES['photoForm']) AND $_FILES['photoForm']['error']==0){
                    
                    $photoForm=$this->photoStatement('photoForm',$emplacement);
                   
                }
                else{
                    $photoForm=NULL;
                }
                $this->Inscription->setProfilForm($biographieForm,$photoForm,$gmailForm,$_SESSION['idForm']);
                // echo json_encode("OK");

            }
           
        }
    }
    // cette fonction est pour changer la photo de profil
    public function setPhotoProfil(){

        $emplacement=ROOT."app/public/photos/profil/";
        $idUser=isset($_SESSION['idUser'])?$_SESSION['idUser']:NULL;
        if(empty($idUser)){
            $this->getUser();
        }

        if(isset($_POST) and isset($_FILES['photoUser'])){

            if(isset($_FILES['photoUser']) AND $_FILES['photoUser']['error']==0){
                $_SESSION['photoUser']=$photoUser=$this->photoStatement('photoUser',$emplacement);
                $enciennePhoto=$this->Inscription->setPhotoProfil($photoUser,$idUser);
                // je v verifier s'il yavait une photo avant la supprimer
                if(isset($enciennePhoto['@Photo'])){
                    $this->cleanFichier($emplacement.$enciennePhoto['@Photo']);
                }
                echo json_encode("Ok");
            }
        }

    }

}
