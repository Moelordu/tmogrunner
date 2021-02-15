<?php
class RaidController extends Controller
{
    public function process($parameters)
    {
        $favorite = new favorite();
        $rname = text::camelCase($parameters[0]);
        $sql = "SELECT b.idBosses, b.nameBoss, b.difficulty, b.raid, d.nameDifficulty, u.idUsers
        FROM raids r INNER JOIN bosses b ON(r.idRaids = b.raid) INNER JOIN difficulty d ON(b.difficulty = d.idDifficulty) LEFT JOIN users_has_bosses ub ON(b.idBosses = ub.idBosses) LEFT JOIN users u ON(ub.idUsers = u.idUsers)
        WHERE replace(replace(r.nameRaid, ' ', ''), '\'', '') like '$rname'";
 
        $this->data["bosses"] = Db::queryAll($sql);

        if (isset($_POST["idBosses"])) {
            if($_POST["idUsers"] > 0)
            {
                $_POST["idUsers"] = $_SESSION["user"]["idUsers"];
                $favorite->newFavorite($_POST);
                $this->redirect("raid/" . $parameters[0]);
            }
            else
            {
                $favorite->delFavorite($_POST["idBosses"], $_SESSION["user"]["idUsers"]);
                $this->redirect("raid/" . $parameters[0]);
            }
                
        }
        $this->view = "raid";
    }
}
