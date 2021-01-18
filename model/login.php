<?php
class login
{
    public function log($parameters = array())
    {
        $query = "SELECT * FROM accounts WHERE name = ? AND password = ?";
        $user = array();
        $user = Db::queryOne($query, array_values($parameters));
        return $user;
    }

    public function logged($parameters)
    {
        if(isset($parameters)) {
            $_SESSION["user"] = $parameters;
        }
    }

    public function delUser($parameters)
    {
        $query = "DELETE FROM 
            accounts 
        WHERE 
            idAccounts = ?";
        return Db::query($query, array($parameters));
    }

    public function editUser($info)
    {
        $query = "UPDATE accounts SET name = ?, email = ?, admin = ? WHERE idAccounts = ?";
        return Db::query($query, array_values($info));
    }

    public function editPUser($info)
    {
        $query = "UPDATE accounts SET name = ?, password = ?, email = ?, admin = ? WHERE idAccounts = ?";
        return Db::query($query, array_values($info));
    }

    public function editRUser($info)
    {
        $query = "UPDATE accounts SET name = ?, email = ? WHERE idAccounts = ?";
        return Db::query($query, array_values($info));
    }

    public function editRPUser($info)
    {
        $query = "UPDATE accounts SET name = ?, password = ?, email = ? WHERE idAccounts = ?";
        return Db::query($query, array_values($info));
    }

    public function newUser($info)
    {
        return Db::insert("accounts", $info);
    }
}
