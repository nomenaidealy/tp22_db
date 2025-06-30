<?php
require("../inc/fonction.php");
ini_set("display_errors", 1);

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
$offset = $page * 20;

// Numéro du département
$num = $_GET['num'] ?? '';
$resultat = select_lien_departement($num, $offset);
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
    <main class="container mt-4">
        <section class="employee-list">
            <header class="mb-4">
                <h2 class="text-center">Employés du département <?php echo htmlspecialchars($num); ?></h2>
            </header>
            <article class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nom complet</th>
                                    <th scope="col">Département</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($donnee = mysqli_fetch_assoc($resultat)) { ?>
                                <tr>
                                    <td class="fw-bold">
                                        <?php echo htmlspecialchars($donnee["first_name"]); ?> 
                                        <?php echo htmlspecialchars($donnee["last_name"]); ?>
                                    </td>
                                    <td>
                                        <span class="fw-bold">
                                            <?php echo htmlspecialchars($donnee["dept_name"]); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="fiche.php?num=<?php echo $donnee["emp_no"]; ?>" 
                                           class="btn btn-sm btn-outline-primary">
                                            Voir fiche
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>
        
    <!-- Pagination -->
    <nav class="mt-4 text-center" aria-label="Navigation">
        <form method="get" class="d-inline">
            <input type="hidden" name="num" value="<?php echo htmlspecialchars($num); ?>">
            <?php if ($page > 0): ?>
                <input type="hidden" name="page" value="<?php echo $page - 1; ?>">
                <input type="submit" class="btn btn-secondary me-2" value="← Précédent">
            <?php endif; ?>
        </form>

        <form method="get" class="d-inline">
            <input type="hidden" name="num" value="<?php echo htmlspecialchars($num); ?>">
            <input type="hidden" name="page" value="<?php echo $page + 1; ?>">
            <input type="submit" class="btn btn-primary" value="Suivant →">
        </form>
    </nav>
</main>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
        <p class="mb-0">
            <small>Système de gestion des employés</small>
        </p>
    </div>
</footer>
</body>
</html>
