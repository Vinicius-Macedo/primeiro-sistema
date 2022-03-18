<?php

class Database
{

  private $servername = 'localhost';
  private $username = 'root';
  private $password = 'password';
  private $dbname = 'db_php_projeto';
  private $port = '3306';
  private $stmt;

  public function __construct()
  {
    $dsn = 'mysql:host=' . $this->servername . ';port=' . $this->port . ';dbname=' . $this->dbname;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->dbh = new PDO($dsn, $this->username, $this->password, $options);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  public function query($sql)
  {
    $this->dbh->query($sql);
  }

  public function prepare($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function bindValue($parameter, $value, $type = null)
  {
    if (is_null($type)) :
      switch (true):
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      endswitch;
    endif;

    $this->stmt->bindValue($parameter, $value, $type);
  }

  public function execute()
  {
    return $this->stmt->execute();
  }

  public function fetch()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function fetchAll()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }

  public function lastInsertId()
  {
    return $this->dbh->lastInsertId();
  }
}
