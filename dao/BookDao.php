<?php

include_once 'PDOUtil.php';
include_once 'model/Book.php';

class BookDao
{
  public function showAllBooks()
  {
    $link = PDOUtil::createMySQLConnection();
    $query = "SELECT isbn13, title, author, publisher, cover, rack_number FROM book";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Book::class);
    $stmt->execute();
    $link = null;
    return $stmt->fetchAll();
  }

  public function addBook(Book $book): int
  {
    $link = PDOUtil::createMySQLConnection();
    $query = "INSERT INTO book(isbn13, title, author, publisher, cover, rack_number) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $book->getIsbn13());
    $stmt->bindValue(2, $book->getTitle());
    $stmt->bindValue(3, $book->getAuthor());
    $stmt->bindValue(4, $book->getPublisher());
    $stmt->bindValue(5, $book->getCover());
    $stmt->bindValue(6, $book->getRackNumber());
    $link->beginTransaction();
    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollBack();
      $result = 0;
    }
    $link = null;
    return $result;
  }
}