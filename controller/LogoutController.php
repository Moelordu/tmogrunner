<?php
class LogoutController extends Controller
{
    public function process($parameters)
    {
        unset($_SESSION["user"]);
        $this->redirect("");
    }
}
