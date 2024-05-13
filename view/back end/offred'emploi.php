<?php
include '../../Controller/ges_off_empG.php'; 
include '../../Controller/ges_entrepriseG.php';
$ges_off_empG = new ges_off_empG(); 
$lastoffre = $ges_off_empG->getlastoffre();
$ges_entrepriseG = new ges_entrepriseG(); 
$lastentreprise = $ges_entrepriseG->getlastentreprise();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
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
        <section class="offre-d-emploi">
        
            <div class="topbar">
                <div class="toggle">
                    <h>Dashboard</h>
                </div>

                <div class="search">
                    <label>
                        <input type="text" id="live_search12" placeholder="Search here">
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
                    $("#live_search12").on('keyup change', function(){
                        $('#recentOrders').html(''); 
                        var input =$(this).val();
                        console.log(input);
                        $.ajax({
                            type: 'GET',
                            url:"rechercheoff.php",
                            data: 'input=' + encodeURIComponent(input),
                            success: function(data){
                                if(data!=""){
                                    $('#recentOrders').append(data); 
                                }else{
                                    document.getElementById('recentOrders').innerHTML = "<div style='font-size:20px'>aucun offre</div>"
                                }
                            }
                        });
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
                        <?php
                            $nboffre = $ges_off_empG->getnboffre();
                        ?>
                        <div class="numbers">
                            <?php echo $nboffre['nb_offres']; ?>
                        </div>

                        <div class="cardName">
                            offres d'emploi
                        </div>
                    </div>
                    
                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                            $nbent = $ges_entrepriseG->getnbent();
                        ?>
                        <div class="numbers">
                            <?php echo $nbent['nbent']; ?>
                        </div>
                        <div class="cardName">entreprise</div>
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
                        <h2>Recent Offres</h2>
                        <a href="ajoutoffre.html" class="btn">+</a>
                        <a href="listoffre.php" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>photo</td>
                                <td>titre_off</td>
                                <td>nom_ent</td>
                                <td>lieu_ent</td>
                                <td>nbr_emp</td>
                                <td>type_off</td>
                                <td>mode_trav</td>
                                <td>nom_rec</td>
                                <td>date_rec</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             foreach ($lastoffre as $ges_off_emp) { 
                                ?>
                                <tr>
                                    <td> 
                                        <?php
                                            $image_data=base64_encode($ges_off_emp['photo']);
                                            $image_mine ='image/jpeg';
                                            $image_src="data:{$image_mine};base64,{$image_data}";
                                            ?>
                                            <img style="width: 50px; height: 50px;" src="<?php echo $image_src;?>"alt="image" >
                                    </td>
                                    <td><?= $ges_off_emp['titre_off']; ?></td>
                                    <td><?= $ges_off_emp['nom_ent']; ?></td>
                                    <td><?= $ges_off_emp['lieu_ent']; ?></td>
                                    <td><?= $ges_off_emp['nbr_emp']; ?></td>
                                    <td><?= $ges_off_emp['type_off']; ?></td>
                                    <td><?= $ges_off_emp['mode_trav']; ?></td>
                                    <td><?= $ges_off_emp['nom_rec']; ?></td>
                                    <td><?= $ges_off_emp['date_rec']; ?></td>
                                    <td> 
                                        <form method="POST" action="PDF.php">
                                            <input type="submit" name="PDF" value="PDF">
                                            <input type="hidden" value="<?= $ges_off_emp['titre_off']; ?>" name="titre_off">
                                        </form>
                                    </td>
                                    <td >
                                        <form method="POST" action="updateoffre.php">
                                            <input type="submit" name="update" value="Update">
                                            <input type="hidden" value="<?= $ges_off_emp['titre_off']; ?>" name="titre_off">
                                        </form>
                                    </td>
                                    <td>
                                        <a href="deleteoffre.php?titre_off=<?php echo $ges_off_emp['titre_off']; ?>">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Entreprise</h2>
                        <a href="ajoutentreprise.html" class="btn">+</a>
                        <a href="listentreprise.php" class="btn">View All</a>
                    </div>

                    <table>
                        <?php foreach ($lastentreprise as $ges_entreprise) { ?>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><?php
                                            $image_data=base64_encode($ges_entreprise['photo']);
                                            $image_mine ='image/jpeg';
                                            $image_src="data:{$image_mine};base64,{$image_data}";
                                            ?>
                                            <img src="<?php echo $image_src;?>"alt="image" ></div>
                            </td>
                            <td>
                                <h4><?= $ges_entreprise['nom_ent']; ?> <br> <span><?= $ges_entreprise['lieu_ent']; ?></span></h4>
                            </td>
                            <td >
                                <form method="POST" action="updateentreprise.php">
                                    <input type="submit" name="update" value="Update">
                                    <input type="hidden" value="<?= $ges_entreprise['nom_ent']; ?>" name="nom_ent">
                                </form>
                            </td>
                            <td>
                                <a href="deleteentreprise.php?nom_ent=<?php echo $ges_entreprise['nom_ent']; ?>">Delete</a>
                            </td>
                        </tr>                  
                    <?php } ?>
                    </table>
                                </div>

                            <div class="recentOrders">
                            <div class="statistics">
                    <?php
                    $ges_off_empG = new ges_off_empG();
                    $feed = $ges_off_empG->statis(); // Utilisez le bon nom de variable pour stocker les statistiques

                    if ($feed) { 
                        echo '<table class="feed-table">';
                        echo '<tr><th>Statistique</th><th>Valeur</th></tr>';
                        echo '<tr><td>Total des offre</td><td>' . $feed['total'] . '</td></tr>';
                        echo '<tr><td>Total des validé</td><td>' . $feed['validé'] . '</td></tr>';
                        echo '<tr><td>Total des encours de traitement</td><td>' . $feed['encours_de_traitemen'] . '</td></tr>';
                        echo '<tr><td>Pourcentage des validé</td><td>' . number_format($feed['validé_percentage'], 2) . '%</td></tr>';
                        echo '<tr><td>Pourcentage des encours de traitement</td><td>' . number_format($feed['encours_de_traitemen_percentage'], 2) . '%</td></tr>';
                        echo '</table>';
                    } else {
                        echo '<p>Aucune statistique disponible.</p>';
                    }
                    ?>
                    <!-- Réduire la taille du canvas -->
                    <canvas id="feedbackChart" width="150" height="150"></canvas>
                </div>

                <script>
                    const ctx = document.getElementById('feedbackChart').getContext('2d');

                    const feedbackData = {
                        labels: ['validé', 'encours_de_traitemen'],
                        datasets: [{
                            data: [<?php echo $feed['validé']; ?>, <?php echo $feed['encours_de_traitemen']; ?>], // Données des statistiques
                            backgroundColor: ['#3e95cd', '#8e5ea2'], // Couleurs personnalisées
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
                            cutoutPercentage: 70, // Pourcentage du rayon intérieur par rapport au rayon extérieur
                        },
                    });
                </script>    
            </div>
        </div>
        <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { pageLanguage: 'en' },
            'google_translate_element'
        );
    }
    </script>     
    </section>
    
    <script  src="offred'emploi.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
</body>
</html>



