<?php
class login
{
    public function log($parameters = array())
    {
        $query = "SELECT * FROM users WHERE name = ? AND password = ?";
        $user = array();
        $user = Db::queryOne($query, array_values($parameters));
        if($user)
        {
            $_SESSION["user"] = $user;
            return 1;
        }
        return 0;
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
            users 
        WHERE 
            idUsers = ?";
        return Db::query($query, array($parameters));
    }

    public function editUser($info)
    {
        $query = "UPDATE users SET name = ?, email = ?, admin = ? WHERE idUsers = ?";
        return Db::query($query, array_values($info));
    }

    public function editPUser($info)
    {
        $query = "UPDATE users SET name = ?, password = ?, email = ?, admin = ? WHERE idUsers = ?";
        return Db::query($query, array_values($info));
    }

    public function editRUser($info)
    {
        $query = "UPDATE users SET name = ?, email = ? WHERE idUsers = ?";
        return Db::query($query, array_values($info));
    }

    public function editRPUser($info)
    {
        $query = "UPDATE users SET name = ?, password = ?, email = ? WHERE idUsers = ?";
        return Db::query($query, array_values($info));
    }

    public function newUser($info)
    {
        return Db::insert("users", $info);
    }
}
