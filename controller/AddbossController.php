<?php
class AddbossController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $boss = new addboss();

            if (isset($_POST["nameBoss"])) 
            {
                $boss->newBoss($_POST);
            }
            $sql = "SELECT b.idBosses, b.nameBoss, b.difficulty, d.nameDifficulty, d.pNumber, b.raid, r.nameRaid, r.url 
            FROM raids r INNER JOIN bosses b ON(r.idRaids=b.raid) INNER JOIN difficulty d ON(d.idDifficulty = b.difficulty)";
            
            $this->data["raids"] = dbget::get("raids");
            $this->data["difficulties"] = dbget::get("difficulty");
            $this->data["bosses"] = Db::queryAll($sql);
            $this->view = "addboss";
        }
        else
        {
            $this->redirect("");
        }
    }
}
