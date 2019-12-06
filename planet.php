<?php

include('config.php');

include('functions.php');

$name = get('name');

$sql = file_get_contents('sql/getPlanet.sql');
$params = array(
	'name' => $name
);
$statement = $database->prepare($sql);
$statement->execute($params);
$planets = $statement->fetchAll(PDO::FETCH_ASSOC);

$planet = $planets[0];


?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Planet</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="page">
		<h1><?php echo $planet['name'] ?></h1>
		<p>
			<?php echo $planet['mass']; ?><br />
			<?php echo $planet['period']; ?><br />
			<?php echo $planet['distance']; ?><br />
		</p>
		
	</div>
</body>
</html>