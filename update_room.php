<?php 

    include 'db_connection.php';

    $update_id=$_GET['updateid'];

    $query="select * from room where r_id='$update_id'";
    $result=mysqli_query($conn,$query);
    $record=mysqli_fetch_array($result);
    $ca_name=$record['hostel_name'];
    $sub_name=$record['room_no'];

    
    if(isset($_POST['update']))
    {

        $c_name=$_POST['hostel'];
        $s_name=$_POST['room_number'];

        $update_query="update room set hostel_name='$c_name',room_no='$s_name' where r_id='$update_id'";
        $update_result=mysqli_query($conn,$update_query);
        echo "<script>window.location.assign('crud_room.php')</script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cb76555458.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    

    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .container {
        text-align: center;
        background-color: #fff;
        padding: 120px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
      }
      h2 {
        font-size: 24px;
        margin-bottom: 30px;
      }
      select {
        width: 400px;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 20px;
      }
      input[type="text"] {
        width: 400px;
        padding: 15px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        font-size: 20px;
      }
      input[type="text"]::placeholder {
        color: #999;
      }
      input[type="submit"] {
        padding: 15px 30px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 20px;
        transition: background-color 0.3s ease;
      }
      input[type="submit"]:hover {
        background-color: #0056b3;
      }
    </style>
</head>
<body>

<div class="sidebar">
      <ul>
        <li><a href="Dashboard.html">Home</a></li>
        <li><a href="add_Rectordetails.php">Add Rector details</a></li>
        <li><a href="crud_Rector.php">View Rector details</a></li>
        <li><a href="registration_request.php">Registration requests</a></li>
        <li><a href="crud_students.php">Students list</a></li>
        <li><a href="add_hostel.html">Add hostel </a></li>
        <li><a href="add_rooms.php">Add rooms</a></li>
        <li><a href="crud_Hostel.php">view hostel details</a></li>
        <li><a href="crud_room.php">view rooms</a></li>
      </ul>
    </div>
    

<div class="container">
      <h1>Update Room Details</h1>
      <form action="update_room.php" method="post">
        
        <input
          type="text"
          name="hostel"
          value="<?php echo $ca_name?>"
        /><br />
        <input
          type="text"
          name="room_number"
          value="<?php echo $sub_name ?>"
        /><br/>
        <input type="submit" value="Update" name="update"/>
      </form>
    </div>


    
</body>
</html>

