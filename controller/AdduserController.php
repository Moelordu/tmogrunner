<?php
class AdduserController extends Controller
{
    public function process($parameters)
    {
        if(!empty($_SESSION["user"]["admin"]))
        {
            $login = new login();

            if (isset($_POST["name"])) {
                $par = array();
                $par = $_POST;
                $par["password"] = sha1($_POST["password"]);
                $login->newUser($par);
                $this->redirect("adduser");
            }
            $this->data["accs"] = dbget::get("users");
            $this->view = "adduser";
        }
        else
        {
            $this->redirect("");
        }
    }
}