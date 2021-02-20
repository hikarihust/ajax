<?php

class IndexModel extends BackendModel
{
    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_MOVIES);
    }

    public function getItems()
    {
        $query[]    = "SELECT i.`id`,i.`status`, i.`title`,i.`description`,i.`image`,i.`category_id`,i.`actor_id`,c.`name` as category_name";
        $query[]    = "FROM `$this->table` as i";
        $query[]    = "LEFT JOIN category as c ON c.id = i.category_id";

        $query      = implode(" ", $query);
        $result     = $this->fetchAll($query);
        
        return $result;
    }
    public function getCategoryArr()
    {
        $query[]    = "SELECT `id`,`name`";
        $query[]    = "FROM `category`";

        $query      = implode(" ", $query);
        $result     = $this->fetchPairs($query);
        return $result;
    }

  
}
