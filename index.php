<?php
session_start();

define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));

// cette constante va me contenir le nom du site deja hebergé
define('SITE',"www.btcagaped.com");

require_once(ROOT.'app/Model.php');
require_once(ROOT.'app/Controller.php');
require_once(ROOT.'app/App.php');


$params=explode('/',$_GET['p']);

if($params[0]!= ''){
    $controller=ucfirst($params[0]);

    $action=isset($params[1])?$params[1]:'index';
    
    define('EE',setEmplacement(count($params)));

    require_once(ROOT.'controllers/'.$controller.'.php');
    
    $controller= new $controller();
    if(method_exists($controller, $action)){
        unset($params[0]);
        unset($params[1]);
        call_user_func_array([$controller, $action ], $params);
        // $controller->$action();

    }else{
        http_response_code(404);
        ?>
        <div class="p404" style="        font-size:30px; align-items: center;   text-align: center;    margin-top: 20%;">

            <h3 class="f" style="  color: rgb(50, 129, 194);">😔 Oups !!! la page demandée n'existe pas </h3>
            
            <p class="text-center ">cliquer <a href="index">ici</a> pour revenir en arrière ⏪</p>

            <h6>faîtes attention à votre manipulation des données</h6>

        </div>

        <?php
    }
}else{

    // echo "Aucun parametre envoye"; 
    header('Location:Acceuils');
    exit;
}


// cette function va m'aider a faire le retour pour chercher un fichier
function setEmplacement($nombre){
    $espace="";
    for($i=1;$i<$nombre;$i++){
        $espace=$espace."../";
    }
    return $espace;  
}

?>
