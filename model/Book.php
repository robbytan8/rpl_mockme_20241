<?php

class Book
{
  private string $isbn13;
  private string $title;
  private string $author;
  private string $publisher;
  private ?string $cover = null;
  private string $rackNumber;

  public function getIsbn13(): string
  {
    return $this->isbn13;
  }

  public function setIsbn13(string $isbn13): void
  {
    $this->isbn13 = $isbn13;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  public function getAuthor(): string
  {
    return $this->author;
  }

  public function setAuthor(string $author): void
  {
    $this->author = $author;
  }

  public function getPublisher(): string
  {
    return $this->publisher;
  }

  public function setPublisher(string $publisher): void
  {
    $this->publisher = $publisher;
  }

  public function getCover(): ?string
  {
    return $this->cover;
  }

  public function setCover(?string $cover): void
  {
    $this->cover = $cover;
  }


  public function getRackNumber(): string
  {
    return $this->rackNumber;
  }

  public function setRackNumber(string $rackNumber): void
  {
    $this->rackNumber = $rackNumber;
  }

  public function __set($name, $value)
  {
    switch ($name) {
      case 'rack_number':
        $this->setRackNumber($value);
        break;
    }
  }
}