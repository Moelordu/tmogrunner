<?php
class EdituserController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $login = new login();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $login->delUser($parameters[0]);
                $this->redirect("adduser");
            }

            if (isset($_POST["name"])) 
            {
                $_POST["idAccounts"] = $parameters[0];
                if($_POST["password"] == NULL)
                {
                    unset($_POST["password"]);
                    $login->editUser($_POST);
                }
                else
                {
                    $_POST["password"] = sha1($_POST["password"]);
                    $login->editPUser($_POST);
                }
                $this->redirect("adduser");
            }
            
            $this->data["accs"] = dbget::getByID("accounts", $parameters[0]);
            $this->view = "edituser";
        }
        else
        {
            $this->redirect("");
        }
    }
} 