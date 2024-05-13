<?php
include "../../Controller/service.php";
$c = new serviceS(); 
$tab = $c->display();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globalsdash.css" />
    <link rel="stylesheet" href="styledash.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                <i class="acc"><img class="home-2" src="img/home-1.png" /></i>
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
            <a href="serviceback.php">
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
                <div class="name">Mayssem soltani</div>
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
        <section class="offre-d-emploi">
        
            <div class="topbar">
                <div class="toggle">
                    <h>Dashboard</h>
                </div>

                <div class="search">
                    <label>
                        <input type="text" id="live_search21" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#live_search21").on('keyup change', function(){
                        $('#recentOrders').html(''); 
                        var input =$(this).val();
                        console.log(input);
                        //if(input!=""){
                            $.ajax({
                                type: 'GET',
                                url:"rechercheserv.php",
                                data: 'input=' + encodeURIComponent(input),
                                success: function(data){
                                    if(data!=""){
                                        $('#recentOrders').append(data); 
                                    }else{
                                        document.getElementById('recentOrders').innerHTML = "<div style='font-size:20px'>aucun offre</div>"
                                    }
                                }
                                   
                              
                            });
                     /*   }else{
                            $("#recentOrders").css("display","none");
                        }*/
                    });
                 });
            </script>
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            <div class="numbers">1,504</div>
                        </div>

                        <div class="cardName">
                             Daily Views
                        </div>
                    </div>
                    
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                    <div class="numbers">
                            <div class="numbers">1,504</div>
                        </div>

                        <div class="cardName">
                             Daily Views
                        </div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                    
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">842</div>
                        <div class="cardName">delete</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders" id="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent service</h2>
                        <a href="serviceajout.php" class="btn">+</a>
                        <a href="listeservice.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>nom</td>
                                <td>niveau</td>
                                <td>prix</td>
                                <td>type</td>
                                <td>mode</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             foreach ($tab as $serv) { 
                                ?>
                                <tr>
                                    <td><?= $serv['nom']; ?></td>
                                    <td><?= $serv['id']; ?></td>
                                    <td><?= $serv['prix']; ?></td>
                                    <td><?= $serv['typee']; ?></td>
                                    <td><?= $serv['mode']; ?></td>
                                    <td>
                                        <form method="GET" action="UPDATE.php">
                                            <input type="submit" name="mise a jour" class="btn btn-default btn-sm" value="mise a jour">
                                            <input type="hidden" value="<?= $serv["nom"] ?>" name="nom">
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-lg" href="delete.php?nom=<?php echo $serv["nom"];?>">
                                            <span class="glyphicon glyphicon-remove"></span>Delete
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
               
                    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <script>
                     function googleTranslateElementInit() {
                       new google.translate.TranslateElement(
                             { pageLanguage: 'en' },
                             'google_translate_element'
                                );
                        }
                    </script>
                    <div class="recentCustomers">
                    <div class="statistics">

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <?php
                            require_once '../../controller/feedController.php'; // Assurez-vous que le chemin est correct

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
            </div>
        </div>     
    </section>
    
    <script  src="serviceback.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
</html>  