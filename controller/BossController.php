<?php
class BossController extends Controller
{
    public function process($parameters)
    {
        if(!empty($parameters[1]))
        {
            $nameb = $parameters[0];
            $diff = $parameters[1];
            $query = "SELECT idItems, nameItem, idTypes, classSet FROM bosses LEFT JOIN bosses_has_items USING(idBosses) RIGHT JOIN items USING(idItems) WHERE trim(both '_' from lower(regexp_replace(concat(upper(substring(nameBoss,1,1)),lower(right(nameBoss,length(nameBoss)-1))), '([A-Z])','_\1', 'g'))) LIKE '" . $nameb . "' AND difficulty = " . $diff;
            $this->data["items"] = Db::queryAll($query);

            $this->view = "boss";
        }
        else
        {
            $this->redirect("");
        }

    }
}
