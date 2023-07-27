<?php
class Acceuils extends App{

    public $promotions;
    public $teachers;
    protected $erreur;

    public function __construct(){
        $this->loadModel("Acceuil");
        $this->promotions=$this->Acceuil->getPromotionEncours();
        $this->teachers=$this->Acceuil->getTeachers();

    }

    public function index(){
        $actualites=$this->Acceuil->getActualitePublic();
        $this->render("index",compact("actualites"));
    }

    public function ContactUs(){

        if( !empty($_POST['gmail']) && !empty($_POST['message']) ){
            $tel=isset($_POST['numero'])?$_POST['numero']:NULL;
            $name=isset($_POST['name'])?$_POST['name']:NULL;
            $message=$_POST['message']." Nom : ".$name."  Tel: ".$tel;
            $this->sendMail(NULL,$message,$_POST['gmail']);    
        }
        else{
           $this->erreur="Completez votre adresse gmail valide sans oublier d'écrire le message";
        }
        $this->index();
    }



    public function profil(){
      $this->render("profilUser");
    }
    public function getTeachers(){
        $teachers=$this->Acceuil->getTeachers();
        $this->render("getTeachers",compact("teachers"));
    }

    public function getActualite($idPub){
        $this->loadModel("Actualite");
        $publication=$this->Actualite->getOneActualite($this->vichuwa($idPub));
        $this->render("getActualite", compact("publication"));
    }

    public function getOnePromotion($idProm){
        
        echo json_encode($this->Acceuil->getOnePromotion($this->vichuwa($idProm)));
    }
    
    public function getOneFomateur($idForm){

        echo json_encode($this->Acceuil->getOneTeacher($this->vichuwa($idForm)));
    }

    // ormalement cette methode doit etre appellee par js, pour ne pas refresh la page
    // et donc elle doit aussi retourner du json
    public function voirPlus($limit=NULL){
        $actualites=$this->Acceuil->getActualitePublic($limit);
        $this->render("index",compact("actualites"));
    }
}