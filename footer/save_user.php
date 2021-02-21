<?php
require_once 'libs/database.php';
$database = new Database();

$email = $database->removeXss($_GET['email']);
$time = $database->removeXss($_GET['time']);

$items = $database->saveItem('user', $email, $time);

return json_encode(array("items" => $items));
