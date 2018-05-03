<?php

class db
{
    protected $conn = null;
    public function OpenCon() {
        $this->conn = new mysqli("localhost:3306", "root", "emakersjr", "iot_server") or die($conn->connect_error);
        return $this->conn;
    }
    public function CloseCon() {
        $this->conn->close();
    }
}
?>
