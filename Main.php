<?php 
require_once 'Database.php';
require_once 'Person.php';
$db = new Database("localhost", "username", "password", "database");
/*

$conn = mysqli_connect("localhost:3306", "root", "lovelovelove","People");
$sql="
CREATE TABLE Person(
   Id INT  ,
    PRIMARY KEY (Id),
    FirstName char(50),
    CHECK (`FirstName` REGEXP '^[a-zA-Z]'),
    SureName char(50),
    CHECK (`SureName` REGEXP '^[a-zA-Z]'),
    DateOfBirth date,
    Gender BOOL,
    SityOfBirth char(50)
    );
    "; 
    if ($conn->query($sql) === TRUE) {
        echo "Table MyGuests created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }
      */
$person = new Person(896, 'ln', 'Doe', '2020-01-01', 1, 'New York');

$person->delite(6);



$conditions = "FirstName = 'ln' "; // Пример условия поиска

$people = $db->searchPeople($conditions);
?>