<?php
 require("../inc/fonction.php");
ini_set("display_errors",1);
$num=$_GET['num'];
$resultat = select_lien_departement($num);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés du département</title>
   <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Employés du département <?php echo htmlspecialchars($num); ?></h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom employé</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($donnee["last_name"]); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="mt-3">
            <a href="javascript:history.back()" class="btn btn-secondary">
                ← Retour
            </a>
        </div>
    </div>
</body>
</html>