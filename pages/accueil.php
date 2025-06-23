<?php 
    require("../inc/fonction.php");
    $resultat = selectDepartments();
    
   
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
        <th>numero d departement</th>
        <th>Nom Departement</th>
        </tr>
        <?php while($donnee = mysqli_fetch_assoc($resultat))
        {?>
        
       <tr>
       <td><?php echo $donnee["dept_no"] ; ?></td>
       <td><?php echo $donnee["dept_name"] ;?></td>
       </tr>

       <?php }?>
        
    </table>
</body>
</html>