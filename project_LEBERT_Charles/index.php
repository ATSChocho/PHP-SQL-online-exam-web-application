<?php
include "model/connexiondb.php";
include "model/Student.php";
include "model/Teacher.php";
include "model/Result.php";

?>
<html>


</html>

<?php

// *** on récupère l'action à entreprendre ***
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'login';
}

// *** traitement de l'action ***
$scriptAction = 'controller/c-' . $action . '.php';
include $scriptAction;

// *** génération de la vue ***
$scriptVue = 'view/v-' . $etat . '.php';
include "navbar.php";
include $scriptVue;

?>
