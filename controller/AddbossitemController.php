<?php
class AddbossitemController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $bossitem = new addbossitem();

            if (isset($_POST["idBosses"])) 
            {
                $bossitem->newBossItem($_POST);
            }
            $sql = "SELECT bi.idBosses, b.nameBoss, b.difficulty, d.nameDifficulty, d.pNumber, bi.idItems, i.nameItem FROM bosses b INNER JOIN bosses_has_items bi USING(idBosses) INNER JOIN items i USING(idItems) INNER JOIN difficulty d ON(i.difficulty=d.idDifficulty)";
            $sql1 = "SELECT b.idBosses, b.nameBoss, b.difficulty, d.nameDifficulty, d.pNumber FROM bosses b INNER JOIN difficulty d ON(b.difficulty = d.idDifficulty)";
            $this->data["bosses"] = Db::queryAll($sql1);
            $this->data["items"] = dbget::get("items");
            $this->data["bossitems"] = Db::queryAll($sql);

            $this->view = "addbossitem";
        }
        else
        {
            $this->redirect("");
        }
    }
}