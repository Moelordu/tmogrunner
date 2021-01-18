<?php
class EditController extends Controller
{
    public function process($parameters)
    {
        if(isset($_SESSION["user"]))
        {
            $login = new login();

            if (isset($_POST["name"])) 
            {
                $_POST["idAccounts"] = $_SESSION["user"]["idAccounts"];
                if($_POST["password"] == NULL)
                {
                    unset($_POST["password"]);
                    $login->editRUser($_POST);
                }
                else
                {
                    $_POST["password"] = sha1($_POST["password"]);
                    $login->editRPUser($_POST);
                }
                $this->redirect("adduser");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "edit";
        }
        else
        {
            $this->redirect("");
        }
    }
}