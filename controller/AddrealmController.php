<?php
class AddrealmController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $realm = new addrealm();

            if (isset($_POST["nameRealm"])) 
            {
                $realm->newRealm($_POST);
            }
            $this->data["regions"] = dbget::get("regions");
            $this->data["realms"] = dbget::get("realms");
            $this->view = "addrealm";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
