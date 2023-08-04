<?php



class Person
{
    public $Id;
    public $FirstName;
    public $SureName;
    public $DateOfBirth;
    public $Gender;
    public $SityOfBirth;
    public $mysqli;
    
    

    public function __construct($Id, $FirstName, $SureName, $DateOfBirth, $Gender, $SityOfBirth)
    { 
        $mysqli = new mysqli("localhost:3306", "root", "lovelovelove", "People");
        $result = $mysqli->query("SELECT * FROM person WHERE id = $Id");
        if($result->num_rows == 0) {
            $this->Id = $Id;
            $this->FirstName = $FirstName;
            $this->SureName = $SureName;
            $this->DateOfBirth = $DateOfBirth;
            $this->Gender = $Gender;
            $this->SityOfBirth = $SityOfBirth;
            $this->save();
        }
        else{
            while($row = $result->fetch_assoc()) {
                echo "Id: " . $row["Id"]. " - FirstName: " . $row["FirstName"]. " " . $row["SureName"]. " " . $row["DateOfBirth"] ." " .$row["Gender"] ." " .$row["SityOfBirth"];
              };
        }
       
    }

    public function save()
    {
        $mysqli = new mysqli("localhost:3306", "root", "lovelovelove", "People");
       
        $sql = $mysqli->query("INSERT INTO Person (Id, FirstName, SureName, DateOfBirth, Gender, SityOfBirth) 
                    VALUES ('$this->Id', '$this->FirstName', '$this->SureName', '$this->DateOfBirth', '$this->Gender', '$this->SityOfBirth')");

        
    }

    public function delite($Id)
    {  $mysqli = new mysqli("localhost:3306", "root", "lovelovelove", "People");
        
        $sql =$mysqli->query( " DELETE  FROM Person WHERE Id=$Id");
       
    }
  
    public function getAge() {
        $DateOfBirth = new DateTime($this->DateOfBirth);
        $currentDate = new DateTime();
        $interval = $DateOfBirth->diff($currentDate);
        echo " age " . $interval->y;
        return $interval->y;
    }
   public function getGenderText() {
        if ($this->Gender == 0) {
            echo " Female ";
            return "Female ";
        } else {
            echo " Male ";
            return "Male ";
        }
    }
    public function formatPerson($formatAge, $formatGender) {
        $this->mysqli = new mysqli("localhost:3306", "root", "lovelovelove", "People");
        
        $person = new stdClass();
        $person->Id = $this->Id;
        $person->FirstName = $this->FirstName;
        $person->SureName = $this->SureName;
        $person->DateOfBirth = $this->DateOfBirth;
        $person->Gender = $this->Gender;
        $person->SityOfBirth = $this-> SityOfBirth;
        
        if ($formatAge) {
            $person->DateOfBirth = $this->getGenderText();
        }
        
        if ($formatGender) {
            $person->Gender = $this->getGenderText();
        }
        
        return $person;
    }
}

