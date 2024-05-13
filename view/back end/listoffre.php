<?php
include '../../Controller/ges_off_empG.php'; 
$ges_off_empG = new ges_off_empG(); 
$list = $ges_off_empG->listoffre(); 
?>
<html>

<head>
    <link rel="stylesheet" href="listoffre.css"></head>

<body>
    
<div id="google_translate_element"></div>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { pageLanguage: 'en' },
            'google_translate_element'
        );
    }
</script>       
    <center>
        <h1>List of offre d'emploi</h1>
        <h2>
        </h2>
        <input type="text" id="live_search" placeholder="Search...">

    </center>
    <table border="1" align="center" width="100%" table-layout="fixed" border-collapse="collapse" border="3px solid #1d2d44" background-color= "#f0ebd8" margin-left="calc(200px + 100px)" margin-right= "0%">
       
    <div class="tth" id="recentOrders">
        <tr>
            <th style="width: 100px;">photo</th>
            <th style="width: 100px;">titre_off</th>
            <th style="width: 100px;">nom_ent</th>
            <th style="width: 100px;">lieu_ent</th>
            <th style="width: 100px;">nbr_emp</th>
            <th style="width: 100px;">type_off</th>
            <th style="width: 100px;">mode_trav</th>
            <th style="width: 100px;">nom_rec</th>
            <th style="width: 100px;">date_rec</th>
            <th style="width: 100px;">descrip</th>
        </tr>
        <?php
        foreach ($list as $ges_off_emp) {
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
                <td><?= $ges_off_emp['descrip']; ?></td>

               
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
        <?php
        }
        ?>
        </div>
    </table> 
   
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
                $(document).ready(function(){
                    $("#live_search").on('keyup change', function(){
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
            
</body>

</html>