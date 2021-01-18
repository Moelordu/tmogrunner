<?php
abstract class Controller
{
    protected $db;
    protected $view = "";
    protected $data = array();

    public function __construct()
    {
    }

    public function printView()
    {
        extract($this->data);
        require("view/{$this->view}.phtml");
    }

    public function redirect($url)
    {
        header("Location: /$url");
        exit;
    }

    abstract function process($parameters);
}
