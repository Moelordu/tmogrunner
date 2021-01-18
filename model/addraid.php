<?php
class addraid
{
    public function newRaid($info)
    {
        return Db::insert("raids", $info);
    }

    public function delRaid($info)
    {
        $query = "DELETE FROM 
            raids
        WHERE 
            idRaids = ?";
        return Db::query($query, array($info));
    }

    public function editRaid($info)
    {
        $query = "UPDATE raids SET nameRaid = ? WHERE idRaids = ?";
        return Db::query($query, array_values($info));
    }
}