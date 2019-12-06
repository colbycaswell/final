<?php
$user = 'caswellc2';
$password = 'fa3902e1';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_fall19_caswellc2', $user, $password);

function my_autoloader($class) {
	include 'classes/class.' . $class . '.php';
}
spl_autoload_register('my_autoloader');


session_start();

$current_url = basename($_SERVER['REQUEST_URI']);

if (!isset ($_SESSION['scientistid']) && $current_url != 'login.php') {
    header("location: login.php");
    die();
} elseif(isset ($_SESSION['scientistid'])) {
    $sql = file_get_contents('sql/getScientist.sql');
	$params = array(
		'scientistid' => $_SESSION['scientistid']
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$customer = $statement->fetchAll(PDO::FETCH_ASSOC);}?>

