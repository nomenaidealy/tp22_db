<?php 
    require("../inc/fonction.php");
    ini_set("display_errors",1);
    $num = $_GET['num'];
    $resultat = select_lien_employer($num);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"><?php 
    require("../inc/fonction.php");
    ini_set("display_errors",1);
    $num = $_GET['num'];
    $resultat = select_lien_employer($num);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Départements</title>
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
           <div class="mt-3">
<button onclick="history.back()" class="btn btn-secondary">← Retour</button>
</div>
        <h1 class="mb-4 text-center">Gestion des Départements</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Genre</th>
                            <th>Date de naissance</th>
                            <th>titre</th>
                            <th>Salaire</th>
                            <th>Depuis</th>
                            <th>Jusqu'a</th>
                            
                        </tr>
                    </thead>
                <tbody>
<?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
<tr>
<td><?php echo htmlspecialchars($donnee["first_name"]); ?></td>
<td><?php echo htmlspecialchars($donnee["last_name"]); ?></td>
<td><?php echo htmlspecialchars($donnee["gender"]); ?></td>
<td><?php echo htmlspecialchars($donnee["birth_date"]); ?></td>
<td><?php echo htmlspecialchars($donnee["title"]); ?></td>
<td><?php echo htmlspecialchars($donnee["salary"]); ?></td>
<td><?php echo htmlspecialchars($donnee["from_date"]); ?></td>
<td><?php echo htmlspecialchars($donnee["to_date"]); ?></td>
</tr>
<?php } ?>
</tbody>
                </table>
            </div>
        </div> 
     
        </div>
    </div>
</body>
</html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Départements</title>
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
           <div class="mt-3">
<button onclick="history.back()" class="btn btn-secondary">← Retour</button>
</div>
        <h1 class="mb-4 text-center">Gestion des Départements</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Genre</th>
                            <th>Date de naissance</th>
                            <th>titre</th>
                            <th>Salaire</th>
                            <th>Depuis</th>
                            <th>Jusqu'a</th>
                            
                        </tr>
                    </thead>
                <tbody>
<?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
<tr>
<td><?php echo htmlspecialchars($donnee["first_name"]); ?></td>
<td><?php echo htmlspecialchars($donnee["last_name"]); ?></td>
<td><?php echo htmlspecialchars($donnee["gender"]); ?></td>
<td><?php echo htmlspecialchars($donnee["birth_date"]); ?></td>
<td><?php echo htmlspecialchars($donnee["title"]); ?></td>
<td><?php echo htmlspecialchars($donnee["salary"]); ?></td>
<td><?php echo htmlspecialchars($donnee["from_date"]); ?></td>
<td><?php echo htmlspecialchars($donnee["to_date"]); ?></td>
</tr>
<?php } ?>
</tbody>
                </table>
            </div>
        </div> 
     
        </div>
    </div>
</body>
</html>