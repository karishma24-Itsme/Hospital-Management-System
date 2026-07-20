<?php
session_start();
$con = mysqli_connect("localhost","root","","myhms","3306");

if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

if(!isset($_SESSION['pid'])){
    header("Location: register_new.php");
    exit();
}

$pid = $_SESSION['pid'];
$pname = $_SESSION['pname'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Successful</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family: Arial, sans-serif;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color:white;
        }

        .card{
            width:520px;
            padding:35px;
            border-radius:15px;
            text-align:center;
            background: rgba(255,255,255,0.10);
            box-shadow: 0px 0px 30px rgba(0,0,0,0.5);
        }

        h1{
            margin-bottom:10px;
            font-size:32px;
        }

        p{
            font-size:16px;
            margin:10px 0;
        }

        .userid{
            font-size:20px;
            font-weight:bold;
            color:#00ffcc;
        }

        .btn{
            display:inline-block;
            margin-top:20px;
            padding:12px 28px;
            background:#00bcd4;
            color:white;
            text-decoration:none;
            font-size:18px;
            border-radius:10px;
            transition:0.3s;
        }

        .btn:hover{
            background:#0097a7;
        }

        .smalltext{
            font-size:14px;
            opacity:0.9;
            margin-top:15px;
        }
    </style>
</head>

<body>

<div class="card">
    <h1> Registration Successful!</h1>

    <p>Hello <b><?php echo $pname; ?></b></p>
    <p>Your registration has been successfully completed.</p>

    <p>You can now login using your User ID:</p>
    <p class="userid">User ID: <?php echo $pid; ?></p>

 
    <a class="btn" href="index1.php">Login Now ➜</a>

    <p class="smalltext">Thank you for registering in our Hospital Management System.</p>
</div>

</body>
</html>

<?php

unset($_SESSION['pid']);
unset($_SESSION['pname']);
?>