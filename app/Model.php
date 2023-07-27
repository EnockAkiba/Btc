<?php
abstract class Model{
    private $host="localhost";
    private $db_name="btcManager";
    private $usernane="root";
    private $password="";

    // private $host="109.123.246.20";
    // private $db_name="btcagape_btcManager";
    // private $usernane="btcagape_agapdBtcUser";
    // private $password="agapdBtcUser";


    private $_connexion=null;

    public $table;
    public $critere;

    public function getConnection(){
        if($this->_connexion === null){
            try {
                $connexion=new PDO('mysql:host='.$this->host .'; dbname='.$this->db_name, $this->usernane, $this->password);
                $connexion->exec('set names utf8');  
                
                // je stocke la valeur de la con dans l'instance
                $this->_connexion=$connexion;
            } catch (PDOException $exception) {
                // echo 'Erreur :'.$exception->getMessage();
                echo "Desole, je n'arrive pas a suivre votre requette";
            }    
        }
        return $this->_connexion;
    }

    protected function callProcedure($statment,$atributs){
        $this->getConnection();
        $sql=$statment;
        $query=$this->_connexion->prepare($sql);
        try {
            $query->execute($atributs); 
            $query->nextRowset(); 
            $tab=$query->fetch();
        } catch (\Throwable $th) {
            $tab=null;
        }
        return $tab;
    }

    protected function prepare($sql,$atributs=NULL, $one =true){
        $query=$this->_connexion->prepare($sql);
        try {
            $query->execute($atributs); 
            if($one){
                $tab=$query->fetch(PDO::FETCH_OBJ);
            }
            else{
                $tab=$query->fetchAll(PDO::FETCH_OBJ);
            }
        } catch (\Throwable $th) {
            $tab=null;
        }
        return $tab;
    }


    public function getAll(){
        $sql="SELECT * FROM ".$this->table;
        $query=$this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getOne(){
        $sql="SELECT * FROM ". $this->table." WHERE idUser=".$this->critere;
        $query=$this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
    public function rechercher($champs,$critere){
        $sql="SELECT * FROM ".$this->table." WHERE ".$champs. " LIKE '%".$critere."%' ORDER BY ".$champs;
        $tab=$this->prepare($sql,[],false);
        return $tab;
    }

    public function getUserOnline($idUser,$limit=NULL){
        $sql="UPDATE utilisateur set  lastTimeUserCon=NOW() WHERE idUser=?";
        $this->prepare($sql,[$idUser],false);
        
        if($limit===NULL){
            $limit=40;
        }

        $sql="SELECT idUser,nomsUser,photoUser FROM utilisateur WHERE  lastTimeUserCon>NOW()-10*60 AND idUser<>? AND idUser<>1 LIMIT 60";
        $tab=$this->prepare($sql,[$idUser],false);
        return $tab;
       
    }
}