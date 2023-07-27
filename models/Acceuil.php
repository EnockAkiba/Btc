<?php 
class Acceuil extends Model{
    public function __construct(){
        $this->table="actualite";
        $this->getConnection();
    }

    public function getActualitePublic($limit=NULL){
        if($limit===NULL){
            $limit=10;
        }
        $sql="SELECT A.idPub,A.titrePub,A.photoPub,A.fichierPub,A.contenPub,User.nomsUser,DATE_FORMAT(A.datePub, '%d/%m/%Y à %Hh%imin%ss') as datePub,(SELECT COUNT(aimer.idAime) FROM aimer WHERE A.idPub=aimer.idPub ) as aime,(SELECT COUNT(Com.idCom) FROM commenter AS Com WHERE Com.idPub=A.idPub) AS commentaires FROM actualite as A INNER JOIN utilisateur AS User 
        ON A.idUser=User.idUser WHERE A.porteePub='public' ORDER by A.datePub DESC LIMIT $limit";
        $tab=$this->prepare($sql,[],false);
        return $tab;
    }

    public function getPromotionEncours(){
        $sql="SELECT Prom.idProm,Prom.designProm,Prom.prixProm,Prom.dateDebutProm,Prom.dateFinProm,Depart.descriptionDepart, Depart.designDepart,Depart.photoDepart FROM promotion AS Prom INNER JOIN departement AS Depart ON Depart.idDepart=Prom.idDepart WHERE Prom.dateFinProm >= NOW() ORDER BY Prom.idProm DESC";
        $tab=$this->prepare($sql,NULL,false);
        return $tab;
    }

    public function getOnePromotion($idProm){
        $sql="SELECT Prom.idProm,Prom.designProm,Prom.prixProm,Prom.dateDebutProm,Prom.dateFinProm,Depart.descriptionDepart, Depart.designDepart,Depart.photoDepart FROM promotion AS Prom INNER JOIN departement AS Depart ON Depart.idDepart=Prom.idDepart WHERE idProm=?";
        $tab=$this->prepare($sql,[$idProm],false);
        return $tab;
    }

    public function getTeachers(){
        $sql="SELECT User.nomsUser, Form.idForm, User.sexeUser, Form.photoForm,Form.biographieForm,Form.gmailForm FROM utilisateur AS User INNER JOIN formateur AS Form ON Form.idUser=User.idUser";
        $tab=$this->prepare($sql,NULL,false);
        return $tab;
    }

    public function getOneTeacher($idForm){
        $sql="SELECT User.nomsUser, Form.photoForm,Form.biographieForm,Form.gmailForm FROM utilisateur AS User INNER JOIN formateur AS Form ON Form.idUser=User.idUser Where Form.idForm=?";
        $tab=$this->prepare($sql,[$idForm],false);
        return $tab;
    }
    
    
}