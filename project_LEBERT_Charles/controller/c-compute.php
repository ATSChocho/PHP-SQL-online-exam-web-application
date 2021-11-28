<?php
$myarray=array(87,-66,-3,-80,193.4,678.975,409.55,499,456,876300,0.925,0.2,1.386,0.5,7.6,0.08,0.135,1.25,4500,900,8500,2200,0.07,0.725,1.575,3.3,128000,3200,3550,22450,250,1410,3750,7360,165,770,2016,60,30,65,9,39,22,16,44);//this array stocks all the answers for the first part of the exam
$myarray2=array("XLVIII","XXXII","XX","XIV","XLVI");
$temp=0;
for($i=0;$i<sizeof($myarray);$i++){    //this loop is used to check all the answrs given. If it is the right answer, a point is given
    $x = $_POST["result".($i+1)];   //I get the answer writen with the POST method
    if($x==$myarray[$i]){
        $temp++;
    }
}
for($i=0;$i<sizeof($myarray2);$i++){
    $x = $_POST["result" . ($i + 46)];   //I get the answer writen with the POST method
    if ($x == $myarray2[$i]) {
        $temp++;
    }
}
$student=new Student();
session_start();
$student->retrieve($_SESSION['id']);
$result=new Result();
$result->setResult($temp);
$result->setStudent($student);
$result->create();

$etat="compute";

?>