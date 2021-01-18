<?php
class EditbossController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $boss = new addboss();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $boss->delBoss($parameters[0]);
                $this->redirect("addboss");
            }

            if (isset($_POST["nameBoss"])) 
            {
                $_POST["idBosses"] = $parameters[0];
                $boss->editBoss($_POST);
                $this->redirect("addboss");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "editboss";
        }
        else
        {
            $this->redirect("");
        }
    }
}