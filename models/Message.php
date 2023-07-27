<?php
class Message extends Model{

    public $table;
    protected $idUser;
    protected $destinataire;
    protected $fichierMess;
    protected $contenuMess;

    public function __construct(){
        $this->getConnection();
        $this->table="message";
    }
    public function sendMessage($idUser,$destinataire,$fichierMess,$contenuMess){
        $this->contenuMess=addslashes($contenuMess);
        $sql="CALL procSetMessage(?,?,?,?)";
        $this->callProcedure($sql,[$idUser,$destinataire,$fichierMess,$this->contenuMess]);
    }

    public function getDerniersSms($idUser,$limit=NULL){
        if($limit===NULL){
            $limit=30;
        }

        $sql="SELECT User.idUser, User.nomsUser,User.photoUser ,Mes.contenuMess,Mes.fichierMess,Mes.dateMess, (SELECT nomsUser FROM utilisateur WHERE idUser=Mes.destinataire)as 
        nomDestinateur from message as Mes INNER JOIN utilisateur AS User on Mes.idUser=User.idUser WHERE Mes.destinataire=? GROUP BY Mes.idUser
   ORDER by Mes.idMess DESC LIMIT ".$limit;
        $tab=$this->prepare($sql,[$idUser],false);
        return $tab;    
    }
    public function getLastConversation($idUser,$destinataire,$limit=NULL){

        if($limit===NULL){
            $limit=20;
        }
        
        $sql="select User.idUser, User.photoUser, User.nomsUser,Mes.contenuMess,Mes.fichierMess,DATE_FORMAT(Mes.dateMess, '%d/%m/%Y à %Hh%imin%ss') AS dateMess, (SELECT nomsUser FROM utilisateur WHERE utilisateur.idUser=Mes.destinataire)as 
            nomDestinataire,(SELECT photoUser FROM utilisateur WHERE utilisateur.idUser=Mes.destinataire)as 
            photoDestinataire from message as Mes INNER JOIN utilisateur AS User on Mes.idUser=User.idUser WHERE 
            (Mes.idUser=? AND Mes.destinataire=?) OR (Mes.destinataire=? AND Mes.idUser=?)
            ORDER by Mes.dateMess DESC LIMIT ".$limit;
        $tab=$this->prepare($sql,[$idUser,$destinataire,$idUser,$destinataire],false);
        return $tab;
    }
    public function rechercherSms($critere){
        $messages=$this->rechercher('contenuMess',$critere);
        return $messages;
    }
    
    public function getDestinateurs(){
        $tab=$this->prepare("SELECT * FROM getDestinateur",NULL,false);
        return $tab;
    }
    public function rechercherUser($critere){
        $this->table="utilisateur";
        $tab=$this->rechercher('nomsUser',$critere);
        return $tab;
    }

    public function getNewMessage($idUser){
        $sql="SELECT COUNT(*) as messages  FROM message WHERE message.lu='non' AND message.destinataire=?";
        $tab=$this->prepare($sql,[$idUser],false);
        return $tab;
    }

    public function readNewMessage($idUser){
        $sql="UPDATE ".$this->table. " SET lu='oui' WHERE destinataire=?";
        $this->prepare($sql,[$idUser]);
    }

    public function onLine($idUser){
        $tab=NULL;
        if(!empty($idUser)){
            $tab=$this->getUserOnline($idUser);
        }
        return $tab ;
    }


}