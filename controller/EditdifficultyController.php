<?php
class EditdifficultyController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $difficulty = new adddifficulty();

            if (!empty($parameters[1]) && $parameters[1] == "delete") 
            {
                $difficulty->deldifficulty($parameters[0]);
                $this->redirect("adddifficulty");
            }

            if (isset($_POST["nameDifficulty"])) 
            {
                $_POST["idDifficulty"] = $parameters[0];
                $difficulty->editDifficulty($_POST);
                $this->redirect("adddifficulty");
            }
            $this->data["id"] = $parameters[0];
            $this->view = "editdifficulty";
        }
        else
        {
            $this->redirect("");
        }
        
    }
}
