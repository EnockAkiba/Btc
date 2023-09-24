<?php
class Bibliotheques extends App{

    protected $onLine;
    protected $error;

    public function __construct(){
        $this->getUser();
        $this->loadModel("Bibliotheque");
        $this->onLine=$this->Bibliotheque->getUserOnLine($_SESSION['idUser']);
               
    }

    public function index(){
        $livres=$this->Bibliotheque->getLivres();
        $this->render("index",compact('livres'));
    }
    
    public function AddLivre(){
        if(isset($_POST)){

            $emplacement=ROOT."app/public/documents/bibliotheque/";

            if(!empty($_POST['nomLivre']) && !empty($_POST['DescriptionLivre']) && !empty($_FILES['fichierLivre']) AND $_FILES['fichierLivre']['error']===0){
                
                $nomLivre=trim($_POST['nomLivre']);
                $DescriptionLivre=nl2br(trim($_POST['DescriptionLivre']));
                $photoLivre="";

                if(isset($_FILES['photoLivre']) AND $_FILES['photoLivre']['error']===0 ){
                    $photoLivre=$this->photoStatement('photoLivre',$emplacement);
                }       
                 
                $fichierLivre=$this->DocStatement('fichierLivre',$emplacement);

                $this->Bibliotheque->addLivre($nomLivre,$DescriptionLivre,$photoLivre,$fichierLivre);
                $this->index();
            }
            else{
                $this->error="complèter tous les champs et vérifier votre PDF ";
            }
        }
    }

}