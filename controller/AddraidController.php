<?php
class AddraidController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        { 
            $raid = new addraid();

            if (isset($_POST["nameRaid"])) 
            {                
                $_POST["url"] = text::from_camel(text::camelCase($_POST["nameRaid"]));
                $raid->newRaid($_POST);
            }
            $this->data["raids"] = dbget::get("raids");
            $this->view = "addraid";
        }
        else
        {
            $this->redirect("");
        }
    }
}
