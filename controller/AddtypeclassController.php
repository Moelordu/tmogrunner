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

            $this->view = "addtypeclass";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
