<?php
class addfaction
{
    public function newFaction($info)
    {
        return Db::insert("factions", $info);
    }

    public function delFaction($info)
    {
        $query = "DELETE FROM 
            factions
        WHERE 
            idFactions = ?";
        return Db::query($query, array($info));
    }

    public function editFaction($info)
    {
        $query = "UPDATE factions SET nameFaction = ? WHERE idFactions = ?";
        return Db::query($query, array_values($info));
    }
}
