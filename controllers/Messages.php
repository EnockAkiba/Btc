<?php
class Messages extends App{

    protected $onLine;
    
    public function __construct(){
        $this->getUser();
        $this->loadModel('Message');
        $this->onLine=$this->Message->onLine($_SESSION['idUser']);

    }

    public function index(){
        $destinataire=$this->Message->getDestinateurs();
        $onLine=$this->onLine;
        $this->render('index',compact("destinataire","onLine"));
    }
    public function sendMessage(){
        $emplacement=ROOT."app/public/photos/message/";

        if(!empty($_POST['destinataire']) AND (isset($_FILES['fichierMess']) OR isset($_POST['contenuMess']))){
            $idUser=$_SESSION['idUser'];
            $destinataire=htmlspecialchars(strip_tags(trim($_POST['destinataire'])));
            $contenuMess=isset($_POST['contenuMess']) ? nl2br(htmlspecialchars(strip_tags($_POST['contenuMess']))) :NULL ;
            if(isset($_FILES['fichierMess']) AND $_FILES['fichierMess']['error']==0){
                $fichierMess=$this->photoStatement('fichierMess',$emplacement);
            }
            else{
                $fichierMess=NULL;
            }
            $this->Message->sendMessage($idUser,$destinataire,$fichierMess,$contenuMess);
            echo json_encode('succes');
        }
    }
    
    public function getdernier(){

        if(isset($_POST['limit'])){
            $limit=$_POST['limit'];
        }
        else{
            $limit=NULL;
        }

        $messages=$this->Message->getDerniersSms($_SESSION['idUser'],$limit);
        echo json_encode($messages);
    }
    public function getDestinateurs(){
        $destinataire=$this->getDestinateurs();
        echo json_encode($destinataire);
    }

    public function getConversation($destinataire,$limit){

        if(!empty($limit)){
            $limit=$limit;
        }
        else{
            $limit=NULL;
        }
        $messages=$this->Message->getLastConversation($_SESSION['idUser'], $this->vichuwa($destinataire),$limit);
        $this->luMessages();
        echo json_encode($messages);
    }
    public function getIdDestinateurs($destinataire){

        $destinataire=$this->vichuwa($destinataire);

        $onLine=$this->Message->onLine($_SESSION['idUser']);
        $this->render('sendMessage',compact("destinataire","onLine"));
    }
    public function rechercher(){
        if($_POST['critere']){
            $critere=htmlspecialchars( strip_tags($_POST['critere']));
            $messages=$this->Message->rechercherSms('contenuMess',$critere);
            echo json_encode($messages);
        }
    }
    public function rechercherUser(){
        if($_POST['critere']){
            $critere=htmlspecialchars( strip_tags($_POST['critere']));
            $utilisateur=$this->Message->rechercherUser($critere);
            echo json_encode($utilisateur);
        }
    }

    public function checkNewMessage(){
        echo json_encode($this->Message->getNewMessage($_SESSION['idUser']));
    }

    public function luMessages(){
        $this->Message->readNewMessage($_SESSION['idUser']);
    }

    public function getUserOnline(){
       echo json_encode($this->onLine=$this->Message->onLine($_SESSION['idUser']));
    }
}
