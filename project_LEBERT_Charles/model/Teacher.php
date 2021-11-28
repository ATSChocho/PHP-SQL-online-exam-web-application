<?php

Class Teacher{

//attributs
protected $idTeach;
protected $nameTeacher;
protected $surnameTeacher;
protected $pswTeacher;
protected $mailTeacher;


public function __construct($id=null,$name=null,$surname=null,$psw=null,$email=null)
{
    $this->idTeach=$id;
    $this->nameTeacher=$name;
    $this->surnameTeacher=$surname;
    $this->pswTeacher=$psw;
    $this->mailTeacher=$email;
}

    /**
     * Get the value of idTeach
     */
    public function getIdTeach()
    {
        return $this->idTeach;
    }

    /**
     * Set the value of idTeach
     *
     * @return  self
     */
    public function setIdTeach($idTeach)
    {
        $this->idTeach = $idTeach;

        return $this;
    }

    /**
     * Get the value of nameTeacher
     */
    public function getNameTeacher()
    {
        return $this->nameTeacher;
    }

    /**
     * Set the value of nameTeacher
     *
     * @return  self
     */
    public function setNameTeacher($nameTeacher)
    {
        $this->nameTeacher = $nameTeacher;

        return $this;
    }

    /**
     * Get the value of surnameTeacher
     */
    public function getSurnameTeacher()
    {
        return $this->surnameTeacher;
    }

    /**
     * Set the value of surnameTeacher
     *
     * @return  self
     */
    public function setSurnameTeacher($surnameTeacher)
    {
        $this->surnameTeacher = $surnameTeacher;

        return $this;
    }

    /**
     * Get the value of pswTeacher
     */
    public function getPswTeacher()
    {
        return $this->pswTeacher;
    }

    /**
     * Set the value of pswTeacher
     *
     * @return  self
     */
    public function setPswTeacher($pswTeacher)
    {
        $this->pswTeacher = $pswTeacher;

        return $this;
    }

    /**
     * Get the value of mailTeacher
     */
    public function getMailTeacher()
    {
        return $this->mailTeacher;
    }

    /**
     * Set the value of mailTeacher
     *
     * @return  self
     */
    public function setMailTeacher($mailTeacher)
    {
        $this->mailTeacher = $mailTeacher;

        return $this;
    }

public function create(){
include "connexiondb.php";
try{
    $req="INSERT INTO teacher (id,Name,Surname,Password,Email) VALUES (null, ?,?,?,?)";
    $stmt=$conn->prepare($req);
    $param=[$this->nameTeacher,$this->surnameTeacher,$this->pswTeacher,$this->mailTeacher];
    $stmt->execute($param);
}
catch(Exception $e){
    print ("Error message : ".$e->getMessage());

}
}

public function retrieve($id){
    include "connexiondb.php";
    try{
        $req="SELECT * FROM teacher WHERE id=".$id;
        $stmt=$conn->query($req);
        $ligne=$stmt->fetch();
        $this->idTeach = $ligne["id"];
        $this->nameTeacher = $ligne["Name"];
        $this->surnameTeacher = $ligne["Surname"];
        $this->pswTeacher = $ligne["Password"];
        $this->mailTeacher = $ligne["Email"];
    }
    catch(Exception $e){
        print("Error message : ".$e->getMessage());

    }
}


public function update(){
    include "connexiondb.php";
    try{
        $req="UPDATE teacher SET Name= :Name, Surname= :Surname, Password= :Password, Email= :Email WHERE id= :id";
        $stmt = $conn->prepare($req);
        $stmt->execute(array(":id" => $this->idTeach,":Name"=>$this->nameTeacher,":Surname"=>$this->surnameTeacher, ":Password" => $this->pswTeacher, ":Email" => $this->mailTeacher) );

    }
    catch(Exception $e){
    print ("Error message : ".$e->getMessage());
    }
}

public function delete($id){
    include "connexiondb.php";
    try{
        $req="DELETE FROM teacher WHERE id=".$id;
        $stmt=$conn->prepare($req);
        $stmt->execute();
    }
    catch(Exception $e){
        print ("Error message : ".$e->getMessage());
    }
}
    public function connection($identifiant, $temp)
    {
        include "connexiondb.php";
        try {
            $req = "SELECT * FROM teacher WHERE Email='" . $identifiant . "'";
            $stmt = $conn->prepare($req);
            $stmt->execute();
            $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($donnees);
            
            if (password_verify($temp,$donnees["Password"])) {
                $student = new Teacher();
                $student->retrieve($donnees["id"]);
                session_start();
                $_SESSION['id'] = $student->getIdTeach();
                $_SESSION['name'] = $student->getNameTeacher();
                $_SESSION['surname'] = $student->getSurnameTeacher();
                $_SESSION['mail'] = $student->getMailTeacher();
                $_SESSION['teacher']=true;
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

public function findAll(){
    include "connexiondb.php";
    $mesteachers=array();
    try{
        $req="SELECT id FROM teacher";
        $stmt=$conn->query($req);
        while($ligne=$stmt ->fetch()){
            $teacher=new teacher();
            $teacher->retrieve($ligne["id"]);
            $mesteachers[]=$teacher;
        }
        return $mesteachers;
    }
    catch(Exception $e){
        print("Error message : ".$e->getMessage());
    }
}


}
