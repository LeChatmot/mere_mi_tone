<?php
include 'header.php';

try {
    $request = $db->prepare("SELECT ingredient_name FROM ingredients");
    $request->execute([]);
    $ingredients = $request->fetchAll();

} catch (Exception $e){
    var_dump($e->getMessage());
}
if (isset($_GET['name'])) {

    if (empty($_GET['nature']) ||
        empty($_GET['saison']))
    {
        $msgError = "Merci de remplir tout les champs obligatoires";

    } else {
        try {
            if (!in_array($_GET['name'],$ingredients)) {
                $request = $db->prepare("INSERT INTO ingredients (
                ingredient_name, ingredient_nature, ingredient_saison
                    ) VALUES (?,?,?)");
                    $request->execute([
                            $_GET['name'],
                            $_GET['nature'],
                            $_GET['saison'],
                    ]);
                $msgSuccess = 'Ingrédient bien ajouté';
                //header('Location: index.php?login=true');
            } else {
                $msgError = 'Ingrédient déjà ajouté !';
                var_dump($msgError);
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
            $msgError = 'Veuillez verifier les informations entrées';
    }
    }
}
?>

<h1>Ajouter un ingredient</h1>
<?php
// Liste de chaînes
$listeDeChaines = array("chaine1", "chaine2", "chaine3");

// Chaîne à vérifier
$chaineAVerifier = "chaine2";

// Vérifier si la chaîne se trouve dans la liste
if (in_array($chaineAVerifier, $listeDeChaines)) {
    echo "La chaîne est présente dans la liste.";
} else {
    echo "La chaîne n'est pas présente dans la liste.";
}
?>

<form action="" method="get" class="form-control">
    <div class="mb-3">
        <label for="name" class="form-label">Nom de l'ingredient:</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Pomme, Poulet, Lait...">
    </div>
    <div class="mb-3">
        <label for="nature" class="form-label">Nature de l'ingredient:</label>
        <select class="form-select" name="nature" id="nature">
            <option value="Viande">Viande</option>
            <option value="Vollaile">Vollaile</option>
            <option value="Légume">Légume</option>
            <option value="Fruit">Fruit</option>
            <option value="Fécculent">Fécculent</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="saison" class="form-label">Saison de l'ingredient:</label>
        <select class="form-select" name="saison" id="saison">
            <option value="Printemps">Printemps</option>
            <option value="Éte">Éte</option>
            <option value="Automne">Automne</option>
            <option value="Hiver">Hiver</option>
            <option value="Toutes">Toutes</option>
        </select>
    </div>
    <div class="mb-3 form-label">
        <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        <button type="reset" class="btn btn-danger mb-3">Annuler</button>
    </div>
</form>
<?php
include "footer.php";
?>