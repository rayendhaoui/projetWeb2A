<?php
include "../../Controller/service.php";
$c = new serviceS();
$tab = $c->display();


// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "career";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination variables
$records_per_page = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;


// Fetch data from the database
$sql = "SELECT * FROM service LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

// Start of HTML
?>


<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globalserv.css" />
    <link rel="stylesheet" href="styleserv.css" />
    <link rel="stylesheet" href="service.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>4
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
/* Dashboard styles */
#dashboard {
    position: fixed;
    left: 0;
    top: 0;
    width: 200px;
    height: 100%;
    background-color: #1d2d44; /* Royal Blue dashboard color */
    color: #f0ebd8; /* White text color */
    padding: 20px;
}

#dashboard h1 {
    margin-top: 0;
}

#dashboard ul {
    list-style-type: none;
    padding: 0;
}

#dashboard ul li {
    margin-bottom: 50px; /* Espace entre chaque élément */
    font-family: Arial, Helvetica, sans-serif;
}

#dashboard ul li:last-child {
    border-bottom: none; /* Supprimer la ligne en dessous du dernier élément */
}

#dashboard ul li a {
    color: #fff; /* White link color */
    text-decoration: none;
}

#dashboard ul li + li {
    margin-top: 10px; /* ou toute autre valeur souhaitée pour l'espace */
}

/* Table styles */
.table-container {
  display: flex;
  justify-content: center;}
/* Style des en-têtes de colonne */
.table thead td {
    font-weight: bold;
    padding: 10px; /* Ajouter un padding pour l'espace autour du texte */
}

/* Style des lignes du tableau */
.table tr {
    color: #1d2d44; /* Couleur du texte */
    border-bottom: 1px solid rgba(0, 0, 0, 0.1); /* Bordure inférieure de chaque ligne */
}

/* Style au survol des lignes du tableau */
.table tbody tr:hover {
    background-color: #f5f5f5; /* Couleur de fond au survol */
    color: #0d1321; /* Couleur du texte au survol */
}

/* Style des cellules du tableau */
.table tr td {
    padding: 10px; /* Ajouter un padding pour l'espace à l'intérieur de chaque cellule */
}

/* Alignement du texte dans la dernière colonne à droite */
.table tr td:last-child {
    text-align: right;
}

/* Alignement du texte dans la deuxième colonne à droite */
.table tr td:nth-child(2) {
    text-align: right;
}

/* Alignement du texte dans la troisième colonne au centre */
.table tr td:nth-child(3) {
    text-align: center;
}

/* Button styles */
input[type="submit"],
input[type="reset"],
.btn {
    width: 70%; /* Définir la largeur du bouton à 70% */
    padding: 10px; /* Ajouter un peu de rembourrage au bouton */
    background-color: #1d2d44; /* Définir la couleur de fond du bouton */
    color: #f0ebd8; /* Couleur du texte du bouton */
    border: none; /* Supprimer la bordure du bouton */
    border-radius: 4px; /* Ajouter des coins arrondis au bouton */
    cursor: pointer; /* Définir le curseur de la souris sur pointer pour les boutons */
}

/* Button hover styles */
input[type="submit"]:hover,
input[type="reset"]:hover,
.btn:hover {
    background-color: #748cab; /* Change la couleur de fond du bouton au survol */
}

/* Live search container */
#search_container {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    height: 100vh; /* Full viewport height */
}

/* Live search input */
#live_search {
    width: 50%; /* Adjust width as needed */
    padding: 10px; /* Add padding */
    font-size: 16px; /* Set font size */
    border: 1px solid #ccc; /* Set border */
    border-radius: 4px; /* Round the corners */
    outline: none; /* Remove the outline on focus */
    transition: all 0.2s; /* Smooth transition on hover/focus */
    display: block;
  margin: 0 auto;
}

/* Change the border color on focus */
#live_search:focus {
    border-color: #66afe9; /* Change border color */
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6); /* Add a blue glow */
}
/* Container for the message */
#message_container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center; /* Center align the text */
}

