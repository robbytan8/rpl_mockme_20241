<?php

class PDOUtil
{
  public static function createMySQLConnection()
  {
    $link = new PDO("mysql:host=localhost;dbname=rpl_mockme_20241", "robby_web_dev", "12345");
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    return $link;
  }
}