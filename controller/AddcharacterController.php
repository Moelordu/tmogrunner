<?php
class AddcharacterController extends Controller
{
    public function process($parameters)
    {
        if(!empty($_SESSION["user"]))
        {
            $character = new addcharacter();

            if (isset($_POST["nameCharacter"])) 
            {
                $character->newCharacter($_POST);
            }
            
            $sql = "SELECT r.idRealms, r.nameRealm, r.regionRealm, rg.nameRegion FROM realms r INNER JOIN regions rg ON(r.regionRealm = rg.idRegions)";

            $this->data["realms"] = Db::queryAll($sql);
            $this->data["factions"] = dbget::get("factions");
            $this->data["classes"] = dbget::get("classes"); 
            $this->data["characters"] = dbget::getAccCharacters();
            $this->view = "addcharacter";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
