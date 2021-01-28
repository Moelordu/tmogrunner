<?php
class AddtypeclassController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $typeclass = new addtypeclass();

            if (isset($_POST["idClasses"])) 
            {
                $typeclass->newTypeClass($_POST);
            } 

            $sql = "SELECT ct.idClasses, c.nameClass, ct.idTypes, t.nameType FROM classes c INNER JOIN classes_has_types ct USING(idClasses) INNER JOIN types t USING(idTypes)";

            $this->data["classes"] = dbget::get("classes");
            $this->data["types"] = dbget::get("types");
            $this->data["typeclasses"] = Db::queryAll($sql);
            $this->view = "addtypeclass";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
