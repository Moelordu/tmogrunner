<?php
class ItemController extends Controller
{
    public function process($parameters)
    {
        $iname = text::camelCase($parameters[0]);
        $sql = "SELECT i.idItems, i.nameItem, i.idTypes, t.nameType, i.classSet, c.nameClass, b.idBosses, b.nameBoss, b.difficulty, d.nameDifficulty 
        FROM items i INNER JOIN bosses_has_items bi USING(idItems) INNER JOIN bosses b USING(idBosses) INNER JOIN types t ON(i.idTypes = t.idTypes) LEFT JOIN classes c ON(i.classSet = c.idClasses) INNER JOIN difficulty d ON(b.difficulty = d.idDifficulty)
        WHERE replace(replace(i.nameItem, ' ', ''), '\'', '') LIKE '$iname'";
 
        $this->data["bosses"] = Db::queryAll($sql);

        $this->view = "item";
    }
}
