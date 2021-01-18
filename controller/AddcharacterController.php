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

            $this->view = "addcharacter";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
