<?php
include 'header.php';


if (isset($_POST['name']) AND
    !empty($_POST['name']) AND
    !empty($_POST['timeprepa']) AND
    !empty($_POST['timecuisson']) AND
    !empty($_POST['difficultee']) AND
    !empty($_POST['nombre']) AND
    !empty($_POST['ingredient'])) {
    

    try{
        $request = $db->prepare('INSERT INTO recettes (
            recette_name, recette_temps_prepa, recette_temps_cuisson, recette_ingredient, recette_difficultee, recette_nb_personne, recette_img
                ) VALUES (?,?,?,?,?,?,?)');
        $request->execute([
            $_POST['name'],
            $_POST['timeprepa'],
            $_POST['timecuisson'],
            $_POST['ingredient'],
            $_POST['difficultee'],
            $_POST['nombre'],
            $_POST['picture']
                ]);
    } catch (Exception $e){
        var_dump($e->getMessage());
    }

} else {

    $msgError =  "Merci de remplir tous les champs";

    }

    var_dump($_POST)
    ?>   

    <h1>Validation de la création</h1>
 

<?php
include 'footer.php';
?>
