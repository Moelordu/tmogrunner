<?php
class EdittypeclassController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $typeclass = new addtypeclass();

            if (!empty($parameters[2]) && $parameters[2] == "delete") 
            {
                $typeclass->delTypeClass($parameters[0], $parameters[1]);
                $this->redirect("addtypeclass");
            }

            $this->view = "addtypeclass";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
