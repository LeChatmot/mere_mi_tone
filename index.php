<?php
include 'header.php';
?>
<link rel="stylesheet" href="styleHomePage.css">
<div class="header">
    <div class="image-container">
        
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

    </div>
</div>
<?php
try {
    $request = $db->prepare("SELECT recette_name FROM recettes;");
    $request->execute([]);
    $results = $request->fetchAll();
} catch (Exception $e) {
    echo"$e->xdebug_message";
}

if (count($results) > 0) {
    if (count($results)>3){
        $nextTab = [];
        for ($i=0; $i>3; $i++) {
            $int = rand(0, count($results));
            array_push($nextTab, $results[$int]);
            array_splice($results,$int,1);
        }
        $results = $nextTab.copy();
    }
    var_dump($results);
?>
<div class="card-container">
    
</div>
<?php }; ?>

<?php
include 'footer.php';
?>
