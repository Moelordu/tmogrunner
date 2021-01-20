<?php
class EditcharacterController extends Controller
{
    public function process($parameters)
    {
        $character = new addcharacter();

        if (!empty($parameters[1]) && $parameters[1] == "delete") 
        {
            $character->delCharacter($parameters[0]);
            $this->redirect("addcharacter");
        }

        if (isset($_POST["nameCharacter"])) 
        {
            $_POST["idCharacters"] = $parameters[0];
            $character->editCharacter($_POST);
            $this->redirect("addcharacter");
        }
        $this->data["realms"] = dbget::get("realms");
        $this->data["factions"] = dbget::get("factions");
        $this->data["classes"] = dbget::get("classes");
        $this->data["chars"] = dbget::getById("characters", $parameters[0]);
        $this->view = "editcharacter";      
    }
}
 