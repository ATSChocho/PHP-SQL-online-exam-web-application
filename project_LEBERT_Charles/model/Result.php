<?php

class Result
{

    //attributs
    protected $idResult;
    protected $student;
    protected $result;



    public function __construct($id = null, $stud = null, $resul = null)
    {
        $this->idResult = $id;
        $this->student = $stud;
        $this->result = $resul;

    }


    public function create()
    {
        include "connexiondb.php";
        try {
            $req = "INSERT INTO result (id,idStudent,result) VALUES (null, ?,?)";
            $stmt = $conn->prepare($req);
            $param = [$this->student->getIdStudent(), $this->result];
            $stmt->execute($param);
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

    public function retrieve($id)
    {
        include "connexiondb.php";
        try {
            $req = "SELECT * FROM result WHERE id=" . $id;
            $stmt = $conn->query($req);
            $ligne = $stmt->fetch();

            $this->idResult = $ligne["id"];
            $this->result = $ligne["result"];

            $temp = new Student();
            $temp->retrieve($ligne["idStudent"]);
            $this->student = $temp;
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }


    public function update()
    {
        include "connexiondb.php";
        try {
            $req = "UPDATE result SET idStudent= :idStudent, result= :result WHERE id= :id";
            $stmt = $conn->prepare($req);
            $stmt->execute(array(":id" => $this->idResult, ":idStudent" => $this->student->getIdStudent(), ":result" => $this->result));
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

    public function delete($id)
    {
        include "connexiondb.php";
        try {
            $req = "DELETE FROM result WHERE id=" . $id;
            $stmt = $conn->prepare($req);
            $stmt->execute();
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }

    public function findAll()
    {
        include "connexiondb.php";
        $mesresult = array();
        try {
            $req = "SELECT id FROM result";
            $stmt = $conn->query($req);
            while ($ligne = $stmt->fetch()) {
                $result = new Result();
                $result->retrieve($ligne["id"]);
                $mesresult[] = $result;
            }
            return $mesresult;
        } catch (Exception $e) {
            print("Error message : " . $e->getMessage());
        }
    }
    /**
     * Get the value of result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set the value of result
     *
     * @return  self
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get the value of idResult
     */
    public function getIdResult()
    {
        return $this->idResult;
    }

    /**
     * Set the value of idResult
     *
     * @return  self
     */
    public function setIdResult($idResult)
    {
        $this->idResult = $idResult;

        return $this;
    }

    /**
     * Get the value of student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set the value of student
     *
     * @return  self
     */
    public function setStudent($student)
    {
        $this->student = $student;

        return $this;
    }

}
