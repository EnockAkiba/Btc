<?php
class Administrations extends App {

   protected $onLine;

    public function __construct(){
        $this->getUser();
        if($_SESSION['roleUser']!='admin' AND $_SESSION['roleUser']!='appariteur'){
            $this->render("notAdmin");
        }
        $this->loadModel("Administration");
        $this->onLine=$this->Administration->getUserOnline($_SESSION['idUser']);

    }

    public function index(){ 

        $nonInscrit=$this->Administration->neverInscrit();
        $promotions=$this->Administration->getPromotionEncours();
        $departements=$this->Administration->getDepartements();
        $this->render("index", compact("nonInscrit","promotions","departements"));

    }

    // CETTE function me permet d'appeler la page qui fait l'inscription, le departememt
    public function addOther(){

        $this->Administration->table="promotion";
        $promotions=$this->Administration->getAll();
        $departements=$this->Administration->getDepartements();
        $nonInscrit=$this->Administration->neverInscrit();
        $this->render("addOther",compact("nonInscrit","promotions","departements"));
    }

    public function affectationForm(){

        if(!empty($_POST['idUser']) AND !empty($_POST['idDepart']) ){
            $idUser=$_POST['idUser'];
            $idDepart=$_POST['idDepart'];
            $this->Administration->nommerFormateur($idUser,$idDepart);
            echo json_encode("Ok");
        }
    }

    // pour nommer ou denommer un admin
    public function setAdmin($idUser){
        $idUser=$this->vichuwa($idUser);
        $this->Administration->setAdmin($idUser);
        echo json_encode("OK");
    }

    // pour nommer ou denommer un appariteur
    public function setAppariteur($idUser){
        $idUser=$this->vichuwa($idUser);
        $this->Administration->SetAppariteur($idUser);
        echo json_encode("OK");
    }

    public function editPromotion(){

        if(!empty($_POST['idDepart']) AND !empty($_POST['designProm']) AND !empty($_POST['dateDebutProm']) AND !empty($_POST['dateFinProm']) AND !empty($_POST['idProm']) ){

            $idProm=$_POST['idProm'];
            $idDepart=$_POST['idDepart'];
            $designProm=htmlspecialchars(strip_tags(trim($_POST['designProm'])));
            $dateDebutProm=$_POST['dateDebutProm'];
            $dateFinProm=$_POST['dateFinProm'];
            if($dateDebutProm < $dateFinProm){
                $this->Administration->editPromotion($idDepart,$designProm,$dateDebutProm,$dateFinProm,$idProm);
                echo json_encode("OK");
            }
            else{
                echo json_encode("la dete du debut doit etre superieure");
            }

        }
    }

    public function userBloque($idUser){

        $idUser=$this->vichuwa($idUser);
        $this->Administration->blockUser($idUser);
        echo json_encode("OK");
    }

    public function deleteUser($idUser){
        $idUser=$this->vichuwa($idUser);
        $this->Administration->deleteUser($idUser);
        echo json_encode("OK");
    }

    public function inscrire(){
        if(isset($_POST)){
            if(!empty($_POST['idUser']) AND !empty($_POST['idProm']) AND !empty($_POST['matriculeIns'])
                AND !empty($_POST['extensionIns']) AND !empty($_POST['vacationIns']) )
            {
                $idUser=$_POST['idUser'];
                $idProm=$_POST['idProm'];
                $matriculeIns=$_POST['matriculeIns'];
                $extensionIns=$_POST['extensionIns'];
                $vacationIns =$_POST['vacationIns'];
                $nomResp =isset($_POST['nomResp'])? $_POST['nomResp']:NULL;
                $numResp=isset($_POST['numResp'])?  $_POST['numResp']:NULL;
                $this->Administration->inscrire($idUser,$idProm,$matriculeIns,$extensionIns,$vacationIns,$nomResp,$numResp);
            }

        }
    }

    public function gestionUser(){

        $utilisateurs=$this->Administration->getAllFromUser();
        $this->render("userManager", compact("utilisateurs"));
    }

    public function ajouterPromotion(){

        if(!empty($_POST['idDepart']) AND !empty($_POST['designProm']) AND !empty($_POST['dateDebutProm'])AND !empty($_POST['dateFinProm']) AND !empty($_POST['prixProm'])){
            
            $idDepart=$_POST['idDepart'];
            $designProm=htmlspecialchars(strip_tags(trim($_POST['designProm'])));
            $prixProm=htmlspecialchars(trim($_POST['prixProm']));
            $dateDebutProm=$_POST['dateDebutProm'];
            $dateFinProm=$_POST['dateFinProm'];

            if($dateDebutProm < $dateFinProm){        
                $this->Administration->addPromotion($idDepart,$designProm,$prixProm,$dateDebutProm,$dateFinProm);
                echo json_encode("OK");
            }
            else{
                echo json_encode("la dete du debut doit etre superieure");

            }
        }

    }

    public function ajouterDepartement(){

        if(!empty($_POST['designDepart']) AND !empty($_POST['descriptionDepart']) ){
            $emplacement=ROOT."app/public/photos/img/";

            if(isset($_FILES['photoDepart']) && $_FILES['photoDepart']['error']==0){
                $photoDepart=$this->photoStatement('photoDepart',$emplacement);
                $designDepart=htmlspecialchars(strip_tags(trim($_POST['designDepart'])));
                $descriptionDepart=nl2br($_POST['descriptionDepart']);
                $this->Administration->addDepartememt($designDepart,$descriptionDepart,$photoDepart);
                echo json_encode("OK");
            }
        }

    }

    public function terminerProm(){

        if(!empty($_POST['idProm'])){

            $idProm=$_POST['idProm'];
            $this->Administration->terminerProm($idProm);
            echo json_encode("OK");
        }
    }

    public function rechercher(){
        if(!empty($_POST['critere'])){
            $this->Administration->table="utilisateur";
            $critere=htmlspecialchars(strip_tags($_POST['critere']));
            echo json_encode($this->Administration->rechercher('nomsUser',$critere));

        }
    }

    public function getListe(){

        $idProm=isset($_POST['idProm'])?$_POST['idProm']:NULL;
        $extensionIns=isset($_POST['extensionIns'])?$_POST['extensionIns']:NULL;

        $apprennant=$this->Administration->getlisteInscrit($idProm,$extensionIns);
        echo json_encode($apprennant);
    }

    public function noDone(){
        $utilisateurs=$this->Administration->inscriptionNotDone();
        $this->render("noDone", compact("utilisateurs"));
    }

}