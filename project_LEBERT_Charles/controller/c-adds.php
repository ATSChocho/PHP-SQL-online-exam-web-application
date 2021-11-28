<?php
if(isset($_POST['last-name'])){
    $stud=new Student();
    $stud->setMailStudent($_POST['mail']);
    $stud->setNameStudent($_POST['first-name']);
    $temp=$_POST['password'];
    $hash=password_hash($temp,PASSWORD_DEFAULT);
    $stud->setPswStudent($hash);
    $stud->setSurnameStudent($_POST['last-name']);
    $temp=new Teacher();
    session_start();
    $temp->retrieve($_SESSION['id']);
    $stud->setTeacher($temp);
    $stud->create();

    $student = new Student();
    $array = $student->findAll();
    
    $etat="student";
}
else{
    $etat = "adds";
}

?>