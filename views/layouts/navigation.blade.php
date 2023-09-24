<!-- Sidebar -->
<div class="sidebar ">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="<?=EE?>Inscriptions/getProfil" class="d-block"><?= $_SESSION['userName']?></a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 " >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="<?=EE?>Actualites" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Actualités
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?=EE?>Actualites/publier" class="nav-link">
                    <i class="nav-icon fa fa-circle"></i>
                    <p>
                        Ajouter Actualité
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                       Administration
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="<?=EE?>Administrations/gestionUser" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="<?=EE?>Administrations/addOther" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Affectation</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="<?=EE?>Administrations/index" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inscription</p>
                        </a>
                    </li>
                </ul>
            </li>

             <li class="nav-item">
                <a href="<?=EE?>Messages" class="nav-link">
                    <i class="nav-icon fa fa-circle"></i>
                    <p>
                        Messages
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?=EE?>Administrations/nodone" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                       Compte non achevé
                    </p>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="<?=EE?>Evaluations/AddEvaluation" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                    Ajouter Evaluation
                    </p>
                </a>
            </li>

            
            <li class="nav-item">
                <a href="<?=EE?>Evaluations/index" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Evaluation
                    </p>
                </a>
            </li>

              <li class="nav-item">
                <a href="<?=EE?>Bibliotheques/index" class="nav-link">
                    <i class="nav-icon fa fa-circle"></i>
                    <p>
                        Bibliotheque
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?=EE?>Logins/seDeconnecter" class="nav-link">
                    <i class="nav-icon fa fa-sign-out"></i>
                    <p class="">
                    Deconnexion
                    </p>
                </a>
            </li>
    
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

