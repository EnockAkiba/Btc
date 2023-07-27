<?php
class Administration extends Model {


    public function __construct(){
        $this->getConnection();

    }

    public function setAdmin($idUser){
        $sql="CALL procSetAdmin(?)";
        $this->callProcedure($sql,[$idUser]);
    }

    public function SetAppariteur($idUser){
        $sql="CALL procSetAppariteur(?)";
        $this->callProcedure($sql,[$idUser]);
    }
    public function blockUser($idUser){
        $sql="CALL procBloqueUser(?)";
        $this->callProcedure($sql,[$idUser]);
    }

    public function deleteUser($idUser){
        $sql="CALL procDELETEUser(?)";
        $this->callProcedure($sql,[$idUser]);
    }

    public function addPromotion($idDepart,$designProm,$prixProm,$dateDebutProm,$dateFinProm){
        $idDepart=trim($idDepart);
        $designProm=htmlspecialchars(strip_tags(trim($designProm)));
        $sql="INSERT INTO promotion (idDepart,designProm,prixProm,dateDebutProm,dateFinProm) VALUES (?,?,?,?,?)";
        $this->prepare($sql,[$idDepart,$designProm,$prixProm,$dateDebutProm,$dateFinProm]);
    }

    public function editPromotion($idDepart,$designProm,$dateDebutProm,$dateFinProm,$idProm){
        $idDepart=trim($idDepart);
        $designProm=htmlspecialchars(strip_tags(trim($designProm)));
        $sql="UPDATE promotion SET idDepart=?,designProm=?,dateDebutProm=?,dateFinProm=? WHERE idProm=?";
        $this->prepare($sql,[$idDepart,$designProm,$dateDebutProm,$dateFinProm,$idProm]);
    }

    public function addDepartememt($designDepart,$descriptionDepart,$photoDepart){
      
        $descriptionDepart=htmlspecialchars(strip_tags($descriptionDepart));
        $sql="INSERT INTO departement (designDepart,descriptionDepart,photoDepart) VALUES (?,?,?)";
        $this->prepare($sql,[$designDepart,$descriptionDepart,$photoDepart]);
    }

    public function terminerProm($idProm){
        $sql="UPDATE promotion SET  dateFinProm = NOW() WHERE idProm=?";
        $this->prepare($sql,[$idProm]);
    }

    public function nommerFormateur($idUser,$idDepart){

        $sql="CALL procAffecterForm(?,?)";
        $this->callProcedure($sql,[$idUser,$idDepart]);
    }

    public function neverInscrit(){
        $sql="SELECT User.idUser,User.nomsUser,User.photoUser,User.sexeUser FROM utilisateur AS User WHERE User.idUser not IN (SELECT idUser from formateur) and User.idUser NOT IN (SELECT IdUser FROM apprenant)";
        $tab=$this->prepare($sql,[],false);
        return $tab;
    }

    public function inscrire($idUser,$idProm,$matriculeIns,$extensionIns,$vacationIns,$nomResp,$numResp){
        $matriculeIns=htmlspecialchars(strip_tags($matriculeIns));
        $extensionIns=htmlspecialchars(strip_tags($extensionIns));
        $vacationIns=htmlspecialchars(strip_tags($vacationIns));
        $nomResp=htmlspecialchars(strip_tags($nomResp));
        $numResp=htmlspecialchars(strip_tags($numResp));

        $sql="CALL procInscrireApp(?,?,?,?,?,?,?)";
        $this->callProcedure($sql,[$idUser,$idProm,$matriculeIns,$extensionIns,$vacationIns,$nomResp,$numResp]);
    }

    public function getPromotionEncours(){
        $sql="SELECT Prom.idProm,Prom.designProm FROM promotion AS Prom WHERE Prom.dateFinProm >= NOW() ORDER BY Prom.idProm DESC";
        $tab=$this->prepare($sql,NULL,false);
        return $tab;
    }

    public function getDepartements(){
        $sql="SELECT Dep.idDepart, Dep.designDepart FROM departement AS Dep ORDER BY Dep.designDepart ASC";
        $tab=$this->prepare($sql,NULL,false);
        return $tab;
    }

    public function getAllFromUser(){
        $sql="SELECT User.idUser, User.nomsUser,User.photoUser,C.etatComp,C.roleUser FROM utilisateur AS User INNER JOIN compte AS C ON C.idUser=User.idUser ORDER by User.nomsUser ASC LIMIT 100";
        $tab=$this->prepare($sql,null,false);
        return $tab;
    }

    public function inscriptionNotDone(){
        $sql="SELECT User.idUser,User.nomsUser,User.sexeUser,User.gmailUser,User.telUser,User.dateCreation from utilisateur AS User WHERE User.idUser NOT IN (SELECT compte.idUser FROM compte) ORDER BY User.dateCreation ";
        $tab=$this->prepare($sql,null,false);
        return $tab;
    }

    public function getlisteInscrit($promotion=null,$extension=NULL){

        $order="";
        $critere="ORDER BY User.nomsUser LIMIT 50 ";
        if($promotion !==NULL and $extension!==NULL){
            $critere="  WHERE Prom.idProm=".$promotion ." AND Ins.extensionIns='".$extension. "'";
            $order=" ORDER BY User.nomsUser";
        }
        else if($promotion !==NULL){
            $critere="  WHERE Prom.idProm=".$promotion;
            $order=" ORDER BY User.nomsUser";

        }
        else if($extension!==NULL){
            $critere="  WHERE extensionIns='".$extension."'";
            $order=" ORDER BY User.nomsUser";
        }

        $sql="SELECT User.idUser, Ins.matriculeIns, User.nomsUser, User.sexeUser,User.telUser, Prom.designProm,Ins.extensionIns  FROM utilisateur AS User INNER JOIN apprenant AS App ON User.idUser=App.idUser INNER JOIN inscrire AS Ins ON App.idApp=Ins.idApp INNER JOIN promotion AS Prom ON Prom.idProm=Ins.idProm $critere ".$order;
        $tab=$this->prepare($sql,null,false);
        return $tab;
    }
    
}
