<?php
class RaidsController extends Controller
{
    public function process($parameters)
    {
        $this->data["raids"] = dbget::get("raids");
        $this->view = "raids";
    }
}
