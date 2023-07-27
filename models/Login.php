<?php
class Login extends Model{

    protected $idCompt;
    protected $username;
    protected $password;
    protected $roleUser;
    protected $etatCompte;
    protected $erreur;  

    public function __construct(){
        $this->table='compte';
        $this->getConnection();
    }

    public function getCompte($username,$password){
        $this->username=$username;
        $this->password=$password;
        $tab=$this->callProcedure("CALL procLogin (?,?,@etatCompte,@idUser,@roleUser,@userName,@idIns,@idProm,@photoUser,@idComp,@idForm);
         SELECT @etatCompte,@idUser,@roleUser,@userName,@idIns,@idProm,@photoUser,@idComp,@idForm",
         [$this->username,$this->password],false
        );
        return $tab;
    }

    public function getIdCompt($gmail){
        $this->gmail=$gmail;
        $sql="CALL getIdCompt(?,@idCompt,@codeConfirme);SELECT @idCompt,@codeConfirme";
        return $tab=$this->callProcedure($sql,[
                $this->gmail
            ]); 
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
        $sql="CALL setPassword(?,?);";
        return $tab=$this->callProcedure($sql,[
                $this->idComp,
                $this->password
            ]); 
    }
    
    public function onLine($idUser){
        $tab=NULL;
        if(!empty($idUser)){
            $tab=$this->getUserOnline($idUser);
        }
        return $tab ;
    }

}
