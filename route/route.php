<?php
include_once 'controller/BookController.php';

$menu = filter_input(INPUT_GET, 'menu', FILTER_SANITIZE_SPECIAL_CHARS);
switch ($menu) {
  case 'home':
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
  default:
}