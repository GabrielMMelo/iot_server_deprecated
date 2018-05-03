<?php

include "db.php";

Class Get{

    protected $db = null;

    public function __construct()
    {

        $this->db = new db();

    }

    public function getData()
    {
        $con = $this->db->OpenCon();

        $stmt = "SELECT * from _log";

        $result = $con->query($stmt);

        if ($result->num_rows >= 1) {
            $sql = $result;
        } else {
            $sql = "No article";
        }

        $this->db->CloseCon();

        return $sql;

    }
}
?>