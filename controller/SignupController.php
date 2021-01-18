<?php
class SignupController extends Controller
{
    public function process($parameters)
    {
        $signup = new login();

        if (isset($_POST["name"])) {
            $arr = array();
            $arr = $_POST;
            $arr["password"] = sha1($_POST["password"]);
            $signup->newUser($arr);
            $this->redirect("");
        }

        $this->view = "signup";
    }
}
