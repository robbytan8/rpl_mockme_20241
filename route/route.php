<?php
include_once 'controller/BookController.php';
include_once 'controller/UserController.php';

$menu = filter_input(INPUT_GET, 'menu', FILTER_SANITIZE_SPECIAL_CHARS);
switch ($menu) {
  case 'member-book-list':
  case 'home':
    $bookController = new BookController();
    $bookController->indexMemberAndGuest();
    break;
  case 'adm-book':
    $bookController = new BookController();
    $bookController->index();
    break;
  case 'adm-book-create':
    $bookController = new BookController();
    $bookController->create();
    break;
  case 'adm-book-store':
    $bookController = new BookController();
    $bookController->store();
    break;
  case 'adm-book-edit':
    $bookController = new BookController();
    $bookController->edit();
    break;
  case 'adm-book-update':
    $bookController = new BookController();
    $bookController->update();
    break;
  case 'adm-book-delete':
    $bookController = new BookController();
    $bookController->delete();
    break;
  case 'login':
    $userController = new UserController();
    $userController->showLoginForm();
    break;
  case 'login_process':
    $userController = new UserController();
    $userController->login();
    break;
  case 'logout':
    $userController = new UserController();
    $userController->logout();
    break;
  case 'register':
    $userController = new UserController();
    $userController->showRegisterForm();
    break;
  case 'register_process':
    $userController = new UserController();
    $userController->register();
    break;
  case 'member-book-detail':
    $bookController = new BookController();
    $bookController->show();
    break;
  case 'adm-borrow':
    break;
  default:
    $bookController = new BookController();
    $bookController->indexMemberAndGuest();
}