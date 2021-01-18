<?php
class AddregionController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $region = new addregion();

            if (isset($_POST["nameRegion"])) 
            {
                $region->newRegion($_POST);
            }

            $this->view = "addregion";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
