<?php
include_once '/opt/lampp/htdocs/ticket/template/header.php';
include_once '/opt/lampp/htdocs/ticket/config/database.php';
include_once '/opt/lampp/htdocs/ticket/classes/user.php';
include_once '/opt/lampp/htdocs/ticket/template/message.php';

//make sure you fix the link path in include_once.
$User1 = new User();

$sql = $mysqli->query("select * from Forms")->fetch_all(MYSQLI_ASSOC);

?>

<?php if(isset($_SESSION['logged_in']) == True ){ ?>
<h3>Company Information Technology</h3>
<br>
<?php foreach($sql as $mysql){ ?>
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header"><a class="Link" href="ticket.php?idForm=<?php echo $mysql['idForm']?>"><?php echo $mysql['name'];?></a> </div>
 
     <h5 class="card-title"><?php  echo $mysql['name']; ?></h5>
     <p class="card-text">Logo</p>
  </div>
<?php  } ?>
<?php }else{

  header("location: /ticket/login.php");
  //make sure you fix the link path in header. 

} ?>

<?php
 
 include_once '/opt/lampp/htdocs/ticket/template/footer.php';
//make sure you fix the link path in include_once.

?>