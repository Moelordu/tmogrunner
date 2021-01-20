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
            $this->data["classes"] = dbget::get("classes");
            $this->data["types"] = dbget::get("types");
            $this->data["typeclasses"] = dbget::get("classes_has_types");
            $this->view = "addtypeclass";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
