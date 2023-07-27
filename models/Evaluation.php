<?php

class Evaluation extends Model{
    protected $idIns;
    protected $idEval;
    protected $contenuPart;
    protected $fichierPart;
    protected $idForm;
    protected $idProm;
    protected $dateDebutEval;
    protected $dateFinEval;

    public function __construct(){
        $this->table="evaluation";
        $this->getConnection();
    }

    public function participer($idIns,$idEval,$contenuPart,$fichierPart){
        $this->idIns= htmlspecialchars(strip_tags(trim($idIns)));
        $this->idEval =htmlspecialchars(strip_tags(trim($idEval)));
        $this->contenuPart =htmlspecialchars(strip_tags(trim($contenuPart)));
        $this->fichierPart=htmlspecialchars(strip_tags(trim($fichierPart))) ;
        $sql="CALL procParticiperEval(?,?,?,?)";
        $this->callProcedure($sql,[$this->idIns,$this->idEval,$this->contenuPart,$this->fichierPart]);
    }

    public function getEvaluationEncours($idProm){
        $sql="SELECT Eval.idEval,Eval.contenuEval, Eval.fichierEval,Eval.dateDebutEval, Eval.dateFinEval,(SELECT nomsUser FROM formateur 
        INNER JOIN utilisateur WHERE formateur.idUser=utilisateur.idUser AND Eval.idForm=formateur.idForm) as nomsUser,
        (SELECT formateur.idUser FROM formateur WHERE Eval.idForm=formateur.idForm) as idUser,(SELECT photoForm FROM formateur 
        WHERE Eval.idForm=formateur.idForm) as photoForm  FROM evaluation AS Eval INNER JOIN formateur ON formateur.idForm=Eval.idForm 
        WHERE Eval.idProm=? and Eval.dateFinEval >= NOW()";
        $tab=$this->prepare($sql,[$idProm],false);
        return $tab;
    }   
    public function getEvaluationRater($idIns,$idProm){
        $sql="SELECT Eval.idEval,Eval.contenuEval, Eval.fichierEval,Eval.dateDebutEval, Eval.dateFinEval,(SELECT nomsUser FROM formateur INNER JOIN utilisateur 
        WHERE formateur.idUser=utilisateur.idUser AND Eval.idForm=formateur.idForm) as nomsUser,(SELECT formateur.idUser FROM formateur 
        WHERE Eval.idForm=formateur.idForm) as idUser,(SELECT photoForm FROM formateur WHERE Eval.idForm=formateur.idForm) as photoForm  FROM evaluation AS Eval 
        INNER JOIN formateur ON formateur.idForm=Eval.idForm WHERE NOT EXISTS(SELECT * FROM participer AS Part WHERE Part.idEval=Eval.idEval AND Part.idIns=? ) And Eval.idProm=? AND  Eval.dateFinEval < NOW()";
        $tab=$this->prepare($sql,[$idIns,$idProm],false);
        return $tab;
    }
    public function getEvaluationTerminer($idIns,$idProm){
        $sql="SELECT Eval.idEval,Eval.contenuEval, Eval.fichierEval,Eval.dateDebutEval, Eval.dateFinEval,(SELECT nomsUser FROM formateur INNER JOIN utilisateur 
        WHERE formateur.idUser=utilisateur.idUser AND Eval.idForm=formateur.idForm) as nomsUser,(SELECT formateur.idUser FROM formateur 
        WHERE Eval.idForm=formateur.idForm) as idUser,(SELECT photoForm FROM formateur WHERE Eval.idForm=formateur.idForm) as photoForm  FROM evaluation AS Eval 
        INNER JOIN formateur ON formateur.idForm=Eval.idForm WHERE EXISTS(SELECT * FROM participer AS Part WHERE Part.idEval=Eval.idEval AND Part.idIns=? ) And Eval.idProm=? ";
        $tab=$this->prepare($sql,[$idIns,$idProm],false);
        return $tab;
    }

    public function getOneEvaluation($idEval){
        $sql="SELECT Eval.idEval,Eval.contenuEval, Eval.fichierEval,Eval.dateDebutEval, Eval.dateFinEval,(SELECT nomsUser FROM formateur INNER JOIN utilisateur 
        WHERE formateur.idUser=utilisateur.idUser AND Eval.idForm=formateur.idForm) as nomsUser,(SELECT formateur.idUser FROM formateur 
        WHERE Eval.idForm=formateur.idForm) as idUser,(SELECT photoForm FROM formateur WHERE Eval.idForm=formateur.idForm) as photoForm  FROM evaluation AS Eval 
        INNER JOIN formateur ON formateur.idForm=Eval.idForm  where Eval.idEval=".$idEval;
        $tab=$this->prepare($sql,null);
        return $tab;
    }

    public function getAllParticipation($idEval){
        $sql="SELECT User.idUser,User.nomsUser, User.photoUser, Part.contenuPart,Part.fichierPart,Part.datePart FROM participer AS Part INNER JOIN inscrire AS Ins 
        ON Ins.idIns=Part.idIns INNER JOIN  apprenant AS App ON App.idApp=Ins.idApp INNER JOIN utilisateur AS User On User.idUser=App.idUser WHERE Part.idEval=?";
        $tab=$this->prepare($sql,[$idEval],false);
        return $tab;
    }

    public function addEvaluation($idForm,$idProm,$contenuEval,$fichierEval,$dateDebutEval,$dateFinEval){
        $this->idForm=htmlspecialchars(strip_tags(trim($idForm)));
        $this->idProm=htmlspecialchars(strip_tags(trim($idProm)));
        $this->contenuEval=htmlspecialchars(strip_tags(trim($contenuEval)));
        $this->fichierEval=htmlspecialchars(strip_tags(trim($fichierEval)));
        $this->dateDebutEval=htmlspecialchars(strip_tags(trim($dateDebutEval)));
        $this->dateFinEval=htmlspecialchars(strip_tags(trim($dateFinEval)));
        $sql="CALL procAddEvaluation(?,?,?,?,?,?)";
        $this->callProcedure($sql,[$this->idForm,$this->idProm,$this->contenuEval,$this->fichierEval,$this->dateDebutEval,$this->dateFinEval]);
    }

    public function getMention($idIns,$idEval){
        $sql="SELECT COUNT(Part.idPart) AS nombre  FROM participer AS Part INNER JOIN evaluation AS Eval ON Eval.idEval=Part.idEval WHERE Part.idIns=? AND Part.idEval=?";
        $tab=$this->prepare($sql,[$idIns,$idEval]);
        return $tab->nombre;
    }

    public function getPromotionEncours(){
        $sql="SELECT Prom.idProm,Prom.designProm FROM promotion AS Prom WHERE Prom.dateFinProm >= NOW() ORDER BY Prom.idProm DESC";
        $tab=$this->prepare($sql,NULL,false);
        return $tab;
    }

    public function getFormEvaluations($idForm){
        $sql="SELECT Eval.idEval,Eval.contenuEval,Eval.dateDebutEval,Eval.dateFinEval, Prom.designProm FROM evaluation AS Eval INNER JOIN promotion AS Prom ON Prom.idProm=Eval.idProm  WHERE Eval.idForm=?  ORDER BY Eval.idEval DESC";
        $tab=$this->prepare($sql,[$idForm],false);
        return $tab;
    }

    public function onLine($idUser){
        $tab=NULL;
        if(!empty($idUser)){
            $tab=$this->getUserOnline($idUser);
        }
        return $tab ;
    }

}