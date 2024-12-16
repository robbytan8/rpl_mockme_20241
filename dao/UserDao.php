<?php
include_once 'PDOUtil.php';
include_once 'model/User.php';

class UserDao
{
  public function login(string $email, string $password)
  {
    $link = PDOUtil::createMySQLConnection();
    $query = "SELECT u.id, u.name, email, phone, role_id, r.name AS role_name FROM user u JOIN role r ON u.role_id = r.id WHERE email = ? AND password = ?";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->bindParam(1, $email);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    $link = null;
    return $stmt->fetchObject(User::class);
  }
}