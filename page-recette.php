<?php
include 'header.php';
?>

<?php
$allrecette = $db->query('SELECT recette_name FROM recettes'); 
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allrecette = $db->query('SELECT recette_name FROM recettes WHERE recette_name LIKE "%'.$recherche.'%" '); 

}
?>
<main style="min-height:80vh">
<!DOCTYPE html>
<html>
    <head>
    <meta charset = "utf-8">
    <link rel="stylesheet" href="page-recette.css">
    <title>Barre de recherche</title>
    </head>
        <body>
            <div class=barrederecherche>
            <form method = "GET">
            <input type = "search" name = "s" placeholder="Rechercher une recette">
            <input type = "submit" name = "Rechercher" value = "Rechercher">
            </form>
            <section class= "afficher_recette">

            <?php
            if($allrecette->rowCount() > 0){
                while($recettes = $allrecette->fetch()){
            ?>
            <p><?= $recettes['recette_name']; ?></p>
            <?php
            }

            }else{
            ?>
            <p>Aucune recette n'a été trouvée</p>
            <?php

        }
    ?>

  </section>
  </div>
 </body>
</html>



<?php
$request = $db->prepare("SELECT recette_id, recette_name, recette_difficultee, recette_nb_personne FROM recettes");
$request->execute([]);

$results = $request->fetchAll();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des recettes</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="th-sm">Nom</th>
                                <th scope="col" class="th-sm">Difficultée</th>
                                <th scope="col" class="th-sm">Nombre de personne</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $result) {?>
                            <tr>
                                <td><a href="details.php?id=<?= $result['recette_id']?>"><?= $result['recette_name']?></a></td>
                                <td><?= $result['recette_difficultee']?></td>
                                <td><?= $result['recette_nb_personne']?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</main>
<?php
include 'footer.php';
?>
