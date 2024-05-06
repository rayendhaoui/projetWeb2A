<?php
include "C:\\xampp\\htdocs\\gs_service\\controller\\service.php";
$c = new serviceS();

// Connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gs_service";

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
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="offred'emploi.css" />
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>4
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        /* Flexbox pour centrer verticalement mais aligner horizontalement vers la gauche */
        body {
            margin: 0;
            padding: 0;
            height: 100vh; /* Full viewport height */
            overflow: hidden; /* Prevent horizontal scrolling */
        }
        /* Style pour le tableau */
        .table {
            border-collapse: collapse;
            width: 50%; /* Ajustez la largeur selon vos besoins */
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #4CAF50;
            color: white;
            text-align: center;
        }

        .table tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Style pour les boutons */
        .btn {
            padding: 6px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #f7f7f7;
            color: #333;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #ddd;
        }
        /* Style the input text field */
#live_search {
    width: 100%; /* Make it full-width */
    padding: 10px; /* Add padding */
    font-size: 16px; /* Set font size */
    border: 1px solid #ccc; /* Set border */
    border-radius: 4px; /* Round the corners */
    outline: none; /* Remove the outline on focus */
    transition: all 0.2s; /* Smooth transition on hover/focus */
}

/* Change the border color on focus */
#live_search:focus {
    border-color: #66afe9; /* Change border color */
    box-shadow: 0 0 8px rgba(102, 175, 233, 0.6); /* Add a blue glow */
}

/* Style the results container */
#recentOrders {
    border: 1px solid #ddd; /* Add border */
    border-radius: 4px; /* Round the corners */
    background-color: #fff; /* Set background color */
    padding: 10px; /* Add padding */
    margin-top: 10px; /* Add some space from the input field */
    max-height: 300px; /* Set a maximum height */
    overflow-y: auto; /* Enable vertical scrolling if needed */
}

/* Style the text in the results container */
#recentOrders div {
    font-size: 16px; /* Set font size */
    color: #333; /* Set text color */
}

/* Add a hover effect for results, if they are clickable */
#recentOrders div:hover {
    background-color: #f1f1f1; /* Change background color on hover */
    cursor: pointer; /* Change cursor on hover */
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
          <a href="offred'emploi.html">
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
    </div>
    <input type="text" id="live_search" placeholder="Search here...">
<div class="tt" id="recentOrders"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#live_search").keyup(function(){
                        $('#recentOrders').html(''); 
                        var input =$(this).val();
                        //if(input!=""){
                            $.ajax({
                                type: 'GET',
                                url:"rechercheoff.php",
                                data: 'input=' + encodeURIComponent(input),
                                success: function(data){
                                    if(data!=""){
                                        $('#recentOrders').append(data); 
                                    }else{
                                        document.getElementById('recentOrders').innerHTML = "<div style='font-size:20px'>aucun service</div>"
                                    }
                                }
                                   
                              
                            });
                    /*    }else{
                            $("#recentOrders").css("display","none");
                        }*/
                    });
                 });
            </script>


  <table border="1" align="center" width="30%" height="40%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
            <th>Nom du service&nbsp;&nbsp;</th>
            <th>Prix du service&nbsp;&nbsp;</th>
            <th>Type du service&nbsp;&nbsp;</th>
            <th>Niveau d'experience&nbsp;&nbsp;</th>
            <th>Mode du service&nbsp;&nbsp;</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr class="odd gradeX">';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['prix'] . '</td>';
            echo '<td>' . $row['typee'] . '</td>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['mode'] . '</td>';
            
            // Update form button
            echo '<td>';
           // echo '<form method="GET" action="UPDATE.php">';
            echo '<input type="hidden" value="' . $row["nom"] . '" name="nom">'; 
            echo '<input type="submit" name=" reserver" class="btn btn-default btn-sm" value="reserver">';
            //echo '</form>';
            echo '</td>';
            
            // Delete button with link
            
            echo '</tr>';
        }
        ?>
    </table>


    <script  src="offred'emploi.js"></script>
  </body>
</html>
