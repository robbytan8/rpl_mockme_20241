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

  public function register(User $user) {
    $link = PDOUtil::createMySQLConnection();
    $query = "INSERT INTO user(name, email, password, role_id, phone) VALUES(?, ?, ?, ?, ?)";
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $user->getName());
    $stmt->bindValue(2, $user->getEmail());
    $stmt->bindValue(3, $user->getPassword());
    $stmt->bindValue(4, $user->getRole()->getId());
    $stmt->bindValue(5, $user->getPhone());
    $link->beginTransaction();
    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollback();
      $result = 0;
    }
    $link = null;
    return $result;
  }
}