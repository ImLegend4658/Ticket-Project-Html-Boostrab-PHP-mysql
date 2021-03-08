<?php

include_once '/opt/lampp/htdocs/ticket/template/header.php';
include_once '/opt/lampp/htdocs/ticket/config/database.php';

$errors = [];
$title1 = '';
$issue = $idform = $IDTick = $IdUser = '';
$mysql = $mysqli->query("Select * from Tickits")->fetch_all(MYSQLI_ASSOC);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // $f = $mysqli->query("select * from Forms");
     $idform = $_GET['idForm'];
     $IdUser =  $_SESSION['user_id'];
      
    //it could be vulnarable here, make sure and test it.
     $title1 = mysqli_real_escape_string($mysqli, $_POST['name_problem']);
    $issue = mysqli_real_escape_string($mysqli, $_POST['Discrip']);
    $affect = mysqli_real_escape_string($mysqli, $_POST['Affect']);
    $statu = mysqli_real_escape_string($mysqli, $_POST['status']);

    if(empty($title1)){
        array_push($errors, "Please fill out the title");
    }

    if(empty($issue)){
        array_push($errors, "Please fill out the message.");
    }
    if(empty($affect)){
        array_push($errors, "Select the menu yes or no");
    } 
    
    if(empty($statu)){
        array_push($errors, "select is importent and how is importent to you!");
    } 
    
    if(!count($errors)){
    $sql = "Insert into Tickits(name_problem, Discrip, Affect, Importent,UserID, idForm) values('$title1','$issue','$affect','$statu', '$IdUser', '$idform')";
    $mysqli->query($sql);
    // header("location: /ticket/Display.php?TickID=TickID");
    foreach($mysql as $SQL) {
    header("location: /ticket/Display.php?TickID=".$SQL['TickID']+1);
    }
 }else{
    array_push($errors,"");
}
  }

?>

<div id="register" >
    <h4>Welcome to our website</h4>
    <h5 class="text-info">Please fill in the form below to make a new ticket</h5>
<hr>
    <?php include 'template/errors.php'?>
<form action="" method="post">
<input type="hidden" name="id" value="" disabled >
    <div class="form-group">
        <label for="Title">Title:</label>
        <input type="issue" name="name_problem" class="form-control" placeholder="Your issue" id="issue"value="">
    </div>

    <div class="form-group">
        <label for="issues">Write your Issue here:</label>
        <textarea type="text" name="Discrip" class="form-control" placeholder="Your name" id="issues" value=""></textarea>
    </div>

    <div class="form-group">
    <label for="affect" >Does affect your job? (yes or no)</label>
    <select class="form-select" aria-label="Disabled select example" name="Affect">
  <option selected> </option>
  <option value="1">YES</option>
  <option value="2">NO</option>
</select>
    </div>

    <div class="form-group">
    <label for="Importent">Importent?</label>
    <select class="form-select" aria-label="Disabled select example" name="status"> 
  <option selected> </option>
  <option value="1">Low</option>
  <option value="2">Mid</option>
  <option value="3">Hight</option>
</select>
    </div>
    <div class="form-group">
        <button class="btn btn-success" name="Submit">Submit!</button>
    </div>
</form>
</div>

<?php 

 ?>
<?php
include_once '/opt/lampp/htdocs/ticket/template/footer.php';
?>