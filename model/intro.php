<?php
class intro
{

    public function newFavorite($info)
    {
        return Db::insert("characters_has_bosses", $info);
    }

    public function delFavorite($par0, $par1)
    {
        $query = "DELETE FROM 
            characters_has_bosses 
        WHERE 
            idBosses = $par0 AND idCharacters = $par1";
        Db::query($query);
    }

}