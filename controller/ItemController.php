<?php
class ItemController extends Controller
{
    public function process($parameters)
    {
        $iname = text::camelCase($parameters[0]);
        $sql = "SELECT bi.idItems, i.nameItem, i.idTypes, t.nameType, i.classSet, c.nameClass, bi.idBosses, b.nameBoss, b.difficulty FROM items i INNER JOIN bosses_has_items bi USING(idItems) INNER JOIN bosses b USING(idBosses) INNER JOIN types t USING(idTypes) LEFT JOIN classes c ON(i.classSet = c.idClasses) WHERE replace(replace(i.nameItem, ' ', ''), '\'', '') like '$iname'";
 
        $this->data["bossitems"] = Db::queryAll($sql);

        $this->view = "item";
    }
}
