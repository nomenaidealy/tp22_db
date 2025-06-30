<?php 
require("../inc/fonction.php");
ini_set("display_errors",1);
$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$offset = $page * 20;


$mode = $_GET['mode'];
$departement = $_GET['departement'];
$mot = $_GET['recherche'];
$min = $_GET['min'];
$max = $_GET['max'];
$resultat = select_recherche($mode, $departement, $mot, $min, $max, $offset);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat de la recherche</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Résultats de la recherche</h1>
        
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom de l'employé</th>
                            <th>Numéro</th>
                            <th>Fiche</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (mysqli_num_rows($resultat) > 0) { ?>
                        <?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
                        <tr>
                            <td><?php echo $donnee["last_name"]; ?></td>
                            <td><?php echo $donnee["emp_no"]; ?></td>
                            <td>
                                        <a href="fiche.php?num=<?php echo $donnee["emp_no"]; ?>" 
                                           class="btn btn-sm btn-outline-primary">
                                            Voir fiche
                                        </a>
                                    </td>
                        </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="2" class="text-center text-danger">Aucun résultat trouvé.</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row-1">
            <div class="mt-3 text-center">
                <a href="../index.php" class="btn btn-secondary">← Retour</a>
        
            </div>
             <div  class="mt-3 text-center">
                    <form method="get">
                        <input type="hidden" name="mode" value="<?php echo $mode; ?>">
                        <input type="hidden" name="departement" value="<?php echo $departement; ?>">
                        <input type="hidden" name="recherche" value="<?php echo $mot; ?>">
                        <input type="hidden" name="min" value="<?php echo $min; ?>">
                        <input type="hidden" name="max" value="<?php echo $max; ?>">
                        <input type="hidden" name="page" value="<?php echo $page + 1; ?>">
                        <input type="submit" value="Suivant →" class="btn btn-primary">
                    </form>
            </div>

        </div>
    </div>
  

</body>
</html>
