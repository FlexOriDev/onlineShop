<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>BreizhCoinCoin Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon2-32x32.png">
    </head>
    <body class="sb-nav-fixed">
    <?php
    include("actionsManager/actionsAdmin/loginAction.php");
    ?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">BreizhCoincoin Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Mon compte</a></li>

                        <li><hr class="dropdown-divider" /></li>
                        
                        <?php 
                        if(isset($_SESSION['ad'])){
                        ?>
                            <li><a class="dropdown-item" href="./actionsManager/actionsAdmin/logoutAction.php">Se déconnecter</a></li>
                        <?php
                        }
                        ?>
		                <?php 
                        if(!isset($_SESSION['ad'])){
                            ?>
                            <li><a class="dropdown-item" href="login.php">Se connecter</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>
        
        
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            
            <!-- debut menu de navigation -->
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="statistiques.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Statistiques
                            </a>
                            
                            <div class="sb-sidenav-menu-heading">Contenus</div>
                            
                            <a class="nav-link collapsed" href="list_categories.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Catégories
                            </a>
                            
                            
                            <a class="nav-link collapsed" href="list_annonces.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                                Annonces
                            </a>

                            
                            
                            
                            <div class="sb-sidenav-menu-heading">Comptes</div>
                           
                             <a class="nav-link" href="list_membres.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Membres
                            </a>
                            <a class="nav-link" href="list_admins.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-secret"></i></div>
                                Admins
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté :</div>
                         <?php 
                         if(isset($_SESSION['ad'] )){
                         echo $_SESSION['prenomad']; 
                        }
                         ?>
                    </div>
                </nav>
                
                <!-- fin menu de navigation -->
            </div>
            <div id="layoutSidenav_content">
            