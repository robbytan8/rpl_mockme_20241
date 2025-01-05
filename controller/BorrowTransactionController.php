<?php
include_once 'dao/BorrowTransactionDao.php';
class BorrowTransactionController
{
  private BorrowTransactionDao $borrowTransactionDao;

  public function __construct()
  {
    $this->borrowTransactionDao = new BorrowTransactionDao();
  }

  public function index()
  {
    $borrowTransactions = $this->borrowTransactionDao->showAllBorrowTransactions();
    include_once('view/admin/borrow/index.php');
  }
}