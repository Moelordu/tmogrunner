<?php
class EditraidController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $raid = new addraid();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $raid->delRaid($parameters[0]);
                $this->redirect("addraid");
            }

            if (isset($_POST["nameRaid"])) 
            {
                $_POST["idRaid"] = $parameters[0];
                $raid->editRaid($_POST);
                $this->redirect("addraid");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "editraid";
        }
        else
        {
            $this->redirect("");
        }
    }
}