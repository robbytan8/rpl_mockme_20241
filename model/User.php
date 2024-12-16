<?php
include_once 'model/Role.php';

class User
{
  private string $id;
  private string $name;
  private string $email;
  private string $phone;
  private string $password;
  private Role $role;


  public function getId(): string
  {
    return $this->id;
  }

  public function setId(string $id): void
  {
    $this->id = $id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function getPhone(): string
  {
    return $this->phone;
  }

  public function setPhone(string $phone): void
  {
    $this->phone = $phone;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  public function getRole(): Role
  {
    if (!isset($this->role)) {
      $this->role = new Role();
    }
    return $this->role;
  }

  public function setRole(Role $role): void
  {
    $this->role = $role;
  }

  public function __set($name, $value)
  {
    switch ($name) {
      case 'role_id':
        $this->getRole()->setId($value);
        break;
      case 'role_name':
        $this->getRole()->setName($value);
        break;
    }
  }
}