<?php
$teacher= new Teacher();
$teacher->setMailTeacher($_POST['emailt']);
$teacher->setNameTeacher($_POST['namet']);
$teacher->setSurnameTeacher($_POST['surnamet']);
$temp = $_POST['passwordt'];
$hash = password_hash($temp, PASSWORD_DEFAULT);
$teacher->setPswTeacher($hash);
$teacher->create();

$etat="logint";
?>