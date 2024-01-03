<?php
include 'header.php';

try {
    $requestRecette = $db->prepare("SELECT recette_name, recette_temps_prepa, recette_temps_cuisson, recette_ingredient, recette_difficultee, recette_nb_personne, recette_img FROM recettes WHERE recette_id = ?"); 
    $requestRecette->execute([$_GET['id']]);
    $recette = $requestRecette->fetch();
    $requestIngredient = $db->prepare("SELECT ingredient_name FROM ingredients"); 
    $requestIngredient->execute([]);
    $ingredients = $requestIngredient->fetchAll();

} catch (Exception $e) {
    var_dump($e->getMessage()); 
}
?>

<div class="content">
    <form action="" method="post" style="width: auto; margin: auto" class="from-control">
        <div class="mb-3">
            <label for="name" class="form-label">Nom de la recette</label>
            <input type="text" class="form-control" name="name" id="name" value=<?=$recette["recette_name"] ?>>
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Photo de la recette</label>
            <input type="text" class="form-control" name="picture" id="picture" value=<?=$recette["recette_img"] ?>>
        </div>
        <div class="mb-3">
            <label for="timeprepa" class="form-label">Temps de préparation</label>
            <input type="time" class="form-control" name="timeprepa" id="timeprepa" min="00:00" max="24:00" value=<?=$recette["recette_temps_prepa"] ?>>
        </div>
        <div class="mb-3">
            <label for="timecuisson" class="form-label">Temps de cuisson</label>
            <input type="time" class="form-control" name="timecuisson" id="timecuisson" min="00:00" max="24:00" value=<?=$recette["recette_temps_cuisson"] ?>>
        </div>
        <div class="mb-3">
            <label for="difficultee" class="form-label">Niveau de difficulté</label>
            <select name="difficultee" class="form-control" id="difficultee" value=<?=$recette["recette_difficultee"] ?>>
                <option value="Facile">Facile</option>
                <option value="Moyen">Moyen</option>
                <option value="Difficile">Difficile</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de personnes</label>
            <input type="number" class="form-control" name="nombre" id="nombre" min="1" max="100" step="1" value=<?=$recette["recette_nb_personne"] ?>>
        </div>

        <div class="mb-3">
            <label for="ingredient" class="form-label" id= "ingredient"><b>Les ingrédients</b></label>
            <select name="ingredient" id="ingredient" value=<?=$recette["recette_ingredient"] ?>>
            <?php 
            foreach($ingredients as $value){ ?>
                <option value="<?=$value['ingredient_name']?>"> <?=$value['ingredient_name']?></option>
                <?php }
            ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier la recette</button>
    </form>
</div>


<?php
include 'footer.php';
?>