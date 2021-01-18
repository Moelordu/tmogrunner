<?php
class AdddifficultyController extends Controller
{
    public function process($parameters)
    {
        if($_SESSION["user"]["admin"] == 1)
        {
            $difficulty = new adddifficulty();

            if (isset($_POST["nameDifficulty"])) 
            {
                $difficulty->newDifficulty($_POST);
            }

            $this->view = "adddifficulty";
        }
        else
        {
            $this->redirect("");
        }
    }
}
