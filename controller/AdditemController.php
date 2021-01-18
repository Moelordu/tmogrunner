<?php
class AdditemController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $item = new additem();

            if (isset($_POST["nameItem"])) 
            {
                $item->newItem($_POST);
            }

            $this->view = "additem";
        }
        else
        {
            $this->redirect("");
        }
    }
}
