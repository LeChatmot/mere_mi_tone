<?php
include 'header.php';



if (isset($_POST['email'])&& isset($_POST['pswrd'])) {

if (empty ($_POST['email']) || empty ($_POST['pswrd'])) {
   
   
} else { 

    try {
   
        $request = $db->prepare('SELECT * FROM user WHERE user_email = ?');

        $request->execute(
            [
                $_POST['email']
            ]
            );

            $user = $request->fetch();

            if (!$user OR !password_verify($_POST['pswrd'], $user['user_psrd'])) {
     
              $msgError = 'Email ou mot de passe incorrect !';

            } else {
              
                $_SESSION['user'] = [
                    
                    'firstname' => $user['user_firstname'],
                    'email' => $_POST['email'],
                ];
 
                header('Location: index.php?login=true');

            }


    } catch (Exception $e){
        var_dump($e->getMessage());
  
} 

}  
}

?>

<main style="min-height:80vh">
<h1 style="text-align: center">Connexion</h1>
<form action="" method="post" style="width: 60%; margin: auto" >
    <div class="mb-3">
        <label for="email" class="form-label">Votre email</label>
        <input type="email" class="form-control" name="email" id="email" required>
    </div>
    <div class="mb-3">
        <label for="pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd" id="pswrd" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</main>








<?php
include 'footer.php';
?>