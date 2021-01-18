<?php
class addrealm
{
    public function newRealm($info)
    {
        return Db::insert("realms", $info);
    }

    public function delRealm($info)
    {
        $query = "DELETE FROM 
            realms 
        WHERE 
            idRealms = ?";
        return Db::query($query, array($info));
    }

    public function editRealm($info)
    {
        $query = "UPDATE realms SET nameRealm = ?, regionRealm = ? WHERE idRealms = ?";
        return Db::query($query, array_values($info));
    }
}
