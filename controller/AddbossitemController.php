<?php
class AddbossitemController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $bossitem = new addbossitem();

            if (isset($_POST["idBosses"])) 
            {
                $bossitem->newBossItem($_POST);
            }

            $this->view = "addbossitem";
        }
        else
        {
            $this->redirect("");
        }
    }
}