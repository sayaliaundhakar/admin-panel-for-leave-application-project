<?php 
    
    include 'db_connection.php';

    if(isset($_GET['deleteid']))
    {

        $id=$_GET['deleteid'];

        $query="delete from hostellers where hs_id='$id'";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            echo "<script>window.location.assign('crud_students.php')</script>";
        }

    }


?>