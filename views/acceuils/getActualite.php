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
$aboutInfo7=array("Étant déjà membre de famille BTC, Prière nous adresser vos encouragements, Remarques","As a member of the BTC family, please send us your encouragement, Remarks BTC Manager and President of the Board of Directors of the Asbl");

?>
<link rel="stylesheet" href="<?=EE?>app/plugins/css/getActualite.css?t=<?= time()?>">
<header id="header" class='d-flex justify-content-between p-2'>
    <div class="logo d-flex  w-25">
        <a class="navbar-brand" href="<?=EE?>Acceuils/index"><span class="text-success"> <img src="<?=EE?>app/public/photos/img/logo.png"
                    class="logo" alt="...">
            </span>
        </a>
        <div class="d-flex flex-column lien">
            <h6 class="mt-2 d-none d-md-inline-block"> Brotherly Training Center/ <span class='text-primary'>BTC</span>
            </h6>
            <span class='text-primary mt-2 d-md-none'>BTC</span>
            <span>AGAPD/Asbl</span>
        </div>
    </div>
    <div class="back">
        <a href="<?=EE?>Acceuils/index" class='btn'>  <i class='fa fa-home'></i> Acceuil</a>
    </div>
</header>

<section id="about">
    <div class="container-lg d-flex  w-100 h-100 align-items-center mt-3">
        <div class="timeline row justify-content-center ">
            <div class="containerTime col-md-7 col-lg-7 col-sm-12 mb-3">
                <div class="contentTime shadow-lg col-sm-12">
                    <h3 class="text-color m-2 text-center d-inline-block"><?= $publication->titrePub?>  </h3>
                    <?php if(($publication->fichierPub != null) && ($publication->photoPub != null)) {?>
                <video src='<?=EE?>app/public/videos/actualites/<?=$publication->fichierPub?>' class='video'
                    prelohad='metadata' controls
                    poster='<?=EE?>app/public/photos/publication/<?=$publication->photoPub?>'>changer votre
                    navigateur</video>
                <?php  }else if ($publication->fichierPub != null) { ?>
                <video src='<?=EE?>app/public/videos/actualites/<?=$publication->fichierPub?>' class='video' preload='none'
                    controls> changer votre navigateur </video>
                <?php   }else if ($publication->photoPub != null) {?>
                <img src="<?=EE?>app/public/photos/publication/<?=$publication->photoPub?>" class="img-fluid imgs" alt="...">
                <?php }?>
                </div>
            </div>
            <div class="containerTime  col-md-5 col-lg-5 col-sm-12 m-0">
                <div class=" m-0">
                    <h5 class='border-bottom shadow-lg p-2 text-left bg-body'> <?= $publication->nomsUser?></h5>
                    <p class='border-bottom shadow-lg p-3 text-left bg-body contenPub'>
                       <?=nl2br( $publication->contenPub)?>
                       <span class='mr-3 mb-3 d-block text-right text-dark datePub'>Publier le <?=$publication->datePub?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer class=" bg-dark text-white ">
    <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 d-flex flex-column  justify-content-start">
                        <h5 class='text-left'>THE BROTHERLY TRAINING CENTER</h5>
                        <h5 class='text-left'>Information</h5>
                        <ul class='d-flex flex-column  w-100 p-0'>
                            <li><a href="<?=EE?>Acceuils/index#home"
                                    class="text-decoration-none d-inline-block text-white  border-bottom py-2 my-1"><?=$nav[$langue]?></a>
                            </li>
                            <li><a href="<?=EE?>Acceuils/index#about" class="text-decoration-none d-inline-block text-white border-bottom py-2 my-1"><?=$nav1[$langue]?></a></li>
                            <li><a href="<?=EE?>Acceuils/index#news" class="text-decoration-none d-inline-block text-white border-bottom py-2 my-1"><?=$nav2[$langue]?></a>
                            </li>
                            <li><a href="<?=EE?>Acceuils/index#registration" class="text-decoration-none d-inline-block text-white border-bottom py-2  my-1"><?=($langue===1)?"Contact us":"Nous contacter"?></a>
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
</section>