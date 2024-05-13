<?php
include '../../Controller/ges_off_empG.php'; 
include '../../Controller/ges_entrepriseG.php';
$ges_off_empG = new ges_off_empG(); 
$list = $ges_off_empG->listoffre(); 
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
            <a href="offred\'emploi.php">
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
            <a href="saved.php">
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
                <button style="position: absolute;height: 100%; width: 100%;background-color: transparent; border: none;" onclick="toggle(); fonction1('<?= $ges_off_emp['titre_off']; ?>');">
                    <td> 
                      <?php $image_data=base64_encode($ges_off_emp['photo']); $image_mine ='image/jpeg';$image_src="data:{$image_mine};base64,{$image_data}";?>
                      <img style="position: absolute; top: 0px; left: -50px; width: 50px; height: 50px;" src="<?= $image_src; ?>" alt="image" >
                    </td>
                    <div class="text-wrapper-15" id="tit"><?= $ges_off_emp['titre_off']; ?></div>
                    <p class="span-wrapper"><span class="span"><?= $ges_off_emp['nom_ent']; ?></span></p>
                    <div class="gouvernorat-tunis-2"><?= $ges_off_emp['lieu_ent']; ?></div>
                    <div class="promu-e-candidature-2">Promu(e)<br /><?= $ges_off_emp['type_off']; ?></div>
                    <input type="hidden" value="<?= $ges_off_emp['titre_off']; ?>" name="titre_off">
                  </button> 
                </div>
              </li>
            <?php } ?>
      </ul>
     
      </div>
      <div id="div1" class="div1">
        <div class="overlap">
            <img class="icon-briefcase" src="img/icon-briefcase.png" />
            <div class="text-wrapper">...</div>
            <button class="pdf" style="background-color: transparent; border: none;" onclick="redirection();">
              <img class="re" src="img/re-2.png" />
            </button>

            <div class="charg-e-commercial-e">
            </div>
            <button class="div-wrapper"  onclick="fonction2(); " ><div class="div">Enregistre</div></button>
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-wrapper-2">Candidature simplifiée</div>
            </div>
            <p class="nous-recherchons">
            </p>
            <div class="overlap-3">
              <div class="rectangle-3"></div>
              <div class="ellipse"></div>
              <img class="user" src="img/user-1-1.png"  alt="profileImg">
              <button class="rectangle-4" onclick="fonction3();"></button>
              <div class="text-wrapper-3">Message</div>
              <img class="send" src="img/send-2.png" />
              <div class="text-wrapper-4">Rencontrez l’équipe de recrutement</div>
              <p class="portage-salarial">
                Portage salarial | Chargée Marketing &amp; prospection<br />Auteur de l’offre d’emploi
              </p>
              <p class="exempl-ben-raexp"><span class="span">exempl Ben Raexp &nbsp;&nbsp;3e et +</span></p>
            </div>
            <p class="RD-PORTAGE">
              <span class="text-wrapper-5"
                ><div class="text-wrapper-23" style="position: absolute;
                top: 65px;
                left: 20px;
                font-family: 'Inter-Light', Helvetica;
                font-weight: 300;
                color: #000000;
                font-size: 11px;
                letter-spacing: 0;"></div><div class="text-wrapper-24" style="position: absolute;
                top: 65px;
                left: 100px;
                font-family: 'Inter-Light', Helvetica;
                font-weight: 300;
                color: #000000;
                font-size: 11px;
                letter-spacing: 0;"></div><div class="text-wrapper-40" style="position: absolute;
                top: 65px;
                left: 400px;
                font-family: 'Inter-Light', Helvetica;
                font-weight: 300;
                color: #000000;
                font-size: 11px;
                letter-spacing: 0;"> Plus de </div><div class="text-wrapper-25" style="position: absolute;
                top: 65px;
                left: 445px;
                font-family: 'Inter-Light', Helvetica;
                font-weight: 300;
                color: #000000;
                font-size: 11px;
                letter-spacing: 0;"></div><div class="text-wrapper-41" style="position: absolute;
                top: 65px;
                left: 500px;
                font-family: 'Inter-Light', Helvetica;
                font-weight: 300;
                color: #000000;
                font-size: 11px;
                letter-spacing: 0;"> candidats</div></span
              >
            </p>
            <br><div class="text-wrapper-6"></div>
            <p class="p">11-50 employés · <div class="text-wrapper-26" style="position: absolute;
                top: 150px;
                left: 150px;
                font-family: 'Inter-Light', Helvetica;
                font-weight: 300;
                color: #000000;
                font-size: 11px;
                letter-spacing: 0;"> </div></p>
            <p class="text-wrapper-7">Compétences : Communication stratégique, Processus commerciaux et 8 en plus</p>
            <p class="d-couvrez-comment">
              Découvrez comment vous vous positionnez par rapport à plus de 100 autres<br />
              candidats.
            </p>
            <p class="text-wrapper-8">À propos de l’offre d’emploi</p>
          </div>
      </div> 
    </section>
    <script  src="offred'emploi.js"></script>
      <script >
      function fonction1(titreOff) {
      // Effectuer une requête AJAX vers le script PHP
        fetch(`get_offre.php?offre_id=${titreOff}`)
            .then(response => response.json())
            .then(data => {
              data.forEach(ffff=> {
                        var titreDiv1 = document.querySelector('.charg-e-commercial-e');
                        titreDiv1.textContent = ffff.id;
                        var discrptiondiv =document.querySelector('.nous-recherchons');
                        discrptiondiv.textContent = ffff.dis;
                        var nom_ent =document.querySelector('.text-wrapper-23');
                        nom_ent.textContent = ffff.nom_en;
                        var locations =document.querySelector('.text-wrapper-24');
                        locations.textContent = ffff.lieu;
                        var nombr =document.querySelector('.text-wrapper-25');
                        nombr.textContent = ffff.nbr;
                        var tyype =document.querySelector('.text-wrapper-26');
                        tyype.textContent = ffff.type;
                        var moode =document.querySelector('.text-wrapper-6');
                        moode.textContent = ffff.mode;
                        var nomr =document.querySelector('.text-wrapper-28');
                        nomr.textContent = ffff.nom_r;
              });
            })
            .catch(error => {
                console.error("Erreur lors de la récupération des données de l'offre:", error);
            });
      }
      </script>
      <script>
function fonction2() {
    var t = document.querySelector('.charg-e-commercial-e');
    var xd = t.textContent;
    fetch(`set_saved.php?offre_id=${xd}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('La requête a échoué.');
        }
        console.log('Données envoyées avec succès.');
    })
    .catch(error => {
        console.error('Erreur lors de l\'envoi des données:', error);
    });
}

function fonction3(){
  window.location.href = '../back%20end/demande.html';
}
</script>
<script>
function redirection() {
    var t = document.querySelector('.charg-e-commercial-e');
    var xd = t.textContent;
    fetch(`PDF.php?offre_id=${xd}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('La requête a échoué.');
        }
        // Convert the response to a blob
        return response.blob();
    })
    .then(blob => {
        // Create a temporary link element
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.setAttribute('download', 'job_offer.pdf'); // Set the filename for the download
        // Trigger click event to start download
        a.click();
        // Cleanup: remove the temporary link and revoke the URL after a short delay
        setTimeout(() => {
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
        }, 100);
    })
    .catch(error => {
        console.error('Erreur lors de la génération du PDF:', error);
    });
}
</script>



    
  </body>
</html>
