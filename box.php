<?php

$class = "success";
if (isset($msgSuccess)){

    $msg = $msgSuccess;
};


if (!empty($msgError)) {

    $class = "danger";
    $msg = $msgError;
}

if (isset($msg)) {

echo "<div class='connexion'>
       $msg
      </div> 
      <link rel='stylesheet' href='box.css'>";

}
?>

