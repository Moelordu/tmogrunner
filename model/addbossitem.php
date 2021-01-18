<?php
class addbossitem
{
    public function newBossItem($info)
    {
        return Db::insert("bosses_has_items", $info);
    }

    public function delBossItem($par0, $par1)
    {
        $query = "DELETE FROM 
            bosses_has_items 
        WHERE 
            idBosses = $par0 AND idItems = $par1";
        Db::query($query);
    }
}
