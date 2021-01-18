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

            $this->view = "addboss";
        }
        else
        {
            $this->redirect("");
        }
    }
}
