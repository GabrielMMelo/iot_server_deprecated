<?php

	include "post.php";

	$data = file_get_contents('php://input');

	$post = new Post();

	if($post->insertPost($data)) {
	;
	}
	else {
		echo "ERROR: INSERT FAILED";
	}

?>
