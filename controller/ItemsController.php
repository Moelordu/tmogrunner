<?php
class ItemsController extends Controller
{
    public function process($parameters)
    {

        $this->data["items"] = dbget::get("items");

        $this->view = "items";
    }
}
