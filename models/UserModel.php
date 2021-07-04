<?php

class UserModel extends BaseModel
{
    public function findUserPassword($username, $password)
    {
        $stmt = $this->conMysql->prepare("SELECT id, username, password_hashed, `role` FROM tbl_users WHERE username = ?");
        $stmt->bind_param("s", $username);

        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            if ($row['username'] === $username && hash_equals($row['password_hashed'], $password)) {
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
            return true;
        }
        $stmt->close();
        return false;
    }

    public function createUser($username, $password)
    {
        $date = date("Y-m-d H:i:s");
        $stmt = $this->conMysql->prepare("INSERT INTO tbl_users (username, password_hashed, `role`, create_at)
        VALUES (?, ?, 'user', ?)");
        $stmt->bind_param("sss", $username, $password, $date);
        $stmt->execute();
        $stmt->close();
    }
}
