<?php

error_reporting(E_ALL);
include("inc/class.php");
if(isset($_POST['submit'])){
  $topic_id = $_POST['topic_id'];
  $name = $_POST['name'];
  $uid = $_POST['uid'];

  $correct_answer_count = $ua->countCorrectAnswers($name, $topic_id);
  $summary = $s->updateSummary($uid, $correct_answer_count);

  $return_message = "Jūsu rezultāti nav saglabāti!";
  if($summary){
    $return_message = "Jūsu rezultāti ir saglabāti!";
  }
}


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

<body class="justify-content-center">
<div class="container col-12" id="main">
  <div class="container-fluid mt-4 d-none  col-lg-9 col-md-10 col-sm-12" style="text-align: center;" id="form">
    <div class="row">
      <div class="col-md-8 offset-md-2 col-sm-12">

        <h2>Paldies <?php echo $name; ?>, ka piedalījies testā!</h2>
        <br />
        <h4><?php echo $return_message; ?></h4>
        <br />
        <h6>Jūsu tēma bija - <?php echo $t->getTopicName($topic_id); ?> <br>
          Jūsu rezultāts ir: <?php echo $correct_answer_count;?></h6>
          <br />
        <h6>No <strong><?php echo $q->countQuestions($topic_id); ?></strong> jautājumiem pareizi tika atbildēti <strong><?php echo $correct_answer_count;?></strong></h6>
        <br />
      </div>
    </div>
    <a class="btn btn-secondary" href="index.php" id="button">Pildīt jaunu testu</a>
  </div>
  <footer class="page-footer font-small py-3">
    <div class="footer-copyright text-center">
      Page created by <strong>Jānis Freibergs</strong>
    </div>
  </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript">
  var total_question = <?php echo $q->countQuestions($topic_id); ?>;
  var name = "<?php echo $con->sanitize($name); ?>";
</script>

</body>
</html>
