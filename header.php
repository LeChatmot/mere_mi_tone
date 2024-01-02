<?php 

session_start();

try {

    $db = new PDO('mysql:host=localhost;dbname=projet-groupe1;charset=utf8',
        'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (Exception $e) {

    var_dump($e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Mere Mi Tone</title>
</head>
<body>
<header><nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding:0;">
  <div style="background-color:#D0F5A9;" class="container-fluid">
    <a class="navbar-brand" href="index.php">HOME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="page-recette.php">Recette</a>
        </li>
        <li class="nav-item">                                                         
          <a class="nav-link" href="./Ajoutrecettes.php">Ajout Recette</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page-ajout-ingredients.php">Ajout ingredient</a>
        </li>
        <?php if (isset($_SESSION['user']) AND !empty($_SESSION['user'])) { ?> 
        <li class="nav-item">
          <a class="nav-link" href="index.php?logout=true">Log out</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="signIn.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="signUp.php">Inscription</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
</header>