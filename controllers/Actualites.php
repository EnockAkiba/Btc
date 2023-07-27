<?php
class Actualites extends App{

    protected $datas;
    protected $erreur;
    protected $idUser;
    protected $idPub;
    protected $titrePub;
    protected $porteePub;
    protected $photoPub;
    protected $fichierPub;
    protected $contenPub;
    protected $datePub;
    protected $onLine;


    public function __construct(){
        $this->getUser();
        $this->idUser=$_SESSION['idUser'];
        $this->loadModel("Actualite");  
        $this->onLine=$this->Actualite->getUserOnline($_SESSION['idUser']);
    }

    public function index(){
        $actualites=$this->Actualite->getActualitePrivate();
        $this->render("homeUser", compact("actualites"));
    }

    public function commenter($idPub){
        $this->idPub=$this->vichuwa($idPub);

        if(isset($_POST)){
            if(!empty($_POST['contenuCom'])){
                $this->contenuCom=htmlspecialchars(strip_tags(trim(nl2br($_POST['contenuCom']))));
                $this->Actualite->commenter($this->idPub,$this->idUser,
                $this->contenuCom,$this->fichierCom);
            }
        }
        
    }

    public function getActualite($idPub){

        $this->idPub=$this->vichuwa($idPub);

        $actualite=$this->Actualite->getOneActualite($this->idPub);
        $commentaires=$this->Actualite->getCommentaire($this->idPub);
        $this->render("getActualite",compact('actualite','commentaires'));

    }

    public function aimer($idPub){
        $this->idPub=$idPub;
        echo json_encode($this->Actualite->aimer($this->idUser,$this->idPub));
    }

    public function publier(){

        $emplacementF=ROOT."app/public/photos/publication/";
        $emplacementV=ROOT."app/public/videos/actualites/";

        if(isset($_POST['btnPublier'])){
            if(!empty($_POST['titrePub']) && !empty($_POST['contenPub'])){
                $this->titrePub= htmlspecialchars( strip_tags(addslashes(trim($_POST['titrePub']))));
                $this->contenPub=htmlspecialchars(strip_tags(addslashes(trim(nl2br($_POST['contenPub'])))));
                $this->photoPub='photoPub';
                $this->fichierPub='fichierPub';

                // Le traitement de la photo

                if(isset($_FILES[$this->photoPub]) AND $_FILES[$this->photoPub]['error']==0){
                    $this->photoPub=$this->photoStatement($this->photoPub,$emplacementF);
                }
                else{
                    $this->photoPub=NULL;
                }

                if(isset($_FILES[$this->fichierPub]) AND $_FILES[$this->fichierPub]['error']==0){
                    $this->fichierPub=$this->videoStatement($this->fichierPub,$emplacementV);
                }
                else{
                    $this->fichierPub=NULL;
                }

                // ici je dois traiter aussi le fichier video
                $this->Actualite->publier($this->idUser,$this->titrePub,$this->photoPub,$this->fichierPub,$this->contenPub);
                // $this->render('sendActualite');
                $this->index();

            }
            else{
                $this->erreur="Completer les champs essentiels";
            }

        }
        else
        {
            $this->render('sendActualite',['']);
        }   
    }

    // cette methode va permettre d'afficher l'actualite pour la modifier
    public function setActualite($idPub){

        $this->idPub=$this->vichuwa($idPub);
        $publication=$this->Actualite->getOneActualite($this->idPub);

        $this->render("sendActualite",compact('publication'));

    }

    public function rechercher(){
        if(isset($_POST['critere'])){
            $actualites=$this->Actualite->rechercherActualite(htmlspecialchars(strip_tags($_POST['critere'])));
            echo json_encode($actualites);
        }
    }

    public function getMention($idPub){

        $this->idPub=$idPub;

        $mention=$this->Actualite->getMention($_SESSION['idUser'],$this->idPub);
        if($mention>=1){
            $mention=true;
        }
        else{
            $mention=false;
        }
        return $mention;
    }

    public function delete($idPub){
        $this->idPub=$this->vichuwa($idPub);
        $actualite=$this->Actualite->getOneActualite($this->idPub);
        
        // Pour supprimwer la photo
        if(!empty($actualite->photoPub)){
            $emplacement=ROOT."app/public/photos/publication/";

            $this->cleanFichier($emplacement.$actualite->photoPub);

        }
        // la video
        if(!empty($actualite->fichierPub)){
            $emplacement=ROOT."app/public/videos/actualites/";
            $this->cleanFichier($emplacement.$actualite->fichierPub);

        }
        $this->Actualite->delete($this->idPub);
        $this->index();      
    }

    public function setIsPrivate($idPub){

        $this->Actualite->setPrivate($this->vichuwa($idPub));
        $this->index();
        
    }

    public function modification(){
        if(isset($_POST)){

            if(!empty($_POST['titrePub']) AND !empty($_POST['contenPub'])){

                $this->titrePub= nl2br(htmlspecialchars(strip_tags(trim($_POST['titrePub']))));
                // $this->photoPub=$_POST['photoPub']; pour l'instant on ne vas pas modifier de photo
                $this->contenPub=nl2br(htmlspecialchars(strip_tags(trim($_POST['contenPub']))));

                $this->Actualite->setActualite($this->titrePub,$this->contenPub,$_POST['idPub']);

                $this->index();

            }
            else{
                $this->erreur="completer les champs";
            }
            $this->render('sendActualite');

        }
    }

    public function voirPlus($limit=NULL){
        $actualites=$this->Actualite->getActualitePrivate($limit);
        $this->render("homeUser", compact("actualites"));
    }

}