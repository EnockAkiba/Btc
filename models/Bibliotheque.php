<?php
class Bibliotheque extends Model{

    public function __construct(){
        $this->table="livre";
        $this->getConnection();
    }

    public function addLivre($nomLivre,$DescriptionLivre,$photoLivre,$fichierLivre){

        $nomLivre=htmlspecialchars(strip_tags(trim($nomLivre)));
        $DescriptionLivre=htmlspecialchars(strip_tags(trim($DescriptionLivre)));
        
        $sql="INSERT INTO ".$this->table ." (nomLivre,DescriptionLivre,photoLivre,fichierLivre) VALUES (?,?,?,?)";
        $tab=$this->prepare($sql,[$nomLivre,$DescriptionLivre,$photoLivre,$fichierLivre]);
        return $tab;
    }

    public function getLivres(){

        $tab=$this->getAll();
        return $tab;
    }
}