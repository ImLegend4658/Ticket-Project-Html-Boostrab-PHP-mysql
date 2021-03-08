<?php
include_once '/opt/lampp/htdocs/ticket/template/header.php';
include_once '/opt/lampp/htdocs/ticket/config/database.php';

$mysql = $mysqli->query("Select * from Tickits where TickID = ".$_GET['TickID']."")->fetch_all(MYSQLI_ASSOC);

?>
<?php foreach($mysql as $show){ ?>
<div class="card">
  <div class="card-header">
   Ticket number: <?php echo $show['TickID']; ?><br>
   Status: <select class="form-select" aria-label="Disabled select example" disabled> 
   <option value="1"><?php echo $show['status']; ?></option>
 </select><br>
    Title is: <?php echo $show['name_problem'] ?> <br>
    
   </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?php echo $show['Discrip'] ?></p>
          </blockquote>
  </div>
</div>
<?php } ?>

<h2>Please wait until your turn and Thank you</h2>
<h2>I will email you when your turn come</h2>
<br> <hr>
<?php
include_once '/opt/lampp/htdocs/ticket/template/footer.php';

?>