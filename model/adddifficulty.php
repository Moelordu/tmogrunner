<?php
class adddifficulty
{
    public function newDifficulty($info)
    {
        return Db::insert("difficulty", $info);
    }

    public function delDifficulty($info)
    {
        $query = "DELETE FROM 
            difficulty
        WHERE 
            idDifficulty = ?";
        return Db::query($query, array($info));
    }

    public function editDifficulty($info)
    {
        $query = "UPDATE difficulty SET nameDifficulty = ?, pNumber = ? WHERE idDifficulty = ?";
        return Db::query($query, array_values($info));
    }
}
