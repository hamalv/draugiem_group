<?php

error_reporting(E_ALL); // attelo visus errorus

// ieklauj OOP failus
include("/inc/class.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Tests</title>       <!-- lapas nosaukums -->
  <link rel="stylesheet" type="text/css" href="style.css">   <!-- css fails -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    <!-- ieklauj bootstrap4 -->
  <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">         <!-- pievieno fontu -->
</head>
<body>
<div class="container col-12" id="main">


<div class="container-fluid col-lg-7 col-md-9 col-sm-10 mt-4" style="text-align: center;" id="form"> <!-- form container -->
  <h2 class="p-5 mb-3" id=""><strong>Testi brīvam brīdim</strong></h2>
  <p>Lai pildītu testu Jums ir:<br />1. Jāievada vārds<br />2. Jāizvēlās tēma</p>
  <br />
  <form method="post" action="testview.php" name="formInput" style="">    <!-- form -->
    <div class="form-group">
      <input class="form-control user_name" type="text" name="name" placeholder="Vārds">    <!-- input name -->
    </div>
    <div class="form-group">
      <select class="form-control" name="topic_id" id="test">
        <?php echo $t->getAllTopics(); ?>

      </select>
    </div>

    <div class="form-group">
      <input type="submit" name="submit" value="Pildīt testu" class="btn btn-default btn-block topic-btn" id="button">
    </div>
  </form>
</div>
<footer class="page-footer font-small py-3">
  <div class="footer-copyright text-center">
    Page created by <strong>Jānis Freibergs</strong>
  </div>
</footer>
</div>
<!-- <script src="js/js.js" type="text/javascript"></script>    -->
<!-- pievieno JS failu -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
