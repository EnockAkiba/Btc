<?php
class Actualite extends Model{
    protected $idUser;
    protected $idPub;
    protected $titrePub;
    protected $porteePub;
    protected $photoPub;
    protected $fichierPub;
    protected $contenPub;
    protected $datePub;
    public function __construct(){
        $this->getConnection();
        $this->table="actualite";
        
    }

    public function publier($idUser,$titrePub,$photoPub,$fichierPub,$contenPub){
        $tab=$this->callProcedure("CALL procAddActualite(?,?,?,?,?,@res); SELECT @res;",[$idUser,$titrePub,$photoPub,$fichierPub,$contenPub]);
        return $tab;
    }
    public function aimer($idUser,$idPub){
        $tab=$this->callProcedure("CALL procAimer(?,?,@res); SELECT @res",[$idUser,$idPub]);
        return $tab['@res'];
    }
    public function commenter($idPub,$idUser,$contenuCom,$fichierCom){
        $tab=$this->callProcedure("CALL procCommenter(?,?,?,?)",[$idPub,$idUser,$contenuCom,$fichierCom]);
        return $tab;
    }
    public function getCommentaire($idPub, $limit=NULL){

        if($limit===NULL){
            $limit=20;
        }
        $sql="SELECT Com.contenuCom ,Com.idCom,DATE_FORMAT(Com.dateCom, '%d/%m/%Y à %Hh%imin') as dateCom,Com.fichierCom,(SELECT User.nomsUser FROM utilisateur AS User 
        WHERE Com.idUser=User.idUser) AS nomUser,(SELECT User.photoUser FROM utilisateur AS User WHERE Com.idUser=User.idUser) AS photoUser,(SELECT User.idUser 
        FROM utilisateur AS User WHERE Com.idUser=User.idUser) AS idUser   FROM actualite AS A INNER JOIN commenter AS Com on Com.idPub=A.idPub INNER JOIN utilisateur AS User ON User.idUser=Com.idUser WHERE A.idPub=? LIMIT $limit";
        $tab=$this->prepare($sql,[$idPub],false);
        return $tab;
    }

    public function setActualite($titrePub,$contenPub,$idPub){
        $sql="UPDATE ".$this->table ." SET titrePub=?,contenPub=? WHERE idPub=?";
        $this->prepare($sql,[$titrePub,$contenPub,$idPub]);

    }
    public function rechercherActualite($critere){
        $sql='SELECT Act.idPub,Act.titrePub,Act.photoPub,Act.fichierPub, Act.contenPub, User.nomsUser,User.photoUser,User.idUser FROM actualite AS Act INNER JOIN utilisateur AS User ON User.idUser=Act.idUser WHERE titrePub LIKE "%'.$critere.'%"  OR contenPub LIKE "%'.$critere.'%"';
        $tab=$this->prepare($sql,[],false);
        return $tab;
    }
    public function getActualitePrivate($limit=NULL){
        if($limit===NULL){
            $limit=15;
        }
        $sql="SELECT A.idPub,A.titrePub,A.photoPub,A.fichierPub,A.contenPub,User.idUser,User.nomsUser,User.photoUser,DATE_FORMAT(A.datePub, '%d/%m/%Y à %Hh%imin') as datePub,(SELECT COUNT(aimer.idAime) FROM aimer WHERE A.idPub=aimer.idPub ) as aime,(SELECT COUNT(Com.idCom) FROM commenter AS Com WHERE Com.idPub=A.idPub) AS commentaires FROM actualite as A INNER JOIN utilisateur AS User 
        ON A.idUser=User.idUser WHERE A.porteePub='private' ORDER by A.datePub DESC LIMIT $limit";
        $tab=$this->prepare($sql,NULL,false);
        return $tab;
    }
    public function getOneActualite($idPub){
        $sql="SELECT A.idPub,A.titrePub,A.photoPub,A.fichierPub,User.idUser,A.contenPub,User.nomsUser,DATE_FORMAT(A.datePub, '%d/%m/%Y à %Hh%imin') as datePub,(SELECT COUNT(aimer.idAime) FROM aimer WHERE A.idPub=aimer.idPub ) as aime,(SELECT COUNT(Com.idCom) FROM commenter AS Com WHERE Com.idPub=A.idPub) AS commentaires FROM actualite as A INNER JOIN utilisateur AS User 
        ON A.idUser=User.idUser WHERE A.idPub=? ";
        $tab=$this->prepare($sql,[$idPub],true);
        return $tab;
    }

    public function getMention($idUser,$idPub){
        $tab=$this->prepare("SELECT COUNT(aimer.idAime) as nombre FROM aimer  WHERE aimer.idUser=? AND aimer.idPub=?",[$idUser,$idPub]);
        return $tab->nombre;
    }

    public function delete($idPub){
        $sql="DELETE FROM actualite WHERE idPub=?";
        $this->prepare($sql,[$idPub]);
    }

    public function setPrivate($idPub){
        $sql="UPDATE actualite SET porteePub='public' WHERE idPub=?";
        $this->prepare($sql, [$idPub]);
    }

}