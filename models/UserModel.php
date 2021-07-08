<?php

class UserModel extends BaseModel
{
    public function findUserPassword($username, $password)
    {
        $stmt = $this->conMysql->prepare("SELECT id, username, password_hashed, `role` 
        FROM tbl_users 
        WHERE username = ?");
        $stmt->bind_param("s", $username);

        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if ($row['username'] === $username && password_verify($password, $row['password_hashed'])) {
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                $stmt->close();
                return true;
            }
        }
        $stmt->close();
        return false;
    }

    public function findUser($username)
    {
        $stmt = $this->conMysql->prepare("SELECT id FROM tbl_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stmt->close();
            return true;
        }
        $stmt->close();
        return false;
    }

    public function createUser($username, $password, $date)
    {
        $stmt = $this->conMysql->prepare("INSERT INTO tbl_users (username, password_hashed, `role`, create_at)
        VALUES (?, ?, 'user', ?)");
        $stmt->bind_param("sss", $username, $password, $date);
        $stmt->execute();
        $stmt->close();
    }

    public function updateUser($id, $username, $password, $date)
    {
        $stmt = $this->conMysql->prepare("UPDATE `db_iblog`.`tbl_users` 
        SET `username` = ?, `password_hashed` = ?, `role` = 'user', `update_at` = ?
        WHERE (`id` = ?);");
        $stmt->bind_param("ssss", $username, $password, $date, $id);
        $stmt->execute();
        $stmt->close();
    }
}
