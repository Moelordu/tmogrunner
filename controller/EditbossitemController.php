<?php
class EditbossitemController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $bossitem = new addbossitem();

            if (!empty($parameters[2]) && $parameters[2] == "delete") 
            {
                $bossitem->delBossItem($parameters[0], $parameters[1]);
                $this->redirect("addbossitem");
            }

            $this->view = "addbossitem";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
