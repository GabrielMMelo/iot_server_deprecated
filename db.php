<?php

class db
{
    protected $conn = null;
    public function OpenCon()
    {
	echo "dbzino";
        $this->conn = new mysqli("192.168.0.106:3306", "root", "emakersjr", "iot_server");// or die($conn->connect_error);
	echo "dbzano";
        return $this->conn;
    }
    public function CloseCon()
    {
        $this->conn->close();
    }
}
?>
