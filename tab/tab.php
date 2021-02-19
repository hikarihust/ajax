<?php
require_once 'libs/database.php';
$database = new Database();
$type = $database->removeXss($_GET['type']);

if($type == 'load-data') {
	$categoryId = $database->removeXss($_GET['id']);
	$result = $database->getArrayDataByCategoryId($categoryId);
	echo json_encode($result);
}

if($type == 'category'){
	$result = $database->getArray('category');
	echo json_encode($result);
}
