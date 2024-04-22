

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta charset="utf-8" />
    <title>ajout article</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    /* Add your CSS styles here */
    #map {
      height: 400px;
      width: 100%;
    }
    h2 .green-text {
    color: green;
  }
    /* Other styles... */
  </style>
<body>
    
    <header>
        <a href="#" ><i </i>Gestion article</a>
        <ul class="menu">
            <li><a href="index.php">Acceuil</a></li>

            <li><a href="compte.php"><img src="images/1.png" alt="compte" width="5%"></a></li>
            <li><a href="login.php">login</a></li>
        </ul>

        <!-- menu responsive -->
         <!-- menu responsive -->
         <div class="toggle_menu"></div>
        </header>
    <!-- section reservation -->
    <br>
    <br>
    <section id="reservation">
        <img class="wave" src="images/blue.jpg">
       

        <h2 style="color:#FFFFFF;">article ajouter</h2>


            <script>
            function initMap() {
        // Initialize the map
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -34.397, lng: 150.644 },
          zoom: 8,
        });

        // Try HTML5 geolocation to center the map on the user's current location
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            (position) => {
              const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
              };
              map.setCenter(pos);
            },
            () => {
              // Handle errors
              alert("Geolocation failed, please enter your address manually.");
            }
          );
        } else {
          // Browser doesn't support Geolocation
          alert("Your browser doesn't support geolocation, please enter your address manually.");
        }
      }
            
            
            
            document.getElementById("ins").addEventListener("keyup",function(e1)
                {
                var valeur=document.getElementById("nom").value;
                var val1=document.getElementById("prenom").value;
                if(((document.getElementById("nom").value.length<3))||(/[0-9]+/.test(valeur)))//si le champs n'est pas un nombre(chaine de caractere)
                {
                document.getElementById("error1").innerHTML="3 carractere au minimum";
                document.getElementById("err1").innerHTML="<span style='color:red;'> * </span>";

                }
                else
                {
                    document.getElementById("error1").innerHTML="<span style='color:green;'>Correct</span>";
                    document.getElementById("err1").innerHTML="<span style='color:green;'> * </span>"; 
                    
                }
                if(((document.getElementById("prenom").value.length<3))||(/[0-9]+/.test(valeur)))//si le champs n'est pas un nombre(chaine de caractere)
                {
                document.getElementById("error2").innerHTML="3 carractere au minimum";
                document.getElementById("err2").innerHTML="<span style='color:red;'> * </span>";

                }
                else
                {
                    document.getElementById("error2").innerHTML="<span style='color:green;'>Correct</span>";
                    document.getElementById("err2").innerHTML="<span style='color:green;'> * </span>"; 
                    
                }
                })
document.getElementById("ins").addEventListener("submit",function(e)
{

if((document.getElementById("prenom").value.length)<4)
{
    erreur="le prenom doit compter au minimum 4 caractere ";
    document.getElementById("error2").innerHTML=erreur;
     document.getElementById("err2").innerHTML="<span style='color:red;'> * </span>";
}
else
{   
    document.getElementById("error2").innerHTML="<span style='color:green;'>Correct</span>";
                    document.getElementById("err2").innerHTML="<span style='color:green;'> * </span>"; 
}

if((document.getElementById("first").value.length)<3)
{
    erreur="le nom doit compter au minimum 3 caractere";
    document.getElementById("error1").innerHTML=erreur;
    document.getElementById("err1").innerHTML="<span style='color:red;'> * </span>";
}
else
{
    document.getElementById("error1").innerHTML=" ";
    document.getElementById("err1").innerHTML="<span style='color:green;'> * </span>";
}
if (erreur!="")
 {
e.preventDefault();
return false;
}
else if(erreur="")
{
alert('Formulaire envoyé!');
}
});




                </script>
                <script
                async
                defer
                src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                type="text/javascript"
              ></script>
        
     </section>
     
<!--section login -->
</body>
</html>>