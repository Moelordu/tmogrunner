<?php
class EdittypeController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $type = new addtype();

            if (!empty($parameters[1]) && $parameters[1] == "delete")
            {
                $type->delType($parameters[0]);
                $this->redirect("addtype");
            }

            if (isset($_POST["nameType"])) 
            {
                $_POST["idTypes"] = $parameters[0];
                $type->editType($_POST);
                $this->redirect("addtype");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "edittype";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
