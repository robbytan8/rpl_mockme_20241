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
  default:
}