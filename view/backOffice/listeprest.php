<?php
include "../../controller/prestataireController.php";

$c = new prest(); 
$tab = $c->display();

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
$sql = "SELECT * FROM prestataire LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

// Start of HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service Dashboard</title>
    <link rel="stylesheet" href="update.css"> <!-- Corrected link to stylesheet -->
</head>

<body>
    <!-- Navigation or Dashboard -->
    <div id="dashboard">
        <h1>Dashboard</h1>
        <ul>
        <li><a href="ajoutprest.php"> Ajouter un prestataire</a></li>
            <li><a href="listeprest.php"> Liste des prestataires</a></li>
            <li><a href="updateprest.php">Update</a></li>
        </ul> 
    </div>

    <hr>

    <!-- Display Table -->
    <table border="1" align="center" width="30%" height="40%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
            <th>Identifiant</th>
            <th>Nom </th>
            <th>Métier</th>
            <th>Age</th>
            <th>Salaire</th>
            <th>Niveau d'experience</th>
            <th>Mise a jour</th>
            <th>Supprimer</th>

        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr class="odd gradeX">';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['metier'] . '</td>';
            echo '<td>' . $row['age'] . '</td>';
            echo '<td>' . $row['salaire'] . '</td>';
            echo '<td>' . $row['niveau'] . '</td>';

            // Update form button
            echo '<td>';
            echo '<form method="GET" action="updateprest.php">';
            echo '<input type="hidden" value="' . $row["id"] . '" name="id">'; 
            echo '<input type="submit" name="mise a jour" class="btn btn-default btn-sm" value="mise a jour">';
            echo '</form>';
            echo '</td>';
            
            // Delete button with link
            echo '<td>';
            echo '<a class="btn btn-info btn-lg" href="deleteprest.php?id=' . $row["id"] . '"><span class="glyphicon glyphicon-remove"></span>Delete</a>';
            echo '</td>';
            
            echo '</tr>';
        }
        ?>
    </table>

    <!-- Pagination -->
    <?php
    $sql = "SELECT COUNT(id) AS total FROM prestataire";
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

</body>
</html>
