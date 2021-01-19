<?php
class RaidController extends Controller
{
    public function process($parameters)
    {
        $rname = text::camelCase($parameters[0]);
        $sql = "SELECT b.idBosses, b.nameBoss, b.difficulty, b.raid FROM raids r LEFT JOIN bosses b ON(r.idRaids = b.raid) WHERE replace(replace(r.nameRaid, ' ', ''), '\'', '') like '$rname'";

        $this->data["bosses"] = Db::queryAll($sql);


        $this->view = "raid";

    }
}
