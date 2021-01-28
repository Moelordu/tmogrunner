<?php
class AdditemController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $item = new additem();

            if (isset($_POST["nameItem"])) 
            {
                $item->newItem($_POST);
            }
            $sql = "SELECT i.idItems, i.nameItem, i.idTypes, t.nameType, i.classSet, c.nameClass FROM types t INNER JOIN items i USING(idTypes) INNER JOIN classes c ON(c.idClasses = i.classSet)";
            
            $this->data["types"] = dbget::get("types");
            $this->data["classes"] = dbget::get("classes");
            $this->data["items"] = Db::queryAll($sql);
            $this->view = "additem";
        }
        else
        {
            $this->redirect("");
        }
    }
}
