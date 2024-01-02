<?php
include 'header.php';
?>
<link rel="stylesheet" href="styleHomePage.css">
<div class="header">
    <div class="image-container">
        <img src="https://cdn.futura-sciences.com/buildsv6/images/largeoriginal/9/1/c/91c5549315_114935_basilic-feuille.jpg" class="img-header">
    </div>
    <div class="titles">
        <h1 class="title">
            Bienvenue sur mere mi tone
        </h1>
        <h2 class="subtitle">
            le site numero 1 de la cuisine
        </h2>
        <h4 class="subsubtitle">
            fin pas encore mais tkt ca arrive
        </h4>
    </div>
    <div class="image-container">
        <img class="img-header" src="https://dxpulwm6xta2f.cloudfront.net/eyJidWNrZXQiOiJhZGMtZGV2LWltYWdlcy1yZWNpcGVzIiwia2V5IjoicGl6emFfcGVwcGVyb25pLmpwZyIsImVkaXRzIjp7ImpwZWciOnsicXVhbGl0eSI6ODB9LCJwbmciOnsicXVhbGl0eSI6ODB9LCJ3ZWJwIjp7InF1YWxpdHkiOjgwfX19">
    </div>
</div>

<?php
try {
    $request = $db->prepare("SELECT recette_id, recette_name, recette_difficultee, recette_img FROM recettes;");
    $request->execute([]);
    $results = $request->fetchAll();
} catch (Exception $e) {
    echo"$e->xdebug_message";
}

if (count($results) > 0) {
    if (count($results)>3){
        shuffle($results);
        $results = array_slice($results, 0, 3);
    }
?>
<div class="card-container">
    <?php foreach ($results as $recette) {?>
        <div class="card d-flex flex-row">
            <div>
                <div class="card-title">
                    <h1><?php echo $recette['recette_name']?></h1>
                </div>
                <div class="card-text">
                    <h2><?= $recette['recette_difficultee']?></h2>
                </div>
            </div>
            <div class="card-image-container">
                <a href="details.php?id=<?=$recette["recette_id"]?>">
                <img src=<?= $recette['recette_img']?>>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
<?php }; ?>
    
<?php
include 'footer.php';
?>
