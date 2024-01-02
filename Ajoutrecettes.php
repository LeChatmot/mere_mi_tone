<?php
include 'header.php';





try {
    $request = $db->prepare("SELECT * FROM ingredients"); 
    $request->execute([]);
    $ingredients = $request->fetchAll();  


} catch (Exception $e) {
    $msgError = 'Une erreur est survenue !'; 

}


if (isset($_POST['name'])) 
{

    if (empty($_POST['name'])           || 
        empty ($_POST['timeprepa'])     || 
        empty ($_POST['timecuisson'])   || 
        empty ($_POST['ingredient'])    ||
        empty ($_POST['difficulte'])    ||
        empty ($_POST['nombre'])) {
       
       
       $msgError = 'Veuillez remplir tous les champs !';
       
    } else {


        try {

            $picture = empty($_POST['picture']) ? null : $_POST['picture'];

            $request = $db->prepare('INSERT INTO recettes (recette_name, 
                                                        recette_temps_prepa, 
                                                        recette_temps_cuisson, 
                                                        recette_ingredient, 
                                                        recette_difficutee, 
                                                        recette_nb_personne,  
                                                        recette_img) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)'); 

            $request->execute([
            $_POST['name'], $_POST['timeprepa'], $_POST['timecuisson'], $synopsis, $_POST['ingredients'], $trailer, $_POST['difficulte'], $_POST['nombre'], $picture,
            ]);   

            $msgSuccess = "La recette {$_POST['name']} a bien été ajouté !"; 

        } catch (Exception $e) {
             var_dump($e->getMessage());

            $msgError = "La recette {$_POST['name']} n'a pas pu être ajouté !"; 

        }
    }
}


?>




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
        <label for="difficulte" class="form-label">Niveau de difficulté</label>
        <select name="difficulte" class="form-control" id="difficulte">
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
        <label for="ingredient" class="form-label" id= "ingredients"><b>Les ingrédients</b></label>
        <select name="ingredient" id="ingredient">
        <?php 
           foreach($_SESSION['listeIngredients'] as $key => $value){ ?>
            <option value="<?=$value['name']?>"> <?=$value['name']?></option>
            <?php }
        ?>
        </select>


    <div class="mb-3">
        <label for="quantity" class="form-label">Nombre d'ingrédients</label>
        <input type="number" class="form-control" name="quantity" id="quantity" min="1" max="100" step="1">
    </div>
    <button type="submit" class="btn btn-primary">Ajouter la recette</button>
</form>

<?php
include 'footer.php';
?>