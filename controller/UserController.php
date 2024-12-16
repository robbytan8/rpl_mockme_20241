<?php
include_once 'dao/UserDao.php';
class UserController
{
  private UserDao $userDao;

  public function __construct()
  {
    $this->userDao = new UserDao();
  }

  public function showLoginForm() {
    include_once 'view/login.php';
  }

  public function login() {
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $user = $this->userDao->login($email, hash('sha256', $password));
    if ($user) {
      $_SESSION['logged_in'] = true;
      $_SESSION['role'] = $user->getRole()->getId();
      $_SESSION['role_name'] = $user->getRole()->getName();
      $_SESSION['name'] = $user->getName();
      $_SESSION['user_id'] = $user->getId();
      header('location:index.php');
    } else {
      $errMessage = 'Invalid email or password.';
      header('location:index.php?menu=login&&message=' . $errMessage);
    }
  }

  public function logout() {
    session_destroy();
    header('location:index.php');
  }
}