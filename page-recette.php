<?php
include 'header.php';

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
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
