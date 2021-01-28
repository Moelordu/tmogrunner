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

            $sql = "SELECT r.idRealms, r.nameRealm, r.regionRealm, rg.nameRegion FROM realms r INNER JOIN regions rg ON(r.regionrealm = rg.idRegions)";

            $this->data["regions"] = dbget::get("regions");
            $this->data["realms"] = Db::queryAll($sql);
            $this->view = "addrealm";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
