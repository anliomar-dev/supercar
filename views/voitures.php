<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/supercar/assets/css/styles.css">
	<title>voitures</title>
</head>
<body>
	<?php
		if(isset($paginatedCars) && !empty($paginatedCars)){
			var_dump($paginatedCars);
		}
	?>
</body>
</html>