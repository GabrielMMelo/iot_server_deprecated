<?php

include "post.php";

if(isset($_GET['data'])){
	$data = $_GET['data'];	
	echo $data;
}
insertPost($data);
if(insertPost($data)){
	echo "inserção deu ruim";
}
else{
	echo "inserção deu bom";
}

?>