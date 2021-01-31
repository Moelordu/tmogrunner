<?php
class favorite
{
    public function newFavorite($info)
    {
        return Db::insert("users_has_bosses", $info);
    }

    public function delFavorite($par0, $par1)
    {
        $query = "DELETE FROM 
            users_has_bosses 
        WHERE 
            idBosses = $par0 AND idUsers = $par1";
        Db::query($query);
    }
}
