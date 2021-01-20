<?php
class AdduserController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $login = new login();

            if (isset($_POST["name"])) {
                $par = array();
                $par = $_POST;
                $par["password"] = sha1($_POST["password"]);
                $login->newUser($par);
                $this->redirect("adduser");
            }
            $this->data["accs"] = dbget::get("Accounts");
            $this->view = "adduser";
        }
        else
        {
            $this->redirect("");
        }
    }
}