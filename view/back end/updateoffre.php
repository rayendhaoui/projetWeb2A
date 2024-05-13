<?php
require_once '../../config.php';
include '../../Controller/ges_off_empG.php';

$error = "";

// create cv
$ges_off_emp = null;

// create an instance of the controller
$ges_off_empG = new ges_off_empG();
if (
    isset($_FILES["photo"]['tmp_name']) &&
    isset($_POST["titre_off"]) &&
    isset($_POST["nom_ent"]) &&
    isset($_POST["lieu_ent"]) &&
    isset($_POST["nbr_emp"]) &&
    isset($_POST["type_off"]) &&
    isset($_POST["mode_trav"]) &&
    isset($_POST["nom_rec"]) &&
    isset($_POST["date_rec"]) &&
    isset($_POST["descrip"])  
) {
    if (
        !empty($_FILES["photo"]['tmp_name']) &&
        !empty($_POST["titre_off"]) &&
        !empty($_POST["nom_ent"]) &&
        !empty($_POST["lieu_ent"]) &&
        !empty($_POST["nbr_emp"]) &&
        !empty($_POST["type_off"]) &&
        !empty($_POST["mode_trav"]) &&
        !empty($_POST["nom_rec"]) &&
        !empty($_POST["date_rec"]) &&
        !empty($_POST["descrip"])
    ) {
        $ges_off_emp = new ges_off_emp (
            $photo=file_get_contents($_FILES["photo"]['tmp_name']),
            $_POST["titre_off"],
            $_POST["nom_ent"],
            $_POST["lieu_ent"],
            $_POST["nbr_emp"],
            $_POST["type_off"],
            $_POST["mode_trav"],
            $_POST["nom_rec"],
            $_POST["date_rec"],
            $_POST["descrip"]
        );
        $ges_off_empG->updateoffre($ges_off_emp, $_POST["titre_off"]);
        header('Location:listoffre.php');
    } else
        $error = "Missing information";
}
?>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleajou.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
  </head>

<body>
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
                    <div class="name">rayen dhaoui</div>
                    <div class="job">Web designer</div>
                    </div>
                </div>
                <a href="#">
                    <i class='bx bx-log-out' id="log_out"></i>
                </a>
                <span class="tooltip">log_out</span>
                </li>
            </ul>
        </div>
    
    
    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['titre_off'])) {
        $ges_off_emp = $ges_off_empG->showoffre($_POST['titre_off']);

    ?>
  
        
        <section class="offre-d-emploi">   
            <div class="topbar">
                <div class="toggle">
                    <h> offre d'emploi</h>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <table>
                        <tbody>
                            <div class="cardHeader">
                                <h2 align="center">modifier l'offre d'emploi</h2>
                               <!-- <a href="#" class="btn">View All</a> -->
                            </div>
                            <div class="container">
                                <form action="./updateoffre.php" method="post" onsubmit="" enctype="multipart/form-data">
                                    <label for="photo">Photo:</label><br>
                                    <input type="file" id="photo" name="photo">
                                        <?php
                                        // Code PHP pour obtenir et afficher la prévisualisation de l'image actuellement enregistrée
                                        $image_data = base64_encode($ges_off_emp['photo']);
                                        $image_mime = 'image/jpeg';
                                        $image_src = "data:{$image_mime};base64,{$image_data}";
                                        ?>
                                    <img style="width: 50px; height: 50px;" src="<?php echo $image_src; ?>" alt="image">
                                    <label for="titre_off">Titre Offre:</label><br>
                                    <input type="text" name="titre_off" id="titre_off" value="<?php echo $ges_off_emp['titre_off']; ?>" id="titre_off" ><br>
                                    <label for="nom_ent">Nom Entreprise:</label><br>
                                    <input type="text" id="nom_ent" value="<?php echo $ges_off_emp['nom_ent']; ?>" name="nom_ent"><br>
                                    <label for="lieu_ent">Lieu Entreprise:</label><br>
                                    <input type="text" id="lieu_ent" value="<?php echo $ges_off_emp['lieu_ent']; ?>" name="lieu_ent"><br>
                                    <label for="nbr_emp">Nombre Employees:</label><br>
                                    <input type="number" id="nbr_emp" value="<?php echo $ges_off_emp['nbr_emp']; ?>" name="nbr_emp"><br>
                                    <label for="type_off">Type Offre:</label><br>
                                    <input type="text" id="type_off" value="<?php echo $ges_off_emp['type_off']; ?>" name="type_off"><br>
                                    <label for="mode_trav">Mode de Travail:</label><br>
                                    <input type="text" id="mode_trav" value="<?php echo $ges_off_emp['mode_trav']; ?>" name="mode_trav"><br>
                                    <label for="nom_rec">Nom du Recruteur:</label><br>
                                    <input type="text" id="nom_rec" value="<?php echo $ges_off_emp['nom_rec']; ?>" name="nom_rec"><br>
                                    <label for="date_rec">Date de Recrutement:</label><br>
                                    <input type="date" id="date_rec" value="<?php echo $ges_off_emp['date_rec']; ?>" name="date_rec"><br>
                                    <label for="descrip">Description:</label><br>
                                    <textarea id="descrip" value="<?php echo $ges_off_emp['descrip']; ?>" name="descrip"></textarea><br>
                                    <input type="submit" value="Submit">
                                </form> 
                            </div>    
                        </tbody>
                        <?php
                            } 
                            ?>
                    </table>  
                </div>
            </div>
    </section>
    <script  src="offred'emploi.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>