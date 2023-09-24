<?php 
class Evaluations extends App{

    protected $erreur =NULL;
    protected $idForm;
    protected $idIns;
    protected $onLine;
    protected $idProm;

    public function __construct(){

        $this->getUser();
        $this->idIns=!empty($_SESSION['idIns'])?$_SESSION['idIns']:NULL;
        $this->idForm=!empty($_SESSION['idForm'])?$_SESSION['idForm']:NULL;

        $this->idProm=!empty($_SESSION['idProm'])?$_SESSION['idProm']: NULL;
        $this->loadModel("Evaluation");
        $this->onLine=$this->Evaluation->getUserOnline($_SESSION['idUser']);
    
    }

    public function index(){
        $idIns=!empty($_SESSION['idIns'])? $_SESSION['idIns'] :NULL;
        $evaluationEncours=$this->Evaluation->getEvaluationEncours($this->idProm);
        $evaluationRemis=$this->Evaluation->getEvaluationTerminer($idIns,$this->idProm);
        // $evaluationRemis=$this->Evaluation->getEvaluationEncours($_SESSION['idProm']);
        $evaluationRater=$this->Evaluation->getEvaluationRater($idIns,$this->idProm);
        $this->render("index", compact("evaluationEncours","evaluationRater","evaluationRemis"));
    }

    public function AddEvaluation(){

        if(isset($_POST)){
        $emplacement=ROOT."app/public/documents/evaluation/";

            if(!empty($_POST['idProm']) AND !empty($_POST['contenuEval']) AND !empty($_FILES['fichierEval']) AND !empty($_POST['dateDebutEval']) AND !empty($_POST['dateFinEval']) ){
                $idForm=isset($_SESSION['idForm'])?$_SESSION['idForm']:NULL;
                $idProm=$_POST['idProm'];
                $contenuEval=$_POST['contenuEval'];
                $dateDebutEval=$_POST['dateDebutEval'];
                $dateFinEval=$_POST['dateFinEval'];

                if($dateDebutEval < $dateFinEval){

                    if(isset($_FILES['fichierEval']) AND $_FILES['fichierEval']['error']==0){
                        $fichierEval=$this->DocStatement('fichierEval',$emplacement);
                        $this->Evaluation->addEvaluation($idForm,$idProm,$contenuEval,$fichierEval,$dateDebutEval,$dateFinEval);
                        $this->erreur="Envoyer avec succes";

                    }
                    else{
                        $this->erreur="Le fichier que vous avez choisi a un soucis, veillez le changer";

                    }
                }
                else{
                    $this->erreur="la date de fin d'évaluation doit être superieure à la date du début";

                }

            }
            else{
                $this->erreur="completez tous les champs svp, sans oublier le document";
            }
        }

        $promotions=$this->Evaluation->getPromotionEncours();
        $getEvaluations=$this->Evaluation->getFormEvaluations($this->idForm);
        $this->render('sendEvaluation',compact('promotions','getEvaluations'));
    }
    
    public function getStatut($idEval){

        $idEval=$this->vichuwa($idEval);
        $statut=$this->Evaluation->getMention($this->idIns,$idEval);
        if($statut>=1){
            $statut=true;
        }
        else{
            $statut=false;
        }
        return $statut;
    }

    public function participer($idEval){
        
        $idEval=$this->vichuwa($idEval);

        $emplacement=ROOT."app/public/documents/participer/";
        $mgs=NULL;
        if(!empty($_POST['contenuPart']) OR !empty($_FILES['fichierPart'])){

            if(isset($_FILES['fichierPart']) AND $_FILES['fichierPart']['error']==0){
                $fichierPart=$this->DocStatement('fichierPart',$emplacement);
            }
            else{
                $fichierPart=NULL;
            }
            $contenuPart=!empty($_POST['contenuPart'])? nl2br($_POST['contenuPart']) : NULL;

            if(!empty($contenuPart) OR !empty($fichierPart)){
                $this->Evaluation->participer($_SESSION['idIns'],$idEval,$contenuPart,$fichierPart);
                $this->index();
            }
            else{
                $mgs="Veillez repondre avant de remettre";
            }
        }
        else{
            $mgs="Veillez repondre avant de remettre";
        }
    
        $evaluation=$this->Evaluation->getOneEvaluation($idEval);  
        $this->render("getEvaluation", compact("evaluation","mgs"));
    }

    public function getParticipations($idEval){

        $idEval=$this->vichuwa($idEval);
        $evaluation=$this->Evaluation->getOneEvaluation($idEval);
        $participations=$this->Evaluation->getAllParticipation($idEval);
        $this->render("participations", compact('participations','evaluation'));
    }
}