<?php
class EditclassController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $class = new addclass();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $class->delclass($parameters[0]);
                $this->redirect("addclass");
            }

            if (isset($_POST["nameClass"])) 
            {
                $_POST["idClasses"] = $parameters[0];
                $class->editClass($_POST);
                $this->redirect("addclass");
            }
            $this->data["class"] = dbget::getByID("classes", $parameters[0]);
            $this->view = "editclass";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
 