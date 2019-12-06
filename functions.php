<?php

function searchPlanets($term, $database) {
	$term = $term . '%';
	$sql = file_get_contents('sql/getPlanets.sql');
	$params = array(
		'term' => $term
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$planets = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $planets;
}

function get($key) {
	if(isset($_GET[$key])) {
		return $_GET[$key];
	}
	
	else {
		return '';
	}
}