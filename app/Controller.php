<?php

abstract class Controller{
    private $file; // cet atribut m'aide dans la fonction d'image


    public function loadModel(string $model){
        require_once(ROOT.'models/'.$model.'.php');
        $this->$model= new $model();
    }

    public function render(string $fichier, array $data=[]){
        extract($data);
        ob_start();
        require_once(ROOT.'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');
        $content=ob_get_clean();
        require_once(ROOT.'views/layouts/app.php');
    }
    public function getUser(){
        
        if(!isset($_SESSION['idUser'])){
            header('location:'.EE.'Logins/seConnecter');   
            exit; 
        }
    }
 
}