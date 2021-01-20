<?php
class AddfactionController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $faction = new addfaction();

            if (isset($_POST["nameFaction"])) 
            {
                $faction->newFaction($_POST);
            }
            $this->data["factions"] = dbget::get("factions");
            $this->view = "addfaction";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
