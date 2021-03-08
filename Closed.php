<?php 
include_once '/opt/lampp/htdocs/ticket/template/header.php';
include_once '/opt/lampp/htdocs/ticket/config/database.php';

$mysql = $mysqli->query("Select * from Tickits where status = 'Closed' ORDER BY TickID DESC")->fetch_all(MYSQLI_ASSOC);


?>
  <div class="sidBar">
  <a href="/ticket/Open.php" class="w3-bar-item w3-button w3-hover-black">Open Ticket</a><br>
  <a href="/ticket/OnHold.php" class="w3-bar-item w3-button w3-hover-green">On Hold Ticket</a>
  <br>
  <a href="/ticket/Closed.php" class="w3-bar-item w3-button w3-hover-blue">Completed - Closed</a>
</div> 

<?php foreach($mysql as $SQL) { ?>
  <?php if($_SESSION['user_id'] == $SQL['UserID']) {?>
<br>
<div class="card text-center">
  <div class="card-header">
    #<?php echo $SQL['TickID']; ?>
    <br>
    <?php echo $SQL['name_problem']; ?>
    <br>
    Status: <select class="form-select" aria-label="Disabled select example" disabled> 
   <option value="1"><?php echo $SQL['status']; ?></option>
 </select><br>
  </div>
  <div class="card-body">
    <h5 class="card-title">Summary: </h5>
    <p class="card-text"><?php echo $SQL['Discrip'] ?></p>
    <a href="/ticket/Display.php?TickID=<?php echo $SQL['TickID'];?>" class="btn btn-primary">Click here :D</a>
  </div>
  <div class="card-footer text-muted">
  <?php echo $SQL['Create_AT'] ?>
  </div>
</div>
<br>

<?php } ?>
<?php } ?>
<?php

include_once '/opt/lampp/htdocs/ticket/template/footer.php';
?>
