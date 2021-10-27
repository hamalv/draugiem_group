<?php

 class Topic{
   public $con;

   function __construct(Database $con)
   {
     $this->con = $con;
   }
   public function getAllTopics(){
    $sql = "SELECT * FROM topics";
    $result = $this->con->query($sql);
    if(!$result){
      return "Datubaze nav tēmu";
    }
    else{
      $topics = "<option selected disabled hidden>Izvēlieties tēmu</option>";
      while ($row = $result->fetch_assoc()) {
        $topics .= "<option value='" . $row['id'] ."'>" . $row['topic'] . "</option>";
      }
      return $topics;
    }
   }

  public function getTopicName($topic_id){
    $sql = "SELECT topic FROM topics WHERE topics.id = $topic_id";
    $result = $this->con->query($sql);
    if (!$result) {
      return "Šādas tēmas nepastāv";
    }
    else {
      $row = $result->fetch_assoc();
      $row = $row['topic'];
      return $row;
    }
  }
 }
 $t = new Topic($con);
