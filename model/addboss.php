<?php
class addboss
{
    public function newBoss($info)
    {
        return Db::insert("bosses", $info);
    }
    
    public function delBoss($info)
    {
        $query = "DELETE FROM 
            bosses
        WHERE 
            idBosses = ?";
        return Db::query($query, array($info));
    }

    public function editBoss($info)
    {
        $query = "UPDATE bosses SET nameBoss = ?, difficulty = ?, raid = ? WHERE idBosses = ?";
        return Db::query($query, array_values($info));
    }
}