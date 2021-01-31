<?php
class IntroController extends Controller
{
    public function process($parameters)
    {
        if(!empty($_SESSION["user"]))
        {
            $this->view = "favorite";
        }
        else
        {   
            $this->view = "intro";
        }
    }
}
