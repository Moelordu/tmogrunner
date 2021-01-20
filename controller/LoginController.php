<?php
class LoginController extends Controller
{
    public function process($parameters)
    {
        $login = new login();

        if (isset($_POST["username"])) {
            $par = $_POST;
            $par["password"] = sha1($_POST["password"]);
            $login->log($par);
            $this->redirect("");
        }

        $this->view = "login";
    }
}
