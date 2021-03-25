<?php
class ItemsController extends Controller
{
    public function process($parameters)
    {
        $sql = "SELECT i.idItems, i.nameItem, i.classSet, c.nameClass, i.idTypes, t.nameType 
        FROM items i LEFT JOIN classes c ON(i.classSet = c.idClasses) INNER JOIN types t USING(idTypes)";
        $this->data["items"] = Db::queryAll($sql);

        $this->view = "items";
    }
}
