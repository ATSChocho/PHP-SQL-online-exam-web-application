<?php
if(isset($_POST['choice'])){
    $student=new Student();
     $choice=$_POST["choice"];
     for($i=0;$i<count($choice);$i++){
        $result=new Result();
        $myresults=array();
        $myresults=$result->findAll();
        
        for($j = 0; $j < count($myresults); $j++){
            if($myresults[$j]->getStudent()->getIdStudent() == $choice[$i]){
                $myresults[$j]->delete($myresults[$j]->getIdResult());
            }
        }
        $student->delete($choice[$i]);
    }
}

$temp = new Student();
$array = array();
$array = $temp->findAll();

$etat="student";
