<?php
    $langue=0;
    $params=explode('/',$_GET['p']);
    $langue=isset($params[2])?1:0;

    // LA TRADUCTION COMMENCE ICI
            // le nav

    $nav=array("Accueil","Home");
    $nav1=array("A propos de nous","A bout us");
    $nav2=array("BTC Actualites","BTC news");
    $nav3=array("S'inscrire","Register");
    $nav4=array("Se connecter","Login");

    // Le slider
    $slidTitre1=array("RÉALISATIONS BTC","BTC ACHIEVEMENTS");
    $slidP1=array("De 2001 à nos jours, l'école BTC a été un facteur contributif majeur à l'accès à l'emploi de milliers d'étudiants ayant terminé avec succès leur formation.","From 2001 to the present, BTC has been a major contributor to the employment of thousands of students who have successfully completed their training.");

    $slidTitre2=array("NOS VISIONS","OUR VISIONS");
    $slidP2=array("Notre vision est de former des personnes autonomes qui sont économiquement
    indépendantes
    pour toute la vie ; Nous rêvons d'étendre nos activités à travers des formations
    professionnelles","The main objective of AGAPD/Asbl is to carry out development actions mainly focused on training in national and international languages, in computer science and various professions.");


    $slidTitre3=array("NOTRE ADRESSE","OUR PHYSICAL ADDRESS");
    $slidP3=array("   Si vous orientez quelqu'un pour étudier chez BTC Afia Bora, veuillez toujours attirer son
    attention
    sur la présence de deux centres de langues dans le même bâtiment. Dites lui que nous c'est
    BTC-AGAPD/Asbl","If you refer someone to study at BTC Afia Bora, please always draw their attention to the fact that there are two language centers in the same building Tell them that we are BTC-AGAPD/Asbl.");

    // about

    $aboutp1=array("Brotherly Training
    Center/B.T.C est le programme Education de l'ASBL Action Généreuse d'Appui Pérenne au Développent AGAPD/ Asbl, BTC est une
    grande école de langues traitant de la logistique humanitaire, de l'informatique, de la
    conduite, de l'art culinaire, des enseignements d'allemand, de français, d'anglais,
    de swahili et d'espagnol"," Brotherly Training Center/B.T.C is the education program of Action Généreuse d'Appui Pérenne au Développement AGAPD/ Asbl. BTC is a large language school dealing with humanitarian logistics, computer science, driving, culinary arts, German, French, English, Swahili and Spanish, Chinese, sign language, musique lessons");
    
    $aboutp2=array("L'école est opérationnelle à Katindo afia bora /Goma depuis
    plus de 20 ans","The school has been operational in Katindo afia bora /Goma for over 21 years");

    $aboutT1=array("INFORMATIONS NECESSAIRES DU CENTRE BTC/AGAPD/Asbl","INFORMATION REQUIRED FROM BTC/AGAPD/Asbl");

    $aboutp3=array("The Brotherly Training Centre (Centre Fraternel de
    Formation) est un programme d'Education del'Asbl AGAPD(Action Généreuse d'Appui Pérenne au Développement)","The Brotherly Training Centre is an educational program of the Asbl AGAPD (Action Généreuse d'Appui Pérenne au Développement)");

    $aboutT2=array("DOMAINES D'INTERVENTION BTC","AREAS OF INTERVENTION BTC");

    $aboutL1=array("Actions humanitaires (prise en charge éducative des enfants orphelins et ceux vulnérables à Goma et à certains villages du sud et Nord Kivu),...","Humanitarian actions (educational care for orphans and vulnerable children in Goma and some villages in South and North Kivu),...");

    $aboutL2=array("Formation accélérée en Anglais, français, Chinois, etc ...","Accelerated training in English, French, Spanish, German, Kiswahili, Chinese, Computer science, Music, Sewing, Literacy, Car Driving, Logistics, Customs, etc.");

    $aboutL3=array("Le niveau-3 chez BTC est une formation spéciale pour préparer nos étudiants à la vie professionnelle après échange sur les méthodes d'enseignement endragogique (pour adultes), comment former les enfants/vacanciers, comment traduire, interpréter, comment faire l'entreprénariat, gestion de projets, leadership, composition avancée, notions sur l'homilétique, ...",
    "Level-3 at BTC is a special training to prepare our students for professional life after exchanging on andragogical teaching methods (for adults), how to train children/holidaymakers, how to translate, interpret, how to do entrepreneurship, project management, leadership, advanced composition, notions on homiletics, ...");

    $aboutL4=array("Pour accéder au niveau-2 et 3 il faut passer à la défense publique ou si vous externe il faut réussir à un test d'Evaluation de niveau avec au-moins 60%(en Grammaire, Conjugaison, composition, dictée, exposé, listening et dialogue) GONGS(Vacations): 6-7h30, 8-9h30, 10-12(pour tout élève et enseignant vacanciers) et aussi de 16-17h30",
    "To access to level-2 and 3 in Languages and some vocations trainings you have to pass to the public defence or if you are external you have to pass a test of Evaluation of level with at least 60% (in Grammar, Conjugation, Composition, Dictation, Presentation, Listening and Dialogue) GONGS(Vacations): 6-7:30, 8-9:30, 10-12 (for all students and teachers on vacation) and also from 16-17:30");

    $aboutL5=array(" C'est vraiment une formation intensive. Le cours prends 90minutes par jour du lundi au samedi and Une 1h de débat (English Club) obligatoire de chaque dimanche 7-8h avant d'aller à l'église ou 13-14h après culte. Il ta aussi un culte d'anglais (facultatif) de 14 à 15h. Y participer est une partie de la formation gratuite.",
    "This is truly an intensive course. The course takes 90 minutes per day from Monday to Saturday and a 1-hour mandatory English Club discussion each Sunday 7-8am before going to church or 1-14pm after worship. There is also an English service (optional) from 2 to 3 pm. Participating is part of the free training");

    $aboutT4=array("Autres info","Other info");

    $aboutL5a=array("Syllabus de 150pages level-1(7$) si vous payez les frais de 3mois d'un coup, vous l'acheterez à 4$ au lieu de 7$.",
    "Syllabus 150pages level-1(7$) if you pay the 3 months fee at once, you will buy it at 4$ instead of 7$");

    $aboutL6=array("Au terme de chaque niveau il ya soutenance publique dont le dépôt de travaux+coaching est 16$ au level-1 et 25$ au level-2",
    "At the end of each level there is a public defence, the cost of which is 16$ for level-1 and 25$ for level-2");

    $aboutL7=array("Au bout de chaque 60jours de concentration il ya une sortie collective des étudiants(dont celui de mars 2023) pour une récréation en dehors de la ville (pic-nic) dont le coût peut varier entre 5 et 15$ selon les sites à visiter (la participation est facultative)",
    "At the end of each 60 days of concentration there is a collective outing of the students (including the one in March 2023) for a recreation outside the city (picnic) whose cost can vary between 5 and 15$ depending on the sites to visit (participation is optional)");

    $aboutL8=array("Caisse Sociale des étudiants (1$/promotion de 3mois) pour assister tout étudiant BTC dans ses circonstances heureuses et ou malheureuses (mariage, accouchement, hospitalisation au delà de 48h, accident majeur, deuil[famille restreinte],....)",
    "Student Social Fund (1$/promotion of 3 months) to assist any BTC student in his or her happy or unhappy circumstances (marriage, childbirth, hospitalization beyond 48 hours, major accident, bereavement [restricted family] ....)");

    $aboutL9=array("Enseignants très qualifiés, expérimentés et certains au Standing des Nations Unies et ou fruits des ISP, de ",
    "Highly qualified and experienced teachers, some of whom are UN staff and ISP graduates, from ");

    $aboutT5=array("Ce qui nous différencie d'autres centres à Goma","What makes us different from other training centers in Goma");

    $aboutL10=array("BTC est opérationnel depuis 2001 (sans interruption) ",
    "BTC is operational since 2001 (without interruption)");

    $aboutL11=array("Utilisation de tableaux blancs et autre matériels de support comme syllabus, autres imprimés et projection des certaines leÇons",
    "Use of whiteboards and other support materials such as syllabus, other printed materials and projection of selected lesso");

    $aboutL12=array("BUn Enseignant du Chinois qui a étudié en Chine pendant 4ans",
    "A Chinese Teacher who studied in China for 4 years.");

    $aboutL13=array("Une discipline dans la formation, évaluation objective et souci des étudiants",
    "Discipline in training, objective assessment and care for students");

    $aboutL14=array("Intégration spirituelle sans ségrégation religieuse et une vie en fraternité au centre BTC",
    "Spiritual integration without religious segregation and a life in brotherhood at the BTC center");

    $aboutL15=array("Formation en music","Training in music");

    $aboutInfo=array("Découvrir les actualités BTC/Agapd comme défense public, manifestation et Autres",
    "Discover BTC/AGAPD news such as public defence, event and Others");

    $aboutInfo1=array("Formations Disponibles","Current available courses");

    $aboutInfo2=array("En cas de retard les séances de rattrapage iront de 7h30 à 8h et 15h30 à 16h pendant 30jours","In case of delay, the catch-up sessions will go from 7:30 to 8:00 and 15:30 to 16:00 for 30 days");
    $aboutInfo3a=array("Horaire de formation","Training schedule");

    $aboutInfo3=array("Laisser-nous un message","Leave a message");


    $aboutInfo5=array("Enseignants très qualifiés, expérimentés et certains au Standing des Nations Unies et ou fruits des ISP, de","Highly qualified and experienced teachers, some of whom are UN staff and ISP graduates, from");

    $aboutInfo7=array("Étant déjà membre de famille BTC, Prière nous adresser vos encouragements, Remarques","As a member of the BTC family, please send us your encouragement, Remarks BTC Manager and President of the Board of Directors of the Asbl");

    







    // $acc3=array("S'inscrire","S'inscrire");

// die;
?>
<link rel="stylesheet" href="<?=EE?>app/plugins/css/custom.css?t=<?=time()?>">
<link rel="stylesheet" href="<?=EE?>app/plugins/css/barScroll.css">
<link rel="stylesheet" href="<?=EE?>app/plugins/css/timeline.css">
<header id="header" class="pt-1">
    <nav class="navbar">
        <div class="logo d-flex  w-25">
            <a class="navbar-brand" href="#"><span class="text-success"> <img
                        src="<?=EE?>app/public/photos/img/logo.png" class="logo" alt="Logo BTC">
                </span>
            </a>
            <div class="d-flex flex-column lien">
                <h6 class="mt-2 d-none d-md-inline-block"> Brotherly Training Center/ <span
                        class='text-primary'>BTC</span> </h6>
                <span class='text-primary mt-2 d-md-none'>BTC</span>
                <span>AGAPD/Asbl</span>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false" title="tranduire la page">
                <img src="<?=EE?>app/public/photos/img/<?=($langue===1)?"icons8_USA_16.png":"icons8_France_16.png"?>" alt="">
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="<?=EE.'Acceuils/index'?>">Français <img src="<?=EE?>app/public/photos/img/icons8_France_16.png" alt=""> </a></li>
                <li><a class="dropdown-item" href="<?=EE.'Acceuils/index/1'?>">Anglais <img src="<?=EE?>app/public/photos/img/icons8_USA_16.png"
                            alt=""></a></li>
            </ul>
        </div>
        <div class="navigation d-flex">
            <ul>
                <i id="menu-close" class="fas fa-times"></i>
                <li class="mx-2 d-inline-block"><a href="#home" class="lien"><?=$nav[$langue];?></a></li>
                <li class="mx-2 d-inline-block"><a href="#about" class="lien"><?=$nav1[$langue];?></a>
                </li>
                <li class="mx-2 d-inline-block"><a href="#news" class="lien"><?=$nav2[$langue];?></a>
                </li>
                <li class="mx-2 d-inline-block"><a href="#registration" class="lien">Contact</a>
                </li>
                <li class="mx-2 d-inline-block"><a href="<?=EE?>Inscriptions/inscription" class="lien"> <?=$nav3[$langue];?></a>
                </li>
                <li class="mx-2 d-inline-block border p-2"><a href="<?=EE?>Logins/seConnecter" class="lien"> <i
                            class="fa fa-user"></i> <?=$nav4[$langue];?></a></li>
            </ul>
            <span><i class="fas fa-bars w-icone text-color" id="menu-btn"></i></span>
        </div>
    </nav>
    <div class="progress-container">
        <div class="progress-bar" id="myBar"></div>
    </div>
</header>

<!-- home -->
<section id="home">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item bg active">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1><?=$slidTitre1[$langue];?></h1>
                        <p class="justify"><?=$slidP1[$langue];?>.</p>
                        <!-- <p><a class="btn btn-sm btn-outline-success" href="#" role="button">Lire plus</a></p> -->
                    </div>
                </div>
            </div>
            <div class="carousel-item bg2">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?=$slidTitre2[$langue];?></h1>
                        <p class="justify"><?=$slidP2[$langue];?></p>
                        <span> Motto: Teaching is touching souls forever</span>
                        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Lire plus</a></p> -->
                    </div>
                </div>
            </div>
            <div class="carousel-item bg3">
                <div class="container">
                    <div class="carousel-caption">
                        <h1><?=$slidTitre3[$langue];?></h1>
                        <p class="justify">DRC/GOMA: BTC AFIA BORA, BTC MUGUNGA, BTC KATOYI, BTC MINOVA<br>
                        <?=$slidP3[$langue];?> 
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<!-- .page-section -->
<section id="about">
    <div class="m-0">
        <div class="page-section pb-0" id="page-section1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="timeline">
                        <div class="containerTime left">
                            <div class="contentTime shadow-lg">
                                <p class="text-dark">Teaching is touching souls forever</p>
                                <h3 class="text-color mb-4 text-center d-inline-block"> THE BROTHERLY
                                    TRAINING CENTER </h3>
                                <p class="text-grey mb-4 justify"><i class="fa fa-paragraph"></i>
                                <?=$aboutp1[$langue]?>
                                    <b>
                                        <?=$aboutp2[$langue]?>.
                                    </b> <i class="fa fa-paragraph"></i>
                                </p>
                            </div>
                        </div>
                        <div class="containerTime right">
                            <div class="contentTime shadow-lg">
                                <h4 class=" mb-4 text-center text-color"><i class="fa fa-star text-color"></i>
                                    <?=$aboutT1[$langue]?>
                                     
                                    <i class="fa fa-star text-color"></i></h4>
                                <p><i class="fa fa-paragraph"></i>
                                    <?=$aboutp3[$langue]?>. 
                                    <i class="fa fa-paragraph"></i></p> <br>

                                <h6 class="mb-4 text-center"> <i class="fa fa-code-branch"></i><?=$aboutT2[$langue]?></h5>

                                    <ol>
                                        <li>
                                           <?=$aboutL1[$langue]?>
                                        </li>
                                        <li>
                                            <b>
                                                <?=$aboutL2[$langue]?> 
                                            </b>
                                        </li>
                                    </ol>

                                    <p>
                                        <i class="fa fa-paragraph"></i> 
                                            <?=$aboutL3[$langue]?>
                                        
                                    </p>
                                    <p>
                                        <i class="fa fa-paragraph"></i> 
                                        
                                           <?=$aboutL4[$langue]?>

                                    </p>

                                    <p>
                                        <i class="fa fa-paragraph"></i>
                                        <?=$aboutL5[$langue]?>.
                                    </p>

                            </div>
                        </div>
                        <div class="containerTime left">
                            <div class="contentTime shadow-lg">
                                <h4 class='text-color'><?=$aboutT4[$langue]?>.</h4>
                                <p>
                                    <i class="fa fa-paragraph mt-3"></i> 
                                    <?=$aboutL5a[$langue]?>.
                                </p>
                                <p>
                                    <i class="fa fa-paragraph mt-3"></i> 
                                    <?=$aboutL6[$langue]?>.
                                </p>
                                <p>
                                    <i class="fa fa-paragraph mt-3"></i>
                                    <?=$aboutL7[$langue]?>. 
                                <p>
                                    <i class="fa fa-paragraph mt-3"></i>
                                    <?=$aboutL8[$langue]?>.
                                </p>

                                <p>
                                    <i class="fa fa-paragraph mt-3"></i>
                                    <?=$aboutL9[$langue]?>.
                                    <b>Southern New Hampshire University (USA),
                                        "International University of East Africa"(Kampala) </b>
                                </p>
                            </div>
                        </div>
                        <div class="containerTime right">
                            <div class="contentTime shadow-lg">

                                <h2 class='text-center text-color'>
                                    <i class="fa fa-thumb-tack"></i>
                                    <?=$aboutT5[$langue];?>
                                </h2>
                                <p>
                                    <i class="fa fa-hand-holding"></i>
                                    <?=$aboutL10[$langue]?>.
                                </p>
                                <p>
                                    <i class="fa fa-hand-holding"></i>
                                    <?=$aboutL11[$langue]?>
                                </p>
                                <p>
                                    <i class="fa fa-hand-holding"></i>
                                    <?=$aboutL12[$langue]?>.
                                </p>
                                <p>
                                    <i class="fa fa-hand-holding"></i>
                                    <?=$aboutL13[$langue]?>.
                                </p>
                                <p>
                                    <i class="fa fa-hand-holding"></i>
                                    <?=$aboutL14[$langue]?>.
                                </p>
                                <p>
                                    <i class="fa fa-hand-holding"></i>
                                    <?=$aboutL15[$langue];?>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- .bg-light -->
    </div>
</section>
<!-- news -->
<section id="news" class="">
    <div class="container mx-auto">
        <p class="text-left text-muted my-4">
            <?=$aboutInfo[$langue];?>, ...
        </p>
        <h4 class=''><?=$nav2[$langue]?></h4>
    </div>
    <div class="container-lg row m-auto p-0 justify-content-center mb-4">
        <?php 
            foreach ($actualites as $key => $value) { ?>
        <div class="col-md-4 col-lg-4 col-sm-12 my-2">
            <div class="shadow-lg content">
                <?php if(($value->fichierPub != null) && ($value->photoPub != null)) {?>
                <video src='<?=EE?>app/public/videos/actualites/<?=$value->fichierPub?>' class='video'
                    prelohad='metadata' controls
                    poster='<?=EE?>app/public/photos/publication/<?=$value->photoPub?>'>changer votre
                    navigateur</video>
                <?php  }else if ($value->fichierPub != null) { ?>
                <video src='<?=EE?>app/public/videos/actualites/<?=$value->fichierPub?>' class='video' preload='none'
                    controls> changer votre navigateur </video>
                <?php   }else if ($value->photoPub != null) {?>
                <img src="<?=EE?>app/public/photos/publication/<?=$value->photoPub?>" class="img-fluid imgs" alt="...">
                <?php }?>
                <h4 class="text-color m-2 "><?= $value->titrePub?></h4>
                <?php if(($value->fichierPub == null) && ($value->photoPub == null)){?>
                <p class="mb-1 mx-2 text-left contenPub">
                    <?=nl2br(substr($value->contenPub,0,1030))?><a
                        href="<?=EE?>Acceuils/getActualite/<?= $this->vicha($value->idPub)?>" class="lien">... voir
                        Plus</a></p>
                <span class='mr-3 d-block text-right text-muted datePub'>le <?=$value->datePub?></span>

                <?php }else{?>
                <p class="mb-1 mx-2 text-left contenPub">
                    <?=nl2br(substr($value->contenPub,0,210))?>...</p>
                <span class='mr-3 d-block text-right text-muted datePub'>le <?=$value->datePub?></span>
                <?php   } if(($value->fichierPub != null) or ($value->photoPub != null)){?>
                <a href="<?=EE?>Acceuils/getActualite/<?= $this->vicha($value->idPub)?>"
                    class=" bt btn border p-2 m-3 text-primary">voir
                    Plus</a>
                <?php }?>
            </div>
        </div>
        <?php }?>
    </div>
</section>

<!-- course -->

<section id="course" class="bg-light">

    <div class="container">
        <div class="text-left">
            <h1><?=$aboutInfo1[$langue];?></h1>
            <p class='text-muted text-left'>
                <?=$aboutInfo2[$langue];?>
            </p>
            
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <?php
                foreach($this->promotions as $data){
            ?>
            <div class="col-md-3 col-sm-12 col-lg-3 mb-2">
                <div class="cad shadow-lg mb-3">
                <div class="text-left p-0 ">
                    <img src="<?=EE?>app/public/photos/img/<?= ($data->photoDepart!=null)?$data->photoDepart:'logo.png'?>"
                        alt="" class="imgCad">
                    <div class="card-body">
                        <h5 class="shadow-lg depart"><?= $data->designDepart?></h5>
                        <h4 class="card-title  text-color"><?= $data->designProm?></h4>
                        <div class="star">

                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="text-muted text-left"><i class="fas fa-star"></i> Début <?php
                        $date=date_create($data->dateDebutProm);
                       echo $datecCo=date_format($date,"d-m-Y");
                         ?></p>
                        <p class="text-muted text-left"><i class="fas fa-star"></i> Fin <?php
                        $date=date_create($data->dateFinProm);
                       echo $datecCo=date_format($date,"d-m-Y");
                         ?></p>
                          </div>
                    <div class="prix">
                        <?= $data->prixProm?>
                    </div>
                    <span class='bt btn border p-2 m-3 text-primary' data-toggle="modal"
                            onclick="getOnePromotion(<?=$data->idProm?>)" data-target="#modelId">Voir
                            plus</span>
                </div>
            </div>
            </div>
            <!--  -->
                     <!-- Modal -->
            <div class="modal fade mt-5 pt-5" id="modelId" tabindex="1111111" role="dialog"
                aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="bg-body">
                    <div class="p-2 text-center">
                        <h5 class='lien'>Departement : <span id='designDepart'></span></h5>
                        <hr>
                        <h6>Promotion: <span id="designProm"></span>    </h6>
                        <p class="text-muted">Debut de la promotion :
                            <span class="lien" id='dateDebutProm'> </span>
                        </p>
                        <p class="text-muted"> Fin de la promotion :
                            <span class="lien" id='dateFinProm'></span>
                        </p>
                        <h6>A savoir sur le Departement</h6>
                        <p class='text-justify' id='descriptionDepart'>
                        </p>
                    </div>
                    <button type="button" class="bt btn border p-2 m-3 text-primary"
                        data-dismiss="modal">Fermer</button>
                </div>
            </div>
            </div>
            <!-- fin modal -->

            <!--  -->
            <?php
                        }
                    ?>
        </div>
    </div>
</section>

<!-- registration -->

<section id="registration" class="h-auto p-3">
    <div class="container pt-5">
        <div class="row align-items-center">
            <div class="col-md-8 reminder">
                <div class="left">
                    <div class="text-center text-white">
                        <!-- <p>Get 100 Online Course for free</p> -->
                        <h1><?=$aboutInfo3a[$langue];?></h1>
                    </div>
                    <div class="time d-flex flex-wrap justify-content-center align-items-sm-center mt-4">
                        <div class="date">
                            <span class="datePub">06H-07h30 AM</span>
                        </div>
                        <div class="date">
                            <span class="datePub">08H-9H30 AM</span> 
                        </div>
                        <div class="date">
                            <span class="datePub">10H-11H30 AM</span> 
                        </div>
                        <div class="date">
                            <span class="datePub">2H-3H30 PM</span> 
                        </div>
                        <div class="date">
                            <span class="datePub">4H-5H30 PM</span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 ">
                <form action="<?=EE?>Acceuils/ContactUs" method="post" class="form">
                    <h3 class="text-center text-color"><?=$aboutInfo3[$langue];?></h3>
                    <div class="form-group mt-4">
                        <input type="text" name="name" id="gmail" class="form-control" placeholder="Nom">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="gmail" id="name" class="form-control" placeholder="Email Adress">
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="numero" id="numero" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group my-2">
                        <label id="_label" for="message" class="required"></label>
                        <textarea id="message" name="message" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group my-2">
                        <button class="btn btn-custom" type='submit'><i class="fa fa-paper-plane"></i><?=($langue==0)?"Envoyer":"Send";?></button>
                    </div>
                    <?php
                    if(isset($this->erreur)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"> 😔 oups!</h4>
                        <p class="mb-0"><?=$this->erreur ?></p>
                    </div>
                    
                    <?php }?>
                </form>
            </div>
        </div>
    </div>

</section>

<!-- profile -->

<section id="profile" class="h-auto p-4">
    <div class="container ">
        <div class="text-center text-color">
            <h1> Brotherly Training Center/ Teachers</h1>
            <p class="text-muted justify">
                <?=$aboutInfo5[$langue];?>
                <b>de Southern New Hampshire University (USA),
                    De "International University of East Africa"(Kampala)
            </p>
        </div>
        <div class="row">
            <div class="col-md-3 col-ms-6  my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/paul1.jpg" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">SHAMAZI BUYANA Paul </h6>
                    <p class="text-muted">Président du CA de AGAPD/ Gestionnaire & Fondateur de BTC </p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-ms-6 my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/agape.jpg" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">Agape Bwinja Buyana </h6>
                    <p class="text-muted">Vice-Président du CA de AGAPD/ & RH charger de programme et Formation</p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-ms-6  my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/ju.jpg" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">Foybe Banyere Mulengetsi</h6>
                    <p class="text-muted">Finaciere de BTC </p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-ms-6  my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/albert.PNG" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                        <h6 class="text-dark mt-4">Amani Muvunja Albert</h6>
                        <p class="text-muted">Assistant Financier & Administrateur </p>
                        <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- <div class="col-md-3 col-ms-6  my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/ju.jpg" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">Plantity Rwahizibuka</h6>
                    <p class="text-muted">Assistant Administrateur </p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-linkedin-in"></i>

                    </div>
                </div>
            </div> -->
            <div class="col-md-3 col-ms-6  my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/olivier.PNG" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">Olivier pendo chindamuko </h6>
                    <p class="text-muted">Secrétaire du CA de AGAPD & formateur d'anglais de BTC</p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-ms-6  my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/belin.jpg" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">Belin Mpanga</h6>
                    <p class="text-muted">Formateur d'anglais de BTC </p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-ms-6 my-2">
                <div class="profile text-center">
                    <img src="<?=EE?>app/public/photos/img/faustin.PNG" alt="" srcset=""
                        class="rounded-circle img-fluid cardImg">
                    <h6 class="text-dark mt-4">Faustin Bizimana</h6>
                    <p class="text-muted">Formateur d'anglais de BTC et répresentant des Enseignants </p>
                    <div class="pro-link">
                    <i class="fab fa-facebook-f"></i>
                        <i class="fa fa-paper-plane "></i>
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
           
            <a href="<?=EE?>Acceuils/getTeachers" class=' btn btn-outline-success'>VOIR TOUS LES FORMATEURS</a>
        </div>
    </div>
</section>

<footer class=" bg-dark text-white ">
    <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 d-flex flex-column  justify-content-start">
                        <h5 class='text-left'>THE BROTHERLY TRAINING CENTER</h5>
                        <h5 class='text-left'>Information</h5>
                        <ul class='d-flex flex-column  w-100 p-0'>
                            <li><a href="#home"
                                    class="text-decoration-none d-inline-block text-white  border-bottom py-2 my-1"><?=$nav[$langue]?></a>
                            </li>
                            <li><a href="#about" class="text-decoration-none d-inline-block text-white border-bottom py-2 my-1"><?=$nav1[$langue]?></a></li>
                            <li><a href="#news" class="text-decoration-none d-inline-block text-white border-bottom py-2 my-1"><?=$nav2[$langue]?></a>
                            </li>
                            <li><a href="#registration" class="text-decoration-none d-inline-block text-white border-bottom py-2  my-1"><?=($langue===1)?"Contact us":"Nous contacter"?></a>
                            </li>
                        </ul>
            </div>
            <div class="col-sm-6 col-md-4 d-flex flex-column  justify-content-start">
                        <h5 class='text-left'> <?=($langue==0)?"La famille BTC":"BTC FAMILLY";?></h5>
                        <p class='text-left'> 
                            <?=$aboutInfo7[$langue];?>      
                        </p>
                        <ul class='d-flex flex-column  w-100 p-0'>
                            <li>
                                <a href="tel:+243 973 111 973" class="text-decoration-none text-left"><i class="fa fa-user text-dark"></i> Gestionnaire BTC et Président CA de l'Asbl</a>
                            </li>
                    
                        </ul>
            </div>
            <div class="col-sm-6 col-md-4 d-flex flex-column  justify-content-start">
                        <h5 class='text-left'> <?=($langue==0)?"Notre adresse":"Our location";?></h5>
                        <p class='text-left'> <?=($langue==0)?"Feel free and welcome again and again":"Feel free and welcome again and again";?></p>
                        <p class='text-left'> RDC, Ville goma, Afia bora</p>
                <div class="d-flex justify-content-between">
                    <div class="wow fadeInDown" data-wow-delay="0.1s">
                        <div class="widget">
                            <h5><?=($langue==0)?"Nous siuvre":"follow us";?></h5>
                            <style>
                                .text-font{
                                    font-size:14px;
                                }
                            </style>
                            <ul class="company-social text-left">
                                <li ><a href="#" class="text-decoration-none "><span class="datePub fab fa-facebook"></span> Facebook</a>
                                </li>
                                <li ><a href="#" class="text-decoration-none "><span class="datePub fab fa-twitter"></span> Twitter</a>
                                </li>
                                <li ><a href="#" class="text-decoration-none "><span class="datePub fab fa-whatsapp"></span> Whatsapp</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wow fadeInDown " data-wow-delay="0.1s">
                        <h6 class='text-center'><i class='fa fa-user'></i> <span class="datePub">Concepteurs du
                                site</span> </h6>
                        <div class=" d-flex">
                            <div>
                                <ul>
                                    <li ><a href="https://wa.me/qr/V2KXVLRG5CU3P1" class="text-decoration-none text-font"> <span
                                                class="fab fa-whatsapp"></span> </a><a href="tel:+243973722401" class="text-decoration-none "> <span
                                                class="text-font">Akiba wanjumbi Enock</span> </a></li>
                                    <li ><a href="https://wa.me/qr/V2KXVLRG5CU3P1" class="text-decoration-none text-font"> <span
                                                class=" fab fa-whatsapp"></span> </a> <a href="tel:+243992773729" class="text-decoration-none "> <span
                                                class="text-font">Paul Bebukya</span> </a></li>
                                    </li>
            
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="text-left">
                            <p>&copy;Copyright <?= date("Y")?> - btc center. All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                        <div class="text-right">

                        </div>
                        <!-- 
                    coding by paul bebukya 
                  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- script navigation -->
<script>
$('#menu-btn').click(function() {
    $('.navigation ul').addClass('active')
})
$('#menu-close').click(function() {
    $('.navigation ul').removeClass('active')
});
// When the user scrolls the page, execute myFunction
window.onscroll = function() {
    myFunction()
};

function myFunction() {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("myBar").style.width = scrolled + "%";
}

function getOnePromotion(idForm) {
    $.ajax({
        type: "get",
        dataType: "json",
        url: "<?=EE?>Acceuils/getOnePromotion/" + vicha(idForm),
        success: function(response) {
            $.each(response, function(key, value) {
                 let dateDebut= new Date(value.dateDebutProm);
                 let dateFinProm= new Date(value.dateFinProm);
                $('#designDepart').html(value.designDepart);
                $('#designProm').html(value.designProm);
                $('#dateDebutProm').html(dateDebut.getDate()+'/'+(dateDebut.getMonth()+1) +'/'+dateDebut.getFullYear());
                $('#dateFinProm').html(dateFinProm.getDate()+'/'+(dateFinProm.getMonth()+1) +'/'+dateFinProm.getFullYear());
                $('#descriptionDepart').html(value.descriptionDepart);
            });
        }
    });
}
</script>


