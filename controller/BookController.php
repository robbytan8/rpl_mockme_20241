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

  public function indexMemberAndGuest() {
    $books = $this->bookDao->showAllBooks();
    include_once ('view/member/index.php');
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
      $newFileName = $this->validateAndGetCoverName($isbn13);
      $book = new Book();
      $book->setIsbn13($isbn13);
      $book->setTitle($title);
      $book->setAuthor($author);
      $book->setPublisher($publisher);
      $book->setRackNumber($rackNumber);
      if (isset($newFileName)) {
        $book->setCover($newFileName);
      }
      $result = $this->bookDao->addBook($book);
      if ($result) {
        $successMessage = 'Book added successfully';
        header('location: index.php?menu=adm-book&success_message=' . $successMessage);
      } else {
        $errMessage = 'There is something wrong with the server';
        header('location: index.php?menu=adm-book-create&message=' . $errMessage);
      }
    }
  }

  public function edit()
  {
    $isbn13 = filter_input(INPUT_GET, 'isbn13', FILTER_SANITIZE_STRING);
    $book = $this->bookDao->showOneBook($isbn13);
    if ($book && $book->getTitle() != null) {
      include_once('view/admin/edit.php');
    } else {
      $errMessage = 'Book not found';
      header('location: index.php?menu=adm-book&err_message=' . $errMessage);
    }
  }

  public function update()
  {
    $isbn13 = filter_input(INPUT_GET, 'isbn13', FILTER_SANITIZE_STRING);
    $book = $this->bookDao->showOneBook($isbn13);
    if ($book && $book->getTitle() != null) {
      $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
      $author = trim(filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING));
      $publisher = trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING));
      $rackNumber = trim(filter_input(INPUT_POST, 'rack_number', FILTER_SANITIZE_STRING));
      if (empty($title) || empty($author) || empty($publisher) || empty($rackNumber)) {
        $errMessage = 'Please fill all the required fields';
        header('location: index.php?menu=adm-book-edit&message=' . $errMessage);
      } else {
        //  Remove old cover
        if ($book->getCover() != null) {
          unlink('uploads/cover/' . $book->getCover());
        }

        $newFileName = $this->validateAndGetCoverName($isbn13);
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setPublisher($publisher);
        $book->setRackNumber($rackNumber);
        if (isset($newFileName)) {
          $book->setCover($newFileName);
        }
        $result = $this->bookDao->updateBook($book);
        if ($result) {
          $successMessage = 'Book updated successfully';
          header('location: index.php?menu=adm-book&success_message=' . $successMessage);
        } else {
          $errMessage = 'There is something wrong with the server';
          header('location: index.php?menu=adm-book-edit&message=' . $errMessage);
        }
      }
    } else {
      $errMessage = 'Book not found';
      header('location: index.php?menu=adm-book&err_message=' . $errMessage);
    }
  }

  /**
   * @param $isbn13
   * @return string
   */
  private function validateAndGetCoverName($isbn13): ?string
  {
    $newFileName = null;
    if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] != '') {
      $targetDir = 'uploads/cover/';
      $fileValid = 1;
      $imageType = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));

      //  1st Validation (Check is image)
      $isImage = getimagesize($_FILES['cover']['tmp_name']);
      if ($isImage === false) {
        $fileValid = 0;
      }

      //  2nd Validation (Check extension)
      if ($fileValid && ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg")) {
        $fileValid = 0;
      }

      //  3rd Validation (Check file size)
      if ($fileValid && $_FILES['cover']['size'] > 2 * 1024 * 1024) {
        $fileValid = 0;
      }

      //  Upload process
      if ($fileValid) {
        $newFileName = $isbn13 . '.' . $imageType;
        move_uploaded_file($_FILES['cover']['tmp_name'], $targetDir . $newFileName);
      }
    }
    return $newFileName;
  }

  public function delete()
  {
    $isbn13 = filter_input(INPUT_POST, 'isbn13', FILTER_SANITIZE_STRING);
    $book = $this->bookDao->showOneBook($isbn13);
    if ($book && $book->getTitle() != null) {
      unlink('uploads/cover/' . $book->getCover());
      $result = $this->bookDao->deleteBook($isbn13);
      if ($result) {
        $successMessage = 'Book deleted successfully';
        header('location: index.php?menu=adm-book&success_message=' . $successMessage);
      } else {
        $errMessage = 'There is something wrong with the server';
        header('location: index.php?menu=adm-book&err_message=' . $errMessage);
      }
    } else {
      $errMessage = 'Book not found';
      header('location: index.php?menu=adm-book&err_message=' . $errMessage);
    }
  }
}