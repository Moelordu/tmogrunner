<?php
class EditregionController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $region = new addregion();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $region->delRegion($parameters[0]);
                $this->redirect("addregion");
            }

            if (isset($_POST["nameRegion"])) 
            {
                $_POST["idRegions"] = $parameters[0];
                $region->editRegion($_POST);
                $this->redirect("addregion");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "editregion";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
