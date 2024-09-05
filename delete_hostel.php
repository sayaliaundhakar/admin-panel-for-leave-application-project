<?php 
    
    include 'db_connection.php';

    if(isset($_GET['deleteid']))
    {

        $id=$_GET['deleteid'];

        $query="delete from hostel where h_id='$id'";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            /*echo '<script  type ="text/JavaScript">'; 
            echo 'alert("Product Category Deleted !!")'; 
            echo '</script>';*/

            echo "<script>window.location.assign('crud_Hostel.php')</script>";
        }

    }


?>