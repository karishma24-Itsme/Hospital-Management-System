<?php
session_start();
include("func.php");   

if(isset($_POST['register_submit']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password != $cpassword)
    {
        echo "<script>alert('Password and Confirm Password do not match!');</script>";
    }
    else
    {
        $query = "INSERT INTO patreg(fname,lname,gender,email,contact,password,cpassword)
                  VALUES('$fname','$lname','$gender','$email','$contact','$password','$cpassword')";

        $result = mysqli_query($con,$query);

        if($result)
        {
            $pid = mysqli_insert_id($con);

            $_SESSION['pid'] = $pid;
            $_SESSION['pname'] = $fname." ".$lname;

            header("Location: success.php");
            exit();
        }
        else
        {
            echo "<script>alert('Registration Failed! Please try again.');</script>";
        }
    }
}
?>
