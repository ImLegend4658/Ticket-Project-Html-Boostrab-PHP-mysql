<?php 
include_once '/opt/lampp/htdocs/ticket/template/header.php';
include_once '/opt/lampp/htdocs/ticket/config/database.php';
include_once '/opt/lampp/htdocs/ticket/classes/user.php';

if(isset($_SESSION['logged_in'])){
    header('location: ticket/index.php');
}

$errors = [];

$email = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $email = htmlspecialchars($email);
     $password = mysqli_real_escape_string($mysqli, $_POST['password']);
 $password = htmlspecialchars($password);
     if(empty($email)){
         array_push($errors, "Email is required");
     }
 
     if(empty($password)){
         array_push($errors, "Password is required");
     }  

     if(!count($errors)){
        $userExsits = $mysqli->query("select UserID, names, email, Password, job, locations, roles, creat_AT from Users where email='$email' LIMIT 1");
            if(!$userExsits->num_rows){
              array_push( $errors,"your email, $email is not exsist");
            }else{
            $foundUser = $userExsits->fetch_assoc();
            if(password_verify($password, $foundUser['Password'])){
                //login
                $_SESSION['logged_in'] = True;
                $_SESSION['user_id'] = $foundUser['UserID'];
                $_SESSION['user_name']= $foundUser['names'];
                $_SESSION['user_role'] = $foundUser['roles'];
                $_SESSION['success_message'] = "Welcome back. Dear: " .$foundUser['names'] ." Role:". $foundUser['roles'];
                // if($foundUser['role'] == 'admin'){
                //     header('location: Admin');

                // }else{
                    header('location: /ticket/index.php');

                // }

            }
    }}
}
?>

<div class="logcss">
    <div id="login" >
        <h4>Welcome BACK :D</h4>
        <h5 class="text-info">Please fill in the form below to login</h5>
        <hr>
     <?php include_once __DIR__. '/template/errors.php'; ?>

        <form action="" method="post" >
            <div class="form-group">
                <label for="name">user name</label><br>
                <input type="text" name="email" placeholder="Your email" id="email">
            </div>

            <div class="form-group">
                <label for="password">your password</label><br>
                <input type="password" name="password" placeholder="Your password" id="password">
            </div>

            <div class="form-group">
                <button class="btn btn-success">Login!</button>
             </div>
        </form>
    </div>



</div>  
<?php
include_once '/opt/lampp/htdocs/ticket/template/footer.php';
?>