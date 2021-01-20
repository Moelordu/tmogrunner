<?php
class AddbossController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $boss = new addboss();

            if (isset($_POST["nameBoss"])) 
            {
                $boss->newBoss($_POST);
            }
            $this->data["raids"] = dbget::get("raids");
            $this->data["difficulties"] = dbget::get("difficulty");
            $this->data["bosses"] = dbget::get("bosses");
            $this->view = "addboss";
        }
        else
        {
            $this->redirect("");
        }
    }
}
