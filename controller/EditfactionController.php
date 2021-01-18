<?php
class EditfactionController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $faction = new addfaction();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $faction->delfaction($parameters[0]);
                $this->redirect("addfaction");
            }

            if (isset($_POST["nameFaction"])) 
            {
                $_POST["idFactions"] = $parameters[0];
                $faction->editFaction($_POST);
                $this->redirect("addfaction");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "editfaction";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
