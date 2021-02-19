<?php
    require_once 'libs/database.php';
    $database = new Database();

    $limit	= $database->removeXss($_GET['limit']);
    $offset	= $database->removeXss($_GET['offset']);

    $items = $database->getArrayByLoadMore('item', $limit, $offset);

    echo json_encode(array("items" => $items));
?>