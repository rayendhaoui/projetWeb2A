<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Statistiques des Feedback</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css"> <!-- Assurez-vous que ce chemin est correct -->
    <style>
/* Style de base */
body {
    display: flex;
    justify-content: center; /* Centre horizontalement */
    align-items: center; /* Centre verticalement */
    height: 100vh; /* La hauteur de la page */
    margin: 0; /* Pas de marge */
    background-color: #f5f5f5; /* Couleur de fond de la page */
}

/* Style pour la section des statistiques */
.statistics {
    border: 1px solid #ddd;
    padding: 20px;
    margin: 20px;
    border-radius: 10px;
    background: #ffffff;
    width: 80%;
    max-width: 600px;
    text-align: center;
}

/* Style pour les cercles visuels */
.circle-statistics {
    display: flex;
    justify-content: space-around;
    padding: 20px;
}

.stat-circle {
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    text-align: center;
    font-size: 20px;
    background-color: #f2f2f2;
    border: 2px solid #ddd;
}

.circle-likes {
    background-color: #4CAF50;
    color: white;
}

.circle-dislikes {
    background-color: #f44336;
    color: white;
}
    </style>
</head>
<body>

<div class="statistics" >
    <h2>Statistiques des Feedback</h2>

    <?php
require_once '../controller/feedController.php'; // Assurez-vous que le chemin est correct

$feedC = new feedC();
$feed = $feedC->statis(); // Utilisez le bon nom de variable pour stocker les statistiques

if ($feed) { // Utilisez 'feed' pour valider
    echo '<table class="feed-table">';
    echo '<tr><th>Statistique</th><th>Valeur</th></tr>';
    echo '<tr><td>Total des Feedback</td><td>' . $feed['total'] . '</td></tr>';
    echo '<tr><td>Total des Likes</td><td>' . $feed['likes'] . '</td></tr>';
    echo '<tr><td>Total des Dislikes</td><td>' . $feed['dislikes'] . '</td></tr>';
    echo '<tr><td>Pourcentage des Likes</td><td>' . number_format($feed['like_percentage'], 2) . '%</td></tr>';
    echo '<tr><td>Pourcentage des Dislikes</td><td>' . number_format($feed['dislike_percentage'], 2) . '%</td></tr>';
    echo '</table>';
} else {
    echo '<p>Aucune statistique disponible.</p>';
}
?>
 <canvas id="feedbackChart" width="400" height="400"></canvas>
</div>

<script>
    const ctx = document.getElementById('feedbackChart').getContext('2d');

    const feedbackData = {
        labels: ['Likes', 'Dislikes'],
        datasets: [{
            data: [<?php echo $feed['likes']; ?>, <?php echo $feed['dislikes']; ?>], // Données des statistiques
            backgroundColor: ['#FAEBEFFF', '#333D79FF'], // Couleurs
        }]
    };

    const feedbackChart = new Chart(ctx, {
        type: 'pie', // Type de graphique
        data: feedbackData,
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
            },
        },
    });
</script>


</body>
</html>
