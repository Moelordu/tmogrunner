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
            $this->data["bosses"] = dbget::get("bosses");
            $this->data["items"] = dbget::get("items");
            $this->data["bossitems"] = dbget::get("bosses_has_items");

            $this->view = "addbossitem";
        }
        else
        {
            $this->redirect("");
        }
    }
}