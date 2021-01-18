<?php
class addregion
{
    public function newRegion($info)
    {
        return Db::insert("regions", $info);
    }

    public function delRegion($info)
    {
        $query = "DELETE FROM 
            regions 
        WHERE 
            idRegions = ?";
        return Db::query($query, array($info));
    }

    public function editRegion($info)
    {
        $query = "UPDATE regions SET nameRegion = ? WHERE idRegions = ?";
        return Db::query($query, array_values($info));
    }
}
