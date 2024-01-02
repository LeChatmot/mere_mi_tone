<?php
include 'header.php';

try {
    $request = $db->prepare("SELECT recette_name, recette_temps_prepa, recette_temps_cuisson, recette_ingredient, recette_difficultee, recette_nb_personne, recette_img FROM recettes WHERE recette_id = ?");
    $request->execute([$_GET['id']]);
    $recette = $request->fetch();
} catch (Exception $e) {
    var_dump($e->getMessage());
}
?>

<div class="container" style="margin-top:10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $recette['recette_name']?></h5>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $recette['recette_img']?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <p><?= $recette['recette_temps_prepa']?> de preparation</p>
                            <p><?= $recette['recette_temps_cuisson']?> de cuisson</p>
                            <p><?= $recette['recette_ingredient']?></p>
                            <p><?= $recette['recette_difficultee']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>