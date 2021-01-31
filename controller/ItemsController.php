<?php
class ItemsController extends Controller
{
    public function process($parameters)
    {
        $sql = "SELECT i.idItems, i.nameItem, i.classSet, c.nameClass FROM items i LEFT JOIN classes c ON(i.classSet = c.idClasses)";
        $this->data["items"] = Db::queryAll($sql);

        $this->view = "items";
    }
}
