<!DOCTYPE html>
<?php

	include "get.php";

?>

<html>
<head>
	<title>Iot Server</title>
</head>
<body>

<?php 
	$get = new Get();
	$result = $get->getData();
	$line = mysqli_fetch_assoc($result);
	$total = mysqli_num_rows($result);
	while($total >= 1) {
?>

<h1>
	<?php echo $line['mac'];?>
</h1>

<?php

		$total -= 1;
		$line = mysqli_fetch_assoc($result);
	}
?>

</body>
</html>
