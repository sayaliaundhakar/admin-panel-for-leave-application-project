<?php 

    if(isset($_POST['login']))
    {
        $user=$_POST['username'];
        $pwd=$_POST['password'];

        if($user=="admin@gmail.com" && $pwd=="admin@123")
        {
            echo "<script>window.location.assign('Dashboard.html')</script>";
        }
        else
        {
            echo '<script  type ="text/JavaScript">'; 
            echo 'alert("Invalid login attempt !!")'; 
            echo '</script>';
            echo "<script>window.location.assign('Dashboard.html')</script>";
        }
    }

    

?>