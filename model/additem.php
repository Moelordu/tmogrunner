<?php
class additem
{
    public function newItem($info)
    {
        return Db::insert("items", $info);
    }

    public function delItem($info)
    {
        $query = "DELETE FROM 
            items
        WHERE 
            idItems = ?";
        return Db::query($query, array($info));
    }

    public function editItem($info)
    {
        $query = "UPDATE items SET nameItem = ?, idTypes = ?, classSet = ? WHERE idItems = ?";
        return Db::query($query, array_values($info));
    }
}