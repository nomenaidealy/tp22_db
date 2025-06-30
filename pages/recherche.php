<?php 
    require("../inc/fonction.php");
    ini_set("display_errors",1);
    $resultat = select_department_name();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Recherche Départements</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4 text-center text-secondary">Recherche Départements</h1>
    
    <form action="ResultatRecherche.php" method="get" class="border p-4 bg-white rounded shadow-sm">
        <div class="mb-3">
            <label for="0" class="form-label fw-bold text-secondary">Départements</label>
            <select name="departement" id="0" class="form-select">
                <option value="">Choisir un département</option>
                <?php while($donnee = mysqli_fetch_assoc($resultat)){  ?>
                    <option value="<?php echo htmlspecialchars($donnee["dept_name"]); ?>">
                        <?php echo htmlspecialchars($donnee["dept_name"]); ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="1" class="form-label fw-bold text-secondary">Mode de recherche</label>
            <select name="mode" id="1" class="form-select">
                <option value="commencer">Commencer</option>
                <option value="contenir">Contenir</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="recherche" class="form-label fw-bold text-secondary">Employees</label>
            <input type="text" placeholder="Tapez le nom" name="recherche" id="recherche" class="form-control" />
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="min" class="form-label fw-bold text-secondary">Min</label>
                <input type="number" min="0" max="100" step="1" name="min" id="min" class="form-control" />
            </div>
            <div class="col-md-6 mb-3">
                <label for="max" class="form-label fw-bold text-secondary">Max</label>
                <input type="number" min="0" max="100" step="1" name="max" id="max" class="form-control" />
            </div>
        </div>

        <button type="submit" class="btn btn-secondary w-100">Envoyer</button>
    </form>
</div>
</body>
</html>
