<?php

// Appel Bd
try {
    $bdd = new PDO('mysql:host=localhost;dbname=immobilier', 'root', 'root');
} catch (Exception $e) {
    die($e->getMessage());
}

// Récupérer les infos de la table logement

$sql = "SELECT * FROM logement WHERE id_logement = :id";
$res = $bdd->prepare($sql);
$res->execute(array(
    "id" => $_GET["id"]
));

if (isset($res)) {
    while ($row = $res->fetch()) {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
            <!-- Lien CSS -->
            <link rel="stylesheet" href="./ficheLogementStyle.css">
            <title>Détails de <?= $row["titre"] ?>
            </title>
        </head>

        <body>
            <!-- Carte BootStrap -->
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="<?= $row['photo'] ?>" alt="photoLogement">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="card-title mb-3"><?= $row["titre"] ?></h3>
                            <h3 class="card-title mb-3">Adresse : <br> <?= $row["adresse"] ?></h3>
                            <h3 class="card-title mb-3"><?= $row["ville"] ?></h3>
                            <h3 class="card-title mb-3"><?= $row["cp"] ?></h3> <br>
                            <h3 class="card-title mb-3">Surface : <?= $row["surface"] ?> m²</h3> <br>
                            <h3 class="card-title my-5">Prix : <?= $row["prix"] ?> €</h3> <br>
                            <h3 class="card-title my-5">Contrat : <?= $row["type"] ?></h3> <br>
                            <p class="card-text mt-6">Description : <?= $row["description"] ?></p>

                            <a class="btn btn-success" href="liste.php">Retour à la liste</a>

                        </div>
                    </div>
                </div>
            </div>

    <?php

    }
} else {
    header("Location: liste.php");
}

    ?>

        </body>

        </html>