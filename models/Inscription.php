<?php
class Inscription extends Model{
    protected $idUser;
    protected $nomsUser;
    protected $gmail;
    protected $dateNaissUser;
    protected $sexeUser;
    protected $telephoneUser;
    protected $adresseUser;
    protected $username;
    protected $password;
    protected $etatComp;
    protected $confirmeComp;
    protected $idComp;

    public function __construct(){
        $this->table="utilisateur";
        $this->getConnection();
    }

    public function saveUser($nomsUser,$sexeUser,$adresseUser,$dateNaissUser,$gmail,$telephoneUser,$password){
        
        $this->nomsUser=$nomsUser;
        $this->sexeUser=$sexeUser;
        $this->adresseUser=$adresseUser;
        $this->dateNaissUser=$dateNaissUser;
        $this->gmail=$gmail;
        $this->telephoneUser=$telephoneUser;
        $this->password=$password;

        $tab=$this->callProcedure("CALL procUserSave(?,?,?,?,?,?,?,@idCompt,@codeConfirme,@Erreur);SELECT @idCompt,@codeConfirme,@Erreur",
         [$this->nomsUser,$this->sexeUser,$this->adresseUser,$this->dateNaissUser,$this->gmail,$this->telephoneUser,$this->password]);
        return $tab;
    }
    
    public function compteSave ($idUser,$username,$password,$confirmeComp){
        
        $this->idUser=$idUser;
        $this->username=$username;
        $this->password=$password;
        $this->confirmeComp=$confirmeComp;
        $tab=$this->callProcedure("CALL ProcCompteSave(?,?,?,?,@idCompt);SELECT @idCompt",
            [
                $this->idUser,
                $this->username,
                $this->password,
                $this->confirmeComp
            ]
            );
        return $tab;
    } 
    public function compteActive($idComp,$confirmeComp){
        
        $this->idComp=$idComp;
        $this->confirmeComp=$confirmeComp;

        $sql="CALL compteActive(?,?,@res);SELECT @res";
        return $tab=$this->callProcedure($sql,[
                $this->idComp,
                $this->confirmeComp
            ]);
    }

    public function setPassword($idComp,$newPassword){
        $this->idComp=$idComp;
        $this->password=$newPassword;
        $sql="CALL changePass(?,?)";
        return $tab=$this->callProcedure($sql,[
                $this->idComp,
                $this->password
            ]); 
    }
    public function setProfil($nomsUser,$sexeUser,$adresseUser,$dateNaissUser,$gmailUser,$telUser,$idUser){
        $this->nomsUser=htmlspecialchars(strip_tags(trim($nomsUser)));
        $this->sexeUser=htmlspecialchars(strip_tags(trim($sexeUser)));
        $this->adresseUser=htmlspecialchars(strip_tags(trim($adresseUser)));
        $this->dateNaissUser=htmlspecialchars(strip_tags(trim($dateNaissUser)));
        $this->gmailUser=htmlspecialchars(strip_tags(trim($gmailUser)));
        $this->telUser=htmlspecialchars(strip_tags(trim($telUser)));
        $this->idUser=$idUser;
        $sql="CALL procSetProfil(?,?,?,?,?,?,?)";
        $this->callProcedure($sql,[$this->nomsUser,$this->sexeUser,$this->adresseUser,
        $this->dateNaissUser,$this->gmailUser,$this->telUser,$this->idUser]);
    }

    public function setPhotoProfil($photo,$idUser){
        // ici le troisieme paramtre va recuperer l'encienne photo si elle existe (@photo)
        $sql="CALL procSetPhotoProfil(?,?,@Photo); SELECT @Photo";
        return  $tab=$this->callProcedure($sql, [$photo,$idUser]);

    }

    // cette fonction retourn les donnees d'un user
    public function getProfil($idUser){
        $sql="SELECT nomsUser,sexeUser,adresseUser,dateNaissUser,gmailUser,telUser,photoUser FROM utilisateur WHERE idUser=".$idUser;
        $tab=$this->prepare($sql,[],true);
        return $tab;
    }

    // cette fonction retourn les donnees d'un formateur
    public function getProfilForm($idForm){
        $sql="SELECT Form.photoForm,Form.biographieForm,Form.gmailForm FROM formateur AS Form WHERE Form.idForm=".$idForm;
        $tab=$this->prepare($sql,NULL,true);
        return $tab;
    }

    public function setProfilForm($biographieForm,$photoForm,$gmailForm,$idForm){
        $biographieForm=nl2br(htmlspecialchars(strip_tags(trim($biographieForm))));
        $sql="UPDATE formateur SET biographieForm=?, photoForm=? , gmailForm=? WHERE idForm=? ";
        $this->prepare($sql,[$biographieForm,$photoForm,$gmailForm,$idForm]);

    }

    public function onLine($idUser){
        $tab=NULL;
        if(!empty($idUser)){
            $tab=$this->getUserOnline($idUser);
        }
        return $tab ;
    }
    
}