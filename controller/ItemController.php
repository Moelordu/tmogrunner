<?php
class ItemController extends Controller
{
    public function process($parameters)
    {
        $favorite = new favorite();
        $iname = text::camelCase($parameters[0]);
        $sql = "SELECT i.idItems, i.nameItem, i.idTypes, t.nameType, i.classSet, c.nameClass, b.idBosses, b.nameBoss, b.difficulty, d.nameDifficulty, r.nameRaid
        FROM items i INNER JOIN bosses_has_items bi USING(idItems) INNER JOIN bosses b USING(idBosses) INNER JOIN types t ON(i.idTypes = t.idTypes) LEFT JOIN classes c ON(i.classSet = c.idClasses) INNER JOIN difficulty d ON(b.difficulty = d.idDifficulty) INNER JOIN raids r ON(b.raid = r.idRaids)
        WHERE replace(replace(i.nameItem, ' ', ''), '\'', '') LIKE '$iname'";
 


        if (isset($_POST["idBosses"])) {
            if($_POST["idUsers"] > 0)
            {
                $_POST["idUsers"] = $_SESSION["user"]["idUsers"];
                $favorite->newFavorite($_POST);
                $this->redirect("item/" . $parameters[0]);
            }
            else
            {
                $favorite->delFavorite($_POST["idBosses"], $_SESSION["user"]["idUsers"]);
                $this->redirect("item/" . $parameters[0]);
            }
                
        }

        $this->data["bosses"] = Db::queryAll($sql);

        $this->view = "item";
    }
}
