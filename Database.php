<?php 
class Database
{
    private $connection;

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = new mysqli("localhost:3306", "root", "lovelovelove", "People");

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function searchPeople($conditions)
    {
        $query = "SELECT Id FROM Person WHERE " . $conditions;
        $result = $this->connection->query($query);

        $people = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $people[] = $row["Id"];
                echo "Id: " . $row["Id"];
            }
        }
        
        return $people;
    }

    public function deletePeople($conditions)
    {
        $query = "DELETE FROM Person WHERE " . $conditions;

        if ($this->connection->query($query) === false) {
            die("Error deleting people: " . $this->connection->error);
        }
    }

   
}
?>