<?php
require_once '../../config.php';
include '../../Controller/ges_entrepriseG.php';


$error = "";

// create cv
$ges_entreprise = null;

// create an instance of the controller
$ges_entrepriseG = new ges_entrepriseG();
if (
    isset($_FILES["photo"]['tmp_name']) &&
    isset($_POST["nom_ent"]) &&
    isset($_POST["nom_rec"]) &&
    isset($_POST["poste_rec"]) &&
    isset($_POST["lieu_ent"]) &&
    isset($_POST["type_ser"]) &&
    isset($_POST["email"]) 
      
) {
    if (
        !empty($_FILES["photo"]['tmp_name']) &&
        !empty($_POST["nom_ent"]) &&
        !empty($_POST["nom_rec"]) &&
        !empty($_POST["poste_rec"]) &&
        !empty($_POST["lieu_ent"]) &&
        !empty($_POST["type_ser"]) &&
        !empty($_POST["email"]) 
    ) {
        $ges_entreprise = new ges_entreprise(
            $photo=file_get_contents($_FILES["photo"]['tmp_name']),
            $_POST["nom_ent"],
            $_POST["nom_rec"],
            $_POST["poste_rec"],
            $_POST["lieu_ent"],
            $_POST["type_ser"],
            $_POST["email"]
        );
        $ges_entrepriseG->updateentreprise($ges_entreprise, $_POST["nom_ent"]);
        header('Location:listentreprise.php');
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
    if (isset($_POST['nom_ent'])) {
        $ges_entreprise= $ges_entrepriseG->showentreprise($_POST['nom_ent']);

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
                                <form action="updateentreprise.php" method="post" onsubmit="" enctype="multipart/form-data">
                                <label for="photo">Photo:</label><br>
                                <input type="file" id="photo" name="photo">
                                        <?php
                                        // Code PHP pour obtenir et afficher la prévisualisation de l'image actuellement enregistrée
                                        $image_data = base64_encode($ges_entreprise['photo']);
                                        $image_mime = 'image/jpeg';
                                        $image_src = "data:{$image_mime};base64,{$image_data}";
                                        ?>
                                    <img style="width: 50px; height: 50px;" src="<?php echo $image_src; ?>" alt="image">
                                <label for="nom_ent">Nom Entreprise:</label><br>
                                <input type="text" id="nom_ent" name="nom_ent" value="<?php echo $ges_entreprise['nom_ent']; ?>" id="nom_ent"><br>
                                <label for="nom_rec">Nom du Recruteur:</label><br>
                                <input type="text" id="nom_rec" name="nom_rec" value="<?php echo $ges_entreprise['nom_rec']; ?>"><br>
                                <label for="poste_rec">Poste du Recruteur:</label><br>
                                <input type="text" id="poste_rec" name="poste_rec" value="<?php echo $ges_entreprise['poste_rec']; ?>"><br>
                                <label for="lieu_ent">Lieu Entreprise:</label><br>
                                <input type="text" id="lieu_ent" name="lieu_ent" value="<?php echo $ges_entreprise['lieu_ent']; ?>"><br>
                                <label for="type_ser">Type de Service:</label><br>
                                <input type="text" id="type_ser" name="type_ser" value="<?php echo $ges_entreprise['type_ser']; ?>"><br>
                                <label for="email">Email:</label><br>
                                <input type="email" id="email" name="email" value="<?php echo $ges_entreprise['type_ser']; ?>"><br>
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