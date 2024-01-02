<?php
include 'header.php';


if (isset($_POST['name']) AND
    !empty($_POST['name']) AND
    !empty($_POST['timeprepa']) AND
    !empty($_POST['timecuisson']) AND
    !empty($_POST['difficulte']) AND
    !empty($_POST['nombre']) AND
    !empty($_POST['listeIngredients']) AND
    !empty($_POST['quantity'])) {

    $msgSuccess = 'La recette a bien été ajoutée!';

    $data = [
        ['name'] => $_POST['name'],
        ['timeprepa'] => $_POST['timeprepa'],
        ['timecuisson'] => $_POST['timecuisson'],
        ['difficulte'] => $_POST['difficulte'],
        ['nombre'] => $_POST['nombre'],
        ['listeIngredients'] => $_POST['listeIngredients'],
        ['quantity'] => $_POST['quantity'],
    ]


} else {

    $msgError =  "Merci de remplir tous les champs";

    }


    ?>   

    <h1>Validation de la création</h1>
 

<?php
include 'footer.php';
?>
