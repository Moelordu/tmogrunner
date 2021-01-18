<?php
class addtypeclass
{
    public function newTypeClass($info)
    {
        return Db::insert("classes_has_types", $info);
    }

    public function delTypeClass($par0, $par1)
    {
        $query = "DELETE FROM 
            classes_has_types 
        WHERE 
            idClasses = $par0 AND idTypes = $par1";
        Db::query($query);
    }
}