/* Styling for the message */
#recentOrders {
    font-size: 20px;
    /* You can add additional styles for the message here */
}.cardContainer {
    display: flex;
    justify-content: space-between;
}

.cardColumn {
    width: 48%; /* Pourquoi pas 48% ? Pour laisser un peu d'espace entre les colonnes */
}

.card {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.card-body {
    margin-bottom: 20px;
}

.reservation-form {
    display: flex;
    justify-content: center;
}

.reservation-form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.reservation-form button:hover {
    background-color: #0056b3;
}



    </style>
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
          <a href="home.html">
            <i class="acc">
            <img class="home-2" src="img/home-1.png" />
            </i>
            <span class="links_name">Accueil</span>
          </a>
          <span class="tooltip">Accueil</span>
        </li>
        <li>
          <a href="offred'emploi.php">
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
              <div class="name">Mayssem Soltani</div>
              <div class="job">Web designer</div>
            </div>
          </div>
          <a href="#">
            <i class='bx bx-log-out' id="log_out"></i>
          </a>
          <span class="tooltip">log_out</span>
        </li>
      </ul>
    </div>-
    <div class="sign-up">
    <input type="text" id="live_search" placeholder="chercher ici...">
    
    <div id="message_container">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#live_search").keyup(function(){
                        $('#recentOrders').html(''); 
                        var input =$(this).val();
                            $.ajax({
                                type: 'GET',
                                url:"rechercheserv.php",
                                data: 'input=' + encodeURIComponent(input),
                                success: function(data){
                                    if(data!=""){
                                        $('#recentOrders').append(data); 
                                    }else{
                                        document.getElementById('recentOrders').innerHTML = "aucun service"
                                    }
                                }
                            });
                    });
                 });
            </script>
            </div>
            </div>
            </div>
            
 
            <div class="sign">
            <div style="text-align: center;">
            <div class="cardContainer">
    <div class="cardColumn" id="recentOrders">
        <?php
        // On récupère la moitié des résultats pour la colonne de gauche
        $half_count = ceil($result->num_rows / 2);
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            if ($count == $half_count) {
                break; // On s'arrête à la moitié
            }
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h2>' . $row['nom'] . '</h2>';
            echo '<p>Prix: ' . $row['prix'] . '</p>';
            echo '<p>Type: ' . $row['typee'] . '</p>';
            echo '<p>Mode: ' . $row['mode'] . '</p>';
            echo '<form class="reservation-form" method="GET" action="feedback.php">';
            echo '<input type="hidden" value="' . $row["nom"] . '" name="nom">';
            echo '<button type="submit" name="reserver" class="btn btn-default btn-sm">Réserver</button>';
            echo '</form>';
            echo '</div>'; // .card-body
            echo '</div>'; // .card
            $count++;
        }
        ?>
    </div>

    <div class="cardColumn">
        <?php
        // On affiche le reste des résultats dans la colonne de droite
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h2>' . $row['nom'] . '</h2>';
            echo '<p>Prix: ' . $row['prix'] . '</p>';
            echo '<p>Type: ' . $row['typee'] . '</p>';
            echo '<p>Mode: ' . $row['mode'] . '</p>';
            echo '<form class="reservation-form" method="GET" action="feedback.php">';
            echo '<input type="hidden" value="' . $row["nom"] . '" name="nom">';
            echo '<button type="submit" name="reserver" class="btn btn-default btn-sm">Réserver</button>';
            echo '</form>';
            echo '</div>'; // .card-body
            echo '</div>'; // .card
        }
        ?>
    </div>
</div>

          <!-- Pagination -->
    <?php
    $sql = "SELECT COUNT(nom) AS total FROM service";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_records = $row['total'];
    $total_pages = ceil($total_records / $records_per_page);

    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<li class="page-item"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
    echo '</div>';
    ?>

    <!-- Closing database connection -->
    <?php
    $conn->close();
    ?>
            <div id="google_translate_element"></div>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { pageLanguage: 'en' },
            'google_translate_element'
        );
    }
</script>




    <script  src="service.js"></script>
  </body>
</html>

