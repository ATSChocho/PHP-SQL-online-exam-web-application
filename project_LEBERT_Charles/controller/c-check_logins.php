<?php
$mail=$_POST["email"];
$password=$_POST["password"];
//var_dump($mail);
//var_dump($password);

if(isset($mail) && isset($password)){
    //var_dump($password);
    $student=new Student();
    $etatco=$student->connection($mail,$password);
    if($etatco==1){
        $etat="homes";
    }
    else{
        $etat="login";
    }

}
?>