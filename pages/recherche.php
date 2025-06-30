<?php 
    require("../inc/fonction.php");
    ini_set("display_errors",1);
    $resultat = select_department_name();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="ResultatRecherche.php" method="get">
   <p>departements <select name="departement" id="0">
        <option value="">choisir un departement</option>
        <?php while($donnee = mysqli_fetch_assoc($resultat)){  ?>
                <option value="<?php echo $donnee["dept_name"] ; ?>"><?php echo $donnee["dept_name"] ; ?> </option>
        <?php } ?>
    </select>
    <select name="mode" id="1">
        <option value="commencer">Commencer</option>
        <option value="contenir">Contenir</option>
    </select></p>
   <p> employees<input type="text" placeholder="tapez le nom" value="recherche"></p> 
   <p>min <input type="number" min="0" max="100" step="1" value="min"> </p>
    <p> max <input type="number" min="0" max="100" step="1" value="max"></p>
    <input type="submit" value="envoyer">
</form>
</body>
</html>