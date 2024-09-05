<?php

include 'db_connection.php';


if(isset($_POST['add']))
{
    $hostel_name=$_POST['hostel'];

    //checking already existed hostel in database

    $select_query="SELECT * FROM hostel WHERE hostel_name='$hostel_name'";
    $display=mysqli_query($conn,$select_query);
    $count=mysqli_num_rows($display);

    if($count>0) 
    {
        echo '<script  type ="text/JavaScript">'; 
        echo  'alert("Hostel is Already Existed !!")'; 
        echo '</script>';

        echo "<script>window.location.assign('add_hostel.html')</script>";
    }
    else
    {
        //inserting hostel names 
        $insert_query="INSERT INTO hostel(h_id,hostel_name) VALUES('','$hostel_name')";
        $result=mysqli_query($conn,$insert_query);

        echo '<script  type ="text/JavaScript">'; 
        echo 'alert("Hostel Added !!")'; 
        echo '</script>';

        echo "<script>window.location.assign('crud_Hostel.php')</script>";
    }
   

}
?>