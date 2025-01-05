<?php
include_once 'model/BorrowTransaction.php';
class BorrowTransactionDao
{
  public function showAllBorrowTransactions()
  {
    $link = PDOUtil::createMySQLConnection();
    $query = "SELECT b.id, borrowed_date, returned_date, status, user_id, borrowed_id FROM borrow_transaction b JOIN user u ON b.borrowed_id = u.id";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, BorrowTransaction::class);
    $stmt->execute();
    $link = null;
    return $stmt->fetchAll();
  }
}