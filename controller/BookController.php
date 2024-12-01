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
    include_once('view/admin/create.php');
  }

  public function store()
  {
    $isbn13 = trim(filter_input(INPUT_POST, 'isbn13', FILTER_SANITIZE_STRING));
    $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
    $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
    $publisher = trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING));
    $rackNumber = trim(filter_input(INPUT_POST, 'rack_number', FILTER_SANITIZE_STRING));
    if (empty($isbn13) || empty($title) || empty($author) || empty($publisher) || empty($rackNumber)) {
      $errMessage = 'Please fill all the required fields';
      header('location: index.php?menu=adm-book-create&message=' . $errMessage);
    } else {
      $book = new Book();
      $book->setIsbn13($isbn13);
      $book->setTitle($title);
      $book->setAuthor($author);
      $book->setPublisher($publisher);
      $book->setRackNumber($rackNumber);
      $result = $this->bookDao->addBook($book);
      if ($result) {
        $successMessage = 'Book added successfully';
        header('location: index.php?menu=adm-book&message=' . $successMessage);
      } else {
        $errMessage = 'There is something wrong with the server';
        header('location: index.php?menu=adm-book-create&message=' . $errMessage);
      }
    }
  }
}