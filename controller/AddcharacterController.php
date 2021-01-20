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
            $this->data["realms"] = dbget::get("realms");
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
