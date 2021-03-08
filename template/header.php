<?php
session_start();

/*
Author: Abdulaziz Aldawk
purpose: Ticket IT support on companies project.
Date: 3/8/2021
Summery: 
This ticket website and takes ticket from employee and admin or 
IT support team takes order. 
On this website has session for each user 
which is that each user has own ticket.

Can you use it for study purpose? yes and it's free for study only.
*/

 include_once '/opt/lampp/htdocs/ticket/classes/user.php';

$user1 = new User();
error_reporting(E_ALL);
ini_set('display_errors',1);


?>
<!DOCTYPE html>
<!-- <html dir="<?php echo $config['dir'] ?>" lang="<?php echo $config['lang'] ?>" > -->
<head>
    <!-- <title><?php echo $config['app_name']."/". $title ?></title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="UTF-8">
    <style>
    footer{
        
        position: relative;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
          
    }
  
    .sidBar{
        width: 200px;
    }

    .Link{
        color: black;
    }

    </style>
</head>
 <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <!-- <a class="navbar-brand" href="<?php echo $config['app_url'] ?>"><?php echo $config['app_name'] ?></a> -->
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
             <li class="nav-item active">
                 <a class="nav-link" href="/ticket/index.php">Home <span class="sr-only">(current)</span></a>
             </li>
             <?php if(isset($_SESSION['logged_in']) == True ){ ?>
             <?php//if user logged in, they can see the content. ?>
             <li class="nav-item">
                 <a class="nav-link" href="/ticket/ViewTicket.php">View My Tickets.</a>
             </li>
             <?php if(($user1->isSuperAdviser()) || ($user1->isAdmin())){  ?>
             <li class="nav-item">
                 <a class="nav-link" href="#">Admin Page</a>
             </li>
             <?php } ?>
                <?php }else{
                    
                } ?>
         </ul>
       

         <ul class="navbar-nav ml-auto">
             <!-- <?php if(!isset($_SESSION['logged_in'])): ?> -->
             <li class="nav-item">
                 <a class="nav-link" href="/ticket/login.php">Login</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Demo company</a>
             </li>
             
             <?php else: ?>
             <li class="nav-item">
                 <!-- <a href="#" class="nav-link"><?php echo $_SESSION['user_name'] ?></a> -->
             </li>
                 <li class="nav-item">
                     <a class="nav-link" href="/ticket/logout.php">LogOut</a>
                 </li>
             <?php endif ?>
              
         </ul>
     </div>
 </nav>
 <div class="container pt-5">
<?php include "message.php"; ?>