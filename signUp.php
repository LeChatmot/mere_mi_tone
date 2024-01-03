<?php
include 'header.php';


if (isset($_POST['firstname'])&& isset ($_POST['email'])&& isset($_POST['pswrd'])) {

    if (empty($_POST['firstname']) || empty ($_POST['email']) || empty ($_POST['pswrd'])){
       
       
       $msgError = "Merci de remplir tous les champs obligatoires";
       
  } else { 

    
    $pswrdHash = password_hash($_POST['pswrd'], PASSWORD_DEFAULT); 

    try {

       $request = $db->prepare('INSERT INTO user (user_firstname, user_email, user_psrd) VALUES (?, ?, ?)'); 

       $request->execute([
       $_POST['firstname'],
       $_POST['email'],
       $pswrdHash

       ]);   

       $_SESSION['user'] = [
          'firstname' => $_POST['firstname'],
          'email' => $_POST['email'],
       ];

       header('Location: index.php?login=true'); 



    } catch (Exception $e){
       $msgError = "Création de compte impossible !"; 

    }

  } 

}  


?>
<main style="min-height:80vh">
<h1 style="text-align: center">Inscription</h1>
<form action="" method="post" style="width: 60%; margin: auto" >
    <div class="mb-3">
        <label for="firstname" class="form-label">Votre nom</label>
        <input type="text" class="form-control" name="firstname" id="firstname">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd" id="pswrd">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>


<?php
include 'footer.php';
?>
