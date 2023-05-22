<?php
class Database {

    public $serverName = "localhost";
    public $databaseName = "CuratorsHelper";
    public $conn;
    

    public function GetConnection(){
        $this->conn = null;

        try {
            $this->conn = new PDO("sqlsrv:Server=$this->serverName;Database=$this->databaseName");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Ошибка подключения к базе данных: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>