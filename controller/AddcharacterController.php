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
            $sql1 = "SELECT ch.idCharacters, ch.nameCharacter, ch.classCharacter, c.nameClass, ch.realmCharacter, r.nameRealm, r.regionRealm, rg.nameRegion, ch.factionCharacter, f.nameFaction 
            FROM characters ch INNER JOIN classes c ON(ch.classCharacter = c.idClasses) INNER JOIN realms r ON(ch.realmCharacter = r.idRealms) INNER JOIN factions f ON(ch.factionCharacter = f.idFactions) INNER JOIN regions rg ON(r.regionRealm = rg.idRegions) 
            WHERE '" . $_SESSION["user"]["idUsers"] . "' LIKE ch.userCharacter";

            $this->data["realms"] = Db::queryAll($sql);
            $this->data["factions"] = dbget::get("factions");
            $this->data["classes"] = dbget::get("classes"); 
            $this->data["characters"] = Db::queryAll($sql1);
            $this->view = "addcharacter";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
