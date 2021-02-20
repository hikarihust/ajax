<?php
require_once 'libs/database.php';
$database = new Database();
$type		= $database->removeXss($_GET['type']);

if($type == "load-full") {
    $result = $database->getArray('item');
    echo json_encode($result);
}