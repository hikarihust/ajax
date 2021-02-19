<?php
require_once 'libs/database.php';
$database = new Database();
$type = $database->removeXss($_GET['type']);

if($type == 'list'){
	$limit	= $database->removeXss($_GET['limit']);
	$offset	= $database->removeXss($_GET['offset']);
	$items = $database->getArrayByLoadMore('item', $limit, $offset);
	echo json_encode(array("items" => $items));
}

if($type == 'count'){
	$totalItems = count($database->getArray('item'));
	$items		= $database->removeXss($_GET['items']);

	$result['totalPages'] = ceil($totalItems/$items);
	$result['totalItems'] = $totalItems;

	echo json_encode($result);
}
