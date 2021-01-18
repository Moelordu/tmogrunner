<?php
class LoginController extends Controller
{
    public function process($parameters)
    {
        $login = new login();

        if (isset($_POST["username"])) {
            $par = array();
            $par = $_POST;
            $par["password"] = sha1($_POST["password"]);
            $user = $login->log($par);
            $login->logged($user);
            $this->redirect("");
        }

        $this->view = "login";
    }
}
