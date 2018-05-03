<?php

include "db.php";

class Post {

    protected $db = null;

    public function __construct() {

        $this->db = new db();

    }
    public function insertPost($data) {
//	echo $data;
        $json = json_decode($data);
//	var_dump($json);
        $con = $this->db->OpenCon();
        $mac = $json->{'mac'};
//	echo $json->{'mac'};
        $status = (int)$json->{'status'};
        $error  = (int)$json->{'error'};
        $query = $con->prepare("INSERT INTO _log(mac, status, error) VALUES(?, ?, ?)");
//	var_dump($query);
        $query->bind_param("sii", $mac, $status, $error);
        $result = $query->execute();
//	echo "RESULLLLLLLLLLLT: ";
//	var_dump($result);
        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
//	echo "resultaaaaaaaaaaaaaaaaduuuu";
        $result = true;
        return $result;
    }

    

    public function deletearticle($id) {

        $con    = $this->db->OpenCon();
        $sql    = "DELETE FROM post WHERE article_id = '$id'";
        $result = $con->query($sql);

        if (!$result) {

            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        $result = true;
        return $result;
    }

    public function updatearticle($a_id, $a_content, $a_name, $a_image)
    {

        $con     = $this->db->OpenCon();
        $title   = $con->real_escape_string($a_name);
        $content = $con->real_escape_string($a_content);
        $img     = $con->real_escape_string($imgname);
        $query   = $con->prepare("UPDATE post SET article_name = ? , article_content = ?, img = ? WHERE article_id = ?");
        $query->bind_param("sssi", $title, $content, $img, $a_id);
        $result = $query->execute();
        if (!$result) {
            $error = $con->error;

            $this->db->CloseCon();
            return $error;
        }
        $result = true;
        return $result;

    }
}
?>
