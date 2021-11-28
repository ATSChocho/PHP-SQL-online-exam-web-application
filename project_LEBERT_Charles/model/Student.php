<?php

class Student
{

    //attributs
    protected $idStudent;
    protected $teacher;
    protected $nameStudent;
    protected $surnameStudent;
    protected $pswStudent;
    protected $mailStudent;


    public function __construct($id = null,$teach=null ,$name = null, $surname = null, $psw = null, $email = null)
    {
        $this->idStudent = $id;
        $this->teacher= $teach;
        $this->nameStudent = $name;
        $this->surnameStudent = $surname;
        $this->pswStudent = $psw;
        $this->mailStudent = $email;
    }


    public function create()
    {
        include "connexiondb.php";
        try {
            $req = "INSERT INTO student (id,idTeacher,Name,Surname,Password,Email) VALUES (null, ?,?,?,?,?)";
            $stmt = $conn->prepare($req);
            $param = [$this->teacher-> getIdTeach(),$this->nameStudent, $this->surnameStudent, $this->pswStudent, $this->mailStudent];
            $stmt->execute($param);
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

    public function retrieve($id)
    {
        include "connexiondb.php";
        try {
            $req = "SELECT * FROM student WHERE id=" . $id;
            $stmt = $conn->query($req);
            $ligne = $stmt->fetch();
            
            $this->idStudent = $ligne["id"];
            $this->nameStudent = $ligne["Name"];
            $this->surnameStudent = $ligne["Surname"];
            $this->pswStudent = $ligne["Password"];
            $this->mailStudent = $ligne["Email"];

            $temp=new Teacher();
            $temp->retrieve($ligne["idTeacher"]);
            $this->teacher=$temp;
            
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }


    public function update()
    {
        include "connexiondb.php";
        try {
            $req = "UPDATE student SET idTeacher= :idTeacher, Name= :Name, Surname= :Surname, Password= :Password, Email= :Email WHERE id= :id";
            $stmt = $conn->prepare($req);
            $stmt->execute(array(":id" => $this->idStudent, ":idTeacher"=>$this->teacher->getIdTeach(),":Name" => $this->nameStudent, ":Surname" => $this->surnameStudent, ":Password" => $this->pswStudent, ":Email" => $this->mailStudent));
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        include "connexiondb.php";
        try {
            $req = "DELETE FROM student WHERE id=" . $id;
            $stmt = $conn->prepare($req);
            $stmt->execute();
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

    public function findAll()
    {
        include "connexiondb.php";
        $mesteachers = array();
        try {
            $req = "SELECT id FROM student";
            $stmt = $conn->query($req);
            while ($ligne = $stmt->fetch()) {
                $student = new Student();
                $student->retrieve($ligne["id"]);
                $mesStudent[] = $student;
            }
            return $mesStudent;
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }
    
    public function connection($identifiant,$temp){
        include "connexiondb.php";
        try{
            $req="SELECT * FROM student WHERE Email='".$identifiant."'";
            $stmt=$conn->prepare($req);
            $stmt->execute();
            $donnees = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($temp,$donnees["Password"])){
                $student=new Student();
                $student->retrieve($donnees["id"]);
                session_start();
                $_SESSION['id'] = $student->getIdStudent(); 
                $_SESSION['name'] = $student->getNameStudent();    
                $_SESSION['surname'] = $student->getSurnameStudent();    
                $_SESSION['mail'] = $student->getMailStudent();            
                return 1;
            }else{
                return 0;
            }
        }
        catch(Exception $e){
            print("Error message : " . $e->getMessage());
        }

    }

    /**
     * Get the value of mailStudent
     */ 
    public function getMailStudent()
    {
        return $this->mailStudent;
    }

    /**
     * Set the value of mailStudent
     *
     * @return  self
     */ 
    public function setMailStudent($mailStudent)
    {
        $this->mailStudent = $mailStudent;

        return $this;
    }

    /**
     * Get the value of idStudent
     */ 
    public function getIdStudent()
    {
        return $this->idStudent;
    }

    /**
     * Set the value of idStudent
     *
     * @return  self
     */ 
    public function setIdStudent($idStudent)
    {
        $this->idStudent = $idStudent;

        return $this;
    }

    /**
     * Get the value of teacher
     */ 
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set the value of teacher
     *
     * @return  self
     */ 
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get the value of nameStudent
     */ 
    public function getNameStudent()
    {
        return $this->nameStudent;
    }

    /**
     * Set the value of nameStudent
     *
     * @return  self
     */ 
    public function setNameStudent($nameStudent)
    {
        $this->nameStudent = $nameStudent;

        return $this;
    }

    /**
     * Get the value of pswStudent
     */ 
    public function getPswStudent()
    {
        return $this->pswStudent;
    }

    /**
     * Set the value of pswStudent
     *
     * @return  self
     */ 
    public function setPswStudent($pswStudent)
    {
        $this->pswStudent = $pswStudent;

        return $this;
    }

    /**
     * Get the value of surnameStudent
     */ 
    public function getSurnameStudent()
    {
        return $this->surnameStudent;
    }

    /**
     * Set the value of surnameStudent
     *
     * @return  self
     */ 
    public function setSurnameStudent($surnameStudent)
    {
        $this->surnameStudent = $surnameStudent;

        return $this;
    }
}
