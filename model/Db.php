<?php
//Wrapper
class Db
{
    private static $connect;

    // Výchozí nastavení ovladače
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    // Připojí se k databázi pomocí daných údajů
    public static function connect($server, $user, $password, $database)
    {
        if (!isset(self::$connect)) {
            $dsn = "mysql:host=$server;dbname=$database;charset=utf8";
            self::$connect = new PDO(
                $dsn,
                $user,
                $password,
                self::$settings
            );
        }
    }

    // první řádek
    public static function queryOne($query, $parameters = array())
    {
        $return = self::$connect->prepare($query);
        $return->execute($parameters);
        return $return->fetch();
    }

    // všechny řádky
    public static function queryAll($query, $parameters = array())
    {
        $return = self::$connect->prepare($query);
        $return->execute($parameters);
        return $return->fetchAll();
    }

    // první sloupec prvního řádku (id)
    public static function queryAlone($query, $parameters = array())
    {
        $result = self::queryOne($query, $parameters);
        return $result[0];
    }

    // spustí se, vrátí počet řádků co byly ovlivněny
    public static function query($query, $parameters = array())
    {
        $return = self::$connect->prepare($query);
        $return->execute($parameters);
        return $return->rowCount();
    }


    // nový řádek jako data z pole
    public static function insert($table, $parameters = array())
    {
        return self::query(
            "
        INSERT INTO $table 
        (" . implode(', ', array_keys($parameters)) . ")
        VALUES 
        (" . str_repeat('?,', sizeOf($parameters) - 1) . "?)",
            array_values($parameters)
        );
    }

    // změní řádek jako data z pole
    public static function change($table, $values = array(), $condition, $parameters = array())
    {
        return self::query(
            "UPDATE $table SET " .
                implode(' = ?, ', array_keys($values)) .
                " = ? " . $condition,
            array_merge(array_values($values), $parameters)
        );
    }

    // vrací ID posledně vloženého záznamu
    public static function lastInsertId()
    {
        return self::$connect->lastInsertId();
    }

    public static function getColumnNames($table){
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = :table";
        try {
            $core = Core::getInstance();
            $stmt = $core->dbh->prepare($sql);
            $stmt->bindValue(':table', $table, PDO::PARAM_STR);
            $stmt->execute();
            $output = array();
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $output[] = $row['COLUMN_NAME'];                
            }
            return $output; 
        }
    
        catch(PDOException $pe) {
            trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);
        }
    }
}
