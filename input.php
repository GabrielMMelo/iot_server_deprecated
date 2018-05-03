<?php

include "post.php";

if(isset($_POST['data'])){
	$data = $_POST['data'];
	echo $data;
}

echo "oi";

$post = new Post();

if($post->insertPost($data)){
	echo "inserção deu ruim";
}
else{
	echo "inserção deu bom";
}

?>
