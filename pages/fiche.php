<?php 
require("../inc/fonction.php");
ini_set("display_errors", 1);
$num = $_GET['num'];
$resultat = select_lien_employer($num);
$donnee = mysqli_fetch_assoc($resultat);
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

    <div class="mb-3">
        <button onclick="history.back()" class="btn btn-secondary">← Retour</button>
    </div>

    <div class="card shadow-lg mb-4 p-3">
        <div class="row g-0 align-items-center">
            <div class="col-md-3 text-center">
                <img src="/opt/lampp/htdocs/tp22_db/Sans titre.png" alt="Photo de profil" class="img-fluid rounded-circle border border-3" style="width: 120px; height: 120px; object-fit: cover;">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h3 class="card-title mb-2"><?= htmlspecialchars($donnee["first_name"]) . " " . htmlspecialchars($donnee["last_name"]) ?></h3>
                    <p class="mb-1"><strong>Date de naissance :</strong> <?= htmlspecialchars($donnee["birth_date"]) ?></p>
                    <p class="mb-1"><strong>Genre :</strong> <?= htmlspecialchars($donnee["gender"]) ?></p>
                    <p class="mb-1"><strong>Poste :</strong> <span class="text-primary"><?= htmlspecialchars($donnee["title"]) ?></span></p>
                </div>
            </div>
        </div>
    </div>

    <h1 class="mb-4 text-center">Historique</h1>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Titre</th>
                        <th>Salaire</th>
                        <th>Depuis</th>
                        <th>Jusqu'à</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($donnee["title"]) ?></td>
                            <td><?= htmlspecialchars($donnee["salary"]) ?></td>
                            <td><?= htmlspecialchars($donnee["from_date"]) ?></td>
                            <td><?= htmlspecialchars($donnee["to_date"]) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> 

</div>

</body>
</html>
