<?php
class ResetController extends Controller
{
    public function process($parameters)
    {  
        $sql = "DELETE FROM characters_has_bosses WHERE 1";

        Db::queryAll($sql);
    
    }
    
    
}