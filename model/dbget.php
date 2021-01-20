<?php
class dbget
{
    public static function get($table)
    {
        $query = "SELECT * FROM " . $table;
        return Db::queryAll($query);
    }

    public static function getByID($table, $id)
    {
        $q = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table'";
        $columns = Db::queryOne($q);      
        $query = "SELECT * FROM $table WHERE " . $columns[0] . " = $id"; 
        return Db::queryOne($query);
    }

    public static function toName($table, $id)
    {
        $q = "SELECT COLUMN_NAME
        FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = '$table'";
        $columns = Db::queryAll($q);
        $query = "SELECT " . $columns[1][0] . " FROM $table WHERE ". $columns[0][0] ." = $id";
        return Db::queryOne($query);
    }

    public static function getAccCharacters()
    {
        $query = "SELECT * FROM characters WHERE " . $_SESSION["user"]["idUsers"] . " = userCharacter";
        $parameters = array();
        return Db::queryAll($query, $parameters);
    }

}