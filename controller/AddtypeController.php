<?php
class AddtypeController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $type = new addtype();

            if (isset($_POST["nameType"]))
            {
                $type->newType($_POST);
            }
            $this->data["types"] = dbget::get("types");
            $this->view = "addtype";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
