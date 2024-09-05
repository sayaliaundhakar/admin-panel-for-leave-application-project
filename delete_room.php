<?php 
    
    include 'db_connection.php';

    if(isset($_GET['deleteid']))
    {

        $id=$_GET['deleteid'];

        $query="delete from rooms where r_id='$id'";
        $result=mysqli_query($conn,$query);

        if($result)
        {
            echo "<script>window.location.assign('crud_room.php')</script>";
        }

    }


?>