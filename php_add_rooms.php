<?php

include 'db_connection.php';



if(isset($_POST['add']))
{
    
    $hostel_name=$_POST['hostel'];
    $room_num=$_POST['room_number'];
   
    $query="SELECT * FROM hostel WHERE hostel_name='$hostel_name'";
    $query_result=mysqli_query($conn,$query);
    $arr_cat=mysqli_fetch_array($query_result);
    $hostel_id=$arr_cat['h_id'];

    $query_fetch="SELECT * FROM room WHERE room_no='$room_num'";
    $result_fetch=mysqli_query($conn, $query_fetch);
    $count=mysqli_num_rows($result_fetch);

    if($count>0)
    {
        echo '<script  type ="text/JavaScript">'; 
        echo  'alert(" Room number already existed !!")'; 
        echo '</script>';

        echo "<script>window.location.assign('add_rooms.php')</script>";
    }

    else
    {
        //$insert_query="insert into sub_category(wc_id,ws_id,ws_name)values('$main_wid','$hidd_id','$sub_category')";
        $insert_query="insert into room(h_id,hostel_name,room_no)values('$hostel_id','$hostel_name','$room_num')";

        $result_insert=mysqli_query($conn,$insert_query);
        

        echo '<script  type ="text/JavaScript">'; 
        echo 'alert("Room Added !!")'; 
        echo '</script>';

        echo "<script>window.location.assign('crud_room.php')</script>";
    }
      

}
?>