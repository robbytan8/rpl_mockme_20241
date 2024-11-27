<?php
include_once 'dao/BookDAO.php';

class BookController
{
  private BookDao $bookDao;

  public function __construct()
  {
    $this->bookDao = new BookDao();
  }

  public function index()
  {
    $books = $this->bookDao->showAllBooks();
    include_once('view/admin/index.php');
  }

  public function create()
  {

  }

  public function store()
  {

  }
}