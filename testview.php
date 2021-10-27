<?php

error_reporting(E_ALL);
if(isset($_POST['submit'])){
  $topic_id = $_POST['topic_id'];
  $name = $_POST['name'];
};
include("inc/class.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <!-- lapas nosaukums -->
  <title>Tests</title>
  <link rel="stylesheet" type="text/css" href="style.css">   <!-- css fails -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    <!-- ieklauj bootstrap4 -->
  <link href="https://fonts.googleapis.com/css?family=Archivo" rel="stylesheet">         <!-- pievieno fontu -->
</head>

<body class="justify-content-center">
<div class="container col-12" id="main">
  <div class="container-fluid mt-4 d-none col-lg-9 col-md-10 col-sm-12" style="text-align: center;" id="form">
    <div class="row">
      <div class="col-md-6 offset-md-3 col-sm-12">
        <h1><?php echo $t->getTopicName($topic_id); ?></h1>
        <h4> Questions Total = <?php echo $q->countQuestions($topic_id) ?></h4>
        <?php echo $q->getAllQuestions($topic_id);?>
      </div>


      <!-- PROGRESS BAR -->
      <div class="col-lg-6 offset-lg-3">
        <div class="progress  " style="height: 10px"  >
          <div class="progress-bar progress-bar-striped bg-success text-center center-block my-progress-bar" id="my-progress-bar" role="progressbar" aria-voluemin="0" aria-voluemax="100" style="width: 0%"></div>
        </div>
      </div>
      <br />


      <div class="col-md-4 offset-md-4 col-sm-8 offset-sm-2">
        <form method="post" action="final.php" class="end-test-form">
          <input type="hidden" name="name" class="input_name">
          <input type="hidden" name="topic_id" class="input_topic_id">
          <input type="hidden" name="uid" class="input_uid">
          <button type="submit" class="btn btn-secondary btn-lg btn-block next-question-btn final-button" name="submit" id="button">Nākamais jautājums</button>
        </form>
      </div>
    </div>
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
  var topic_id = <?php echo $topic_id; ?>;
  var unique_id = <?php echo $s->recordSummary($name, $topic_id, 0); ?>;
</script>


</body>
</html>
