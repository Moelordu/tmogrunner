<?php
class addcharacter
{
    public function newCharacter($info)
    {
        return Db::insert("characters", $info);
    }

    public function delCharacter($info)
    {
        $query = "DELETE FROM 
            characters
        WHERE 
            idCharacters = ?";
        return Db::query($query, array($info));
    }

    public function editCharacter($info)
    {
        $query = "UPDATE characters SET nameCharacter = ?, realmCharacter = ?, factionCharacter = ?, classCharacter = ? WHERE idCharacters = ?";
        return Db::query($query, array_values($info));
    }
}
