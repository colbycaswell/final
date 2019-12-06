<?php

include('config.php');

include('functions.php');


$name = get('name');

$planet = null;

if(!empty($name)) {
	$sql = file_get_contents('sql/getPlanet.sql');
	$params = array(
		'name' => $name
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$planets = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$planet = $planets[0];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['name'];
	$mass = $_POST['mass'];
	$period = $_POST['period'];
	$distance = $_POST['distance'];
	
	if($action == 'add') {
		$sql = file_get_contents('sql/insertPlanet.sql');
		$params = array(
			'name' => $name,
			'mass' => $mass,
			'period' => $period,
			'distance' => $distance
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
	}
	
	elseif ($action == 'edit') {
		$sql = file_get_contents('sql/updatePlanet.sql');
        $params = array( 
            'name' => $name,
            'mass' => $mass,
            'period' => $period,
            'distance' => $distance
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
	}
	
	header('location: findplanet.php');
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Manage Planet</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
     <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="page">
		<h1>Add Planet</h1>
		<form action="" method="POST">
			<div class="form-element">
				<label>Name:</label>
					<input type="text" name="name" class="textbox" value="<?php echo $planet['name'] ?>" />
			</div>
			<div class="form-element">
				<label>Mass:</label>
				<input type="text" name="mass" class="textbox" value="<?php echo $planet['mass'] ?>" />
			</div>
			<div class="form-element">
				<label>Period:</label>
				<input type="text" name="period" class="textbox" value="<?php echo $planet['period'] ?>" />
			</div>
			<div class="form-element">
				<label>Distance:</label>
				<input type="text" name="distance" class="textbox" value="<?php echo $planet['distance'] ?>" />
			</div>
			<div class="form-element">
				<input type="submit" class="button" />&nbsp;
				<input type="reset" class="button" />
			</div>
		</form>
	</div>
</body>
</html>