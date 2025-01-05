<?php

class BorrowTransaction
{
  private int $id;
  private string $borrowedDate;
  private string $returnedDate;
  private bool $status;
  private User $user;
  private User $borrower;

  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getBorrowedDate(): string
  {
    return $this->borrowedDate;
  }

  public function setBorrowedDate(string $borrowedDate): void
  {
    $this->borrowedDate = $borrowedDate;
  }

  public function getReturnedDate(): string
  {
    return $this->returnedDate;
  }

  public function setReturnedDate(string $returnedDate): void
  {
    $this->returnedDate = $returnedDate;
  }

  public function isStatus(): bool
  {
    return $this->status;
  }

  public function setStatus(bool $status): void
  {
    $this->status = $status;
  }

  public function getUser(): User
  {
    if (!isset($this->user)) {
      $this->user = new User();
    }
    return $this->user;
  }

  public function setUser(User $user): void
  {
    $this->user = $user;
  }

  public function getBorrower(): User
  {
    if (!isset($this->borrower)) {
      $this->borrower = new User();
    }
    return $this->borrower;
  }

  public function setBorrower(User $borrower): void
  {
    $this->borrower = $borrower;
  }

  public function __set($name, $value)
  {
    switch ($name) {
      case 'borrowed_date':
        $this->borrowedDate = $value;
        break;
      case 'returned_date':
        $this->returnedDate = $value;
        break;
      case 'user_id':
        $this->user->setId($value);
        break;
      case 'borrower_id':
        $this->borrower->setId($value);
        break;
    }
  }
}