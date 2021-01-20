<?php
class EditrealmController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $realm = new addrealm();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $realm->delRealm($parameters[0]);
                $this->redirect("addrealm");
            }

            if (isset($_POST["nameRealm"])) 
            {
                $_POST["idRealms"] = $parameters[0];
                $realm->editRealm($_POST);
                $this->redirect("addrealm");
            }
            $this->data["realm"] = dbget::getByID("realms", $parameters[0]);
            $this->data["regions"] = dbget::get("regions");
            $this->view = "editrealm";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
