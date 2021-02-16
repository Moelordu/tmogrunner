<?php
class intro
{
    public function newFavorite($info)
    {
        $sql = "UPDATE users_has_bosses set favorite = '1' 
        WHERE idUsers = '" . $info[idUsers] . "' AND idBosses = '" . $info[idBosses] . "'";

        return Db::query($sql);
    }

    public function delFavorite($info)
    {
        $sql = "UPDATE users_has_bosses set favorite = '0' 
        WHERE idUsers = '" . $info[idUsers] . "' AND idBosses = '" . $info[idBosses] . "'";

        return Db::query($sql);
    }
}
