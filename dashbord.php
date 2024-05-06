<?php
include '../controller/reclamationC.php'; // Include the cvC controller
$cvC = new reclamationC();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body >
        <div class="sidebar">
        <div class="logo-details">
            <img class="logo-clinets" src="img/logo-clinets-1.png" />
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
            </li>
            <li>
            <a href="#">
                <i class="acc">
                <img class="home-2" src="img/home-1.png" />
                </i>
                <span class="links_name">Accueil</span>
            </a>
            <span class="tooltip">Accueil</span>
            </li>
            <li>
            <a href="#">
                <i class='off'>
                <img class="icon-briefcase" src="img/icon-briefcase.png" />
                </i>
                <span class="links_name">Offres d’emploi</span>
            </a>
            <span class="tooltip">Offres d’emploi</span>
            </li>
            <li>
            <a href="#">
                <i class='service'>
                <img class="img-2" src="img/service-1.png" />
                </i>
                <span class="links_name">service</span>
            </a>
            <span class="tooltip">service</span>
            </li>
            <li>
            <a href="#">
                <i class='cccc'>
                <img class="cv" src="img/cv-3.png" />
                </i>
                <span class="links_name">Cv</span>
            </a>
            <span class="tooltip">Cv</span>
            </li>
            <li>
            <a href="#">
                <i class='bx bx-chat'></i>
                <span class="links_name">Messages</span>
            </a>
            <span class="tooltip">Messages</span>
            </li>
            
            <li>
            <a href="#">
                <i class='bx bx-heart'></i>
                <span class="links_name">Saved</span>
            </a>
            <span class="tooltip">Saved</span>
            </li>
            <li>
            <a href="#">
                <i class='bx bx-user'></i>
                <span class="links_name">User</span>
            </a>
            <span class="tooltip">User</span>
            </li>
            <li>
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="links_name">Setting</span>
            </a>
            <span class="tooltip">Setting</span>
            </li>
            <li class="profile">
            <div class="profile-details">
                <img class="user" src="img/user-1-1.png"  alt="profileImg">
                <div class="name_job">
                <div class="name">Eya Riahi</div>
                <div class="job">Gestion reclamation</div>
                </div>
            </div>
            <a href="#">
                <i class='bx bx-log-out' id="log_out"></i>
            </a>
            <span class="tooltip">log_out</span>
            </li>
        </ul>
        </div>
    
        <section class="offre-d-emploi">   
            <div class="topbar">

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>
            <script  src="script1.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>