<?php
include '../../Controller/ges_off_empG.php'; 
include '../../Controller/ges_entrepriseG.php';
$ges_off_empG = new ges_off_empG(); 
$list = $ges_off_empG->listsaved(); 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="offred'emploi.css" />
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
            <a href="service.php">
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
        <div class="topbar">
          <div class="search">
              <label>
                  <input type="text" id="live_search12" placeholder="Search here">
                  <ion-icon name="search-outline"></ion-icon>
              </label>
          </div>
          <img class="notify" src="img/notify-1.png" />
          <div class="userj">
              <div class="ellipse1"></div>
             <img class="userjj" src="img/user-1-1.png"  alt="profileImg">
          </div>
      </div>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#live_search12").on('keyup change', function(){
                        $('#jobList').html(''); 
                        var input =$(this).val();
                        console.log(input);
                        $.ajax({
                            type: 'GET',
                            url:"rechercheoff1.php",
                            data: 'input=' + encodeURIComponent(input),
                            success: function(data){
                                if(data!=""){
                                    $('#jobList').append(data); 
                                }else{
                                    document.getElementById('jobList').innerHTML = "<div style='font-size:20px'>aucun offre</div>"
                                }
                            }
                        });
                    });
                 });
            </script>
    <section class="offre-d-emploi">
      <div class="scrollable-list">
      <ul id="jobList">
            <?php
              foreach ($list as $ges_off_emp) { 
              ?>
              <li>
                <div class="group-10">
                    <div class="text-wrapper-15" id="tit"><?= $ges_off_emp['titre_off']; ?></div>
                </div>
              </li>
            <?php } ?>
      </ul>
      </div>
    </section>

  </body>
</html>
