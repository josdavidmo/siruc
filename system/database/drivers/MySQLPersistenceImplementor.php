<?php

class MySQLPersistenceImplementor extends Persistence {

    private $connection;

    public function __construct($DB_HOST, $DB_USER, $DB_PASS, $DB_SCHEMA, $DB_PORT = "3306") {
        $this->connection = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_SCHEMA, $DB_PORT);
        if ($this->connection->connect_errno) {
            echo "Falló la conexión con MySQL:( " 
                 . $this->connection->connect_errno . " ) " 
                 . $this->connection->connect_error;
        }
        mysqli_query($this->connection, "SET NAMES 'utf8'");
    }

    public function save($table, $fields, $object) {
        $auxFields = implode(",", $fields);
        $auxObject = "'".implode("','", $object)."'";
        $query = "INSERT INTO $table ($auxFields) VALUES ($auxObject)";
        return mysqli_query($this->connection, $query);
    }

    public function delete($table, $criterion) {
        $query = "DELETE FROM $table WHERE $criterion";
        return mysqli_query($this->connection, $query);
    }

    public function executeQuery($query) {
        $mysql_result = mysqli_query($this->connection, $query);
        return $mysql_result;
    }

    public function update($table, $fields, $object, $criterion) {
        $auxValues = NULL;
        for ($i = 0; $i < count($fields); $i++) {
            $auxValues .= "$fields[$i] = $object[$i] ";
        }
        $query = "UPDATE $table $auxValues WHERE $criterion";
        return mysqli_query($this->connection, $query);
    }
    
    public function convertResult($result){
        $data = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            array_push($data, $row);
        }
        return $data;
    }

}
