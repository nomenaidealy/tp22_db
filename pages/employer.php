<?php 
    require("../inc/fonction.php");
    ini_set("display_errors",1);
    $num=$_GET['num'];
    $resultat = select_lien_departement($num);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border =1>
        <tr>
        <th>Nom employees</th>
        </tr>
        <?php while($donnee = mysqli_fetch_assoc($resultat))
        {?>
        
       <tr>
       <td><?php echo $donnee["last_name"] ;?></td>
       </tr>

       <?php }?>
        
    </table>
</body>
</html>