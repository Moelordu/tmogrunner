<?php
class BossController extends Controller
{
    public function process($parameters)
    {
        if(!empty($parameters[1]))
        {
            $bname = text::camelCase($parameters[0]);
            $diff = $parameters[1];
            $sql = "SELECT i.idItems, i.nameItem, i.idTypes, i.classSet FROM bosses b LEFT JOIN bosses_has_items USING(idBosses) INNER JOIN items i USING(idItems) WHERE REPLACE(b.nameBoss, ' ', '') LIKE '$bname' AND b.difficulty = $diff";
    
            $this->data["items"] = Db::queryAll($sql);
    

            $this->view = "boss";
        }
        else
        {
            $this->redirect("");
        }

    }
}
 