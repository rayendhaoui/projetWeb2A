
<?PHP

session_start();

if(!empty($_SESSION['e']))
{  
    if($_SESSION['r']=="admin")
    {
        echo "<script type='text/javascript'>document.location.replace('ajouteradmine.php');</script>";
    }
    if($_SESSION['r']=="produit")
    {
        echo "<script type='text/javascript'>document.location.replace('afficherprod.php');</script>";
       
    }
    if($_SESSION['r']=="sav")
    { echo "<script type='text/javascript'>document.location.replace('AfficherReclamation.php');</script>";
       
    }
    if($_SESSION['r']=="commande")
    { echo "<script type='text/javascript'>document.location.replace('afficherlignecommande.php');</script>";
      
    }
    if($_SESSION['r']=="client")
    {echo "<script type='text/javascript'>document.location.replace('afficherclient.php');</script>";
       
    }
    if($_SESSION['r']=="veto")
    {echo "<script type='text/javascript'>document.location.replace('afficherveto.php');</script>";
       
    }
    if($_SESSION['r']=="livraison")
    {echo "<script type='text/javascript'>document.location.replace('affich-article.php');</script>";
       
    }
    
   }
   else
   {
    echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
   }




?>