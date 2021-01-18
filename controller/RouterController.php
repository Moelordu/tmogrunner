<?php
class RouterController extends Controller
{
    protected $controller;

    public function process($parameters)
    {
        $path = $this->parseURL($parameters[0]);

        if (empty($path[0])) {
            $this->redirect("intro");
        }
        $partClassController =
            $this->toCamelCase(array_shift($path));
        $classController = $partClassController . "Controller";

        if (file_exists("controller/$classController.php")) {
            $this->controller = new $classController;
        } else {
            $this->redirect("error");
        }

        $this->controller->process($path);

        $this->view = "layout";
    }

    // camelcase -> CamelCase
    private function toCamelCase($text)
    {
        $text = str_replace("-", " ", $text);
        $text = ucwords($text);
        $text = str_replace(" ", "", $text);
        return $text;
    }

    private function parseURL($url)
    {
        $parsedURL = parse_url($url);
        $fullpath = $parsedURL["path"];

        $fullpath = ltrim($fullpath, "/");
        $fullpath = trim($fullpath);

        $dividedPath = explode("/", $fullpath);

        return $dividedPath;
    }

    public function isAdmin()
    {
        if ($_SESSION["user"]["admin"] > 0) {
            return true;
        }
        return false;
    }
}
