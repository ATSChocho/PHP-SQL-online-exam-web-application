<?php
$mail=$_POST["emailt"];
$password=$_POST["passwordt"];
//var_dump($mail);
//var_dump($password);

if(isset($mail) && isset($password)){
    //var_dump($password);
    $teacher=new Teacher();
    $etatco=$teacher->connection($mail,$password);
    //var_dump($etatco);
    if($etatco==1){
        $etat="homet";
    }
    else{
        $etat="logint";
    }

}
?>