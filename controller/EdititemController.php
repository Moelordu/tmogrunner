<?php
class EdititemController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $item = new additem();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $item->delItem($parameters[0]);
                $this->redirect("additem");
            }

            if (isset($_POST["nameItem"])) 
            {
                $_POST["idItems"] = $parameters[0];
                $item->editItem($_POST);
                $this->redirect("additem");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "edititem";
        }
        else
        {
            $this->redirect("");
        }
    }
}