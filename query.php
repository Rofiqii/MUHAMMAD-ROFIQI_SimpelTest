<?php

include_once './koneksi.php';

class CRUD extends Koneksi
{
    public function getData()
    {
        $query = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($query);
        $result->execute();

        return $result;
    }

    public function getDataById($id)
    {
        $query = "SELECT * FROM user_detail WHERE `id` = :id";
        $result = $this->koneksi->prepare($query);
        $result->execute(compact('id'));

        return $result->fetchObject();
    }

    public function loginUser($email, $pass)
    {
        $query = "SELECT * FROM `user_detail` WHERE `user_email` = :email AND `user_password` = :pass";
        $stmt = $this->koneksi->prepare($query);
        $stmt->execute([
            'email' => $email,
            'pass' => $pass,
        ]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function insertData($email, $pass, $name)
    {
        try {
            $sql = "INSERT INTO `user_detail` (`user_email`, `user_password`, `user_fullname`, `level`)
                VALUES (:email, :pass, :name, 2)";

            $stmt = $this->koneksi->prepare($sql);
            $stmt->execute(compact('email', 'pass', 'name'));

            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateData($email, $pass, $name, $id)
    {
        try {
            $sql = "UPDATE `user_detail` SET `user_email` = :email, `user_password` = :pass, `user_fullname` = :name WHERE `id` = :id";

            $stmt = $this->koneksi->prepare($sql);
            $stmt->execute(compact('email', 'pass', 'name', 'id'));

            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM `user_detail` WHERE `id` = :id";

            $stmt = $this->koneksi->prepare($sql);
            $stmt->execute(compact('id'));

            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
