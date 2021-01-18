<?php
class addclass
{
    public function newClass($info)
    {
        return Db::insert("classes", $info);
    }
    
    public function delClass($info)
    {
        $query = "DELETE FROM 
            classes
        WHERE 
            idClasses = ?";
        return Db::query($query, array($info));
    }

    public function editClass($info)
    {
        $query = "UPDATE classes SET nameClass = ? WHERE idClasses = ?";
        return Db::query($query, array_values($info));
    }
}

