<?php
class AddclassController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $class = new addclass();

            if (isset($_POST["nameClass"])) 
            {
                $class->newClass($_POST);
            }
            $this->data["classes"] = dbget::get("classes");
            $this->view = "addclass";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
