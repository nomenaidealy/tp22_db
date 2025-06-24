<?php 
    require("../inc/fonction.php");
    ini_set("display_errors",1);
    $resultat = select_name_manager();
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
        <h1 class="mb-4 text-center">Gestion des Départements</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Numéro de département</th>
                            <th>Nom du département</th>
                            <th>Nom du manager</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
                        <tr>
                            <td>
                                <a href="employer.php?num=<?php echo $donnee["dept_no"]; ?>" 
                                   class="text-decoration-none fw-bold">
                                    <?php echo $donnee["dept_no"]; ?>
                                </a>
                            </td>
                            <td><?php echo $donnee["dept_name"]; ?></td>
                            <td><?php echo $donnee["last_name"]; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>   <div class="mt-3">
<a href="../index.php" target="_blank" class="btn btn-secondary">← Retour</a>
        </div>
        </div>
    </div>
</body>
</html>