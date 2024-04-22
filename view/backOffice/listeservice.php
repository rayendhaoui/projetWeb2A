<?php
include "../../controller/service.php";

$c = new serviceS(); 
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
$sql = "SELECT * FROM service LIMIT $offset, $records_per_page";
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
            <li><a href="serviceajout.php">Add Service</a></li>
            <li><a href="listeservice.php">List Reclamation</a></li>
            <li><a href="UPDATE.php">Update</a></li>
        </ul> 
    </div>

    <hr>

    <!-- Display Table -->
    <table border="1" align="center" width="30%" height="40%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
            <th>Nom du service&nbsp;&nbsp;</th>
            <th>Prix du service&nbsp;&nbsp;</th>
            <th>Type du service&nbsp;&nbsp;</th>
            <th>Mode du service&nbsp;&nbsp;</th>
            <th>Modifier&nbsp;&nbsp;</th>
            <th>Supprimer&nbsp;&nbsp;</th>
        </tr>

        <?php
        while ($row = $result->fetch_assoc()) {
            echo '<tr class="odd gradeX">';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['prix'] . '</td>';
            echo '<td>' . $row['typee'] . '</td>';
            echo '<td>' . $row['mode'] . '</td>';
            
            // Update form button
            echo '<td>';
            echo '<form method="GET" action="UPDATE.php">';
            echo '<input type="hidden" value="' . $row["nom"] . '" name="nom">'; 
            echo '<input type="submit" name="mise a jour" class="btn btn-default btn-sm" value="mise a jour">';
            echo '</form>';
            echo '</td>';
            
            // Delete button with link
            echo '<td>';
            echo '<a class="btn btn-info btn-lg" href="delete.php?nom=' . $row["nom"] . '"><span class="glyphicon glyphicon-remove"></span>Delete</a>';
            echo '</td>';
            
            echo '</tr>';
        }
        ?>
    </table>

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

</body>
</html>
