<?php
include 'header.php';

if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: signUp.php');
    exit();

}


try {
    $request = $db->prepare("SELECT ingredient_name FROM ingredients"); 
    $request->execute([]);
    $ingredients = $request->fetchAll();

} catch (Exception $e) {
    var_dump($e->getMessage()); 
}
?>
<main style="min-height:80vh">

<h1>Ajouter une recette</h1>

<form action="valid.php" method="post" style="width: auto; margin: auto" >
    <div class="mb-3">
        <label for="name" class="form-label">Nom de la recette</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Photo de la recette</label>
        <input type="text" class="form-control" name="picture" id="picture">
    </div>
    <div class="mb-3">
        <label for="timeprepa" class="form-label">Temps de préparation</label>
        <input type="time" class="form-control" name="timeprepa" id="timeprepa" min="00:00" max="24:00">
    </div>
    <div class="mb-3">
        <label for="timecuisson" class="form-label">Temps de cuisson</label>
        <input type="time" class="form-control" name="timecuisson" id="timecuisson" min="00:00" max="24:00">
    </div>
    <div class="mb-3">
        <label for="difficultee" class="form-label">Niveau de difficulté</label>
        <select name="difficultee" class="form-control" id="difficultee">
        <option value="Facile">Facile</option>
        <option value="Moyen">Moyen</option>
        <option value="Difficile">Difficile</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre de personnes</label>
        <input type="number" class="form-control" name="nombre" id="nombre" min="1" max="100" step="1">
    </div>

    <div class="mb-3">
        <label for="ingredient" class="form-label" id= "ingredient"><b>Les ingrédients</b></label>
        <select name="ingredient" id="ingredient">
        <?php 
           foreach($ingredients as $value){ ?>
            <option value="<?=$value['ingredient_name']?>"> <?=$value['ingredient_name']?></option>
            <?php }
        ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter la recette</button>
</form>
</main>

<?php
include 'footer.php';
?>