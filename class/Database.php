<?php
// izveido savienojuma clasi
include("/../inc/config.php");

class Database{

// define mainīgos
  public $con;

// define pieslegsanas funkciju
  function __construct(){
    $this->con = new Mysqli(DB_HOST, DB_USER, DB_PW, DB_DB);
    if ($this->con->connect_errno)
    {
      die("Database connection failed");
    } else {
      $this->con->set_charset('utf8');
    }
  }

// atspogulo databazi
  public function query($sql){
    $result = $this->con->query($sql);
    return $result;
  }

  public function sanitize($data){
    $s = $this->con->real_escape_string($data);
    return $s;
  }
}

$con = new Database();
