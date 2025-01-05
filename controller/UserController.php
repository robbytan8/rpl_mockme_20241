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

  public function showRegisterForm() {
    include_once 'view/register.php';
  }

  public function register() {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $rePassword = trim(filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    if (!empty($name) && !empty($email) && !empty($password) && !empty($rePassword) && !empty($phone)) {
      if ($password != $rePassword) {
        $errMessage = 'Passwords do not match.';
        header('location:index.php?menu=register&&message=' . $errMessage);
      } else {
        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setPhone($phone);
        $user->getRole()->setId(2);
        $result = $this->userDao->register($user);
        if ($result) {
          $successMessage = 'You have been successfully registered.';
          header('location:index.php?menu=login&&success_message=' . $successMessage);
        } else {
          $errMessage = 'An error occurred while registering. Please try again.';
          header('location:index.php?menu=register&&message=' . $errMessage);
        }
      }
    } else {
      $errMessage = 'Please fill all required fields.';
      header('location:index.php?menu=register&&message=' . $errMessage);
    }
  }
}