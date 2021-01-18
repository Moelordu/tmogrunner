<?php
class addtype
{
    public function newType($info)
    {
        return Db::insert("types", $info);
    }

    public function delType($info)
    {
        $query = "DELETE FROM 
            types 
        WHERE 
            idTypes = ?";
        return Db::query($query, array($info));
    }

    public function editType($info)
    {
        $query = "UPDATE types SET nameType = ? WHERE idTypes = ?";
        return Db::query($query, array_values($info));
    }
}
