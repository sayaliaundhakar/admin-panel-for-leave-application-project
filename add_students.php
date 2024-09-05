<?php 

    include 'db_connection.php';

    $update_id=$_GET['updateid'];

    $query="select * from students where r_id='$update_id'";
    $result=mysqli_query($conn,$query);
    $record=mysqli_fetch_array($result);
    $uname=$record['username'];
    $pwd=$record['password'];
    $sname=$record['stud_name'];
    $roll=$record['PRN'];
    $trade=$record['branch'];
    $classs=$record['class'];
    $emailid=$record['email'];
    $addr=$record['address'];
    $sc=$record['stud_contact'];
    $pc=$record['parent_contact'];

    if(isset($_POST['add']))
    {

      $unameh=$_POST['username'];
      $pwdh=$_POST['password'];
      $snameh=$_POST['name'];
      $rollh=$_POST['rollno'];
      $tradeh=$_POST['branch'];
      $classsh=$_POST['class'];
      $emailidh=$_POST['email'];
      $addrh=$_POST['address'];
      $sch=$_POST['student_contact'];
      $pch=$_POST['parent_contact'];

      $hostel=$_POST['hostel'];
      $room=$_POST['room_number'];

      //checking already existed hostel in database

      $select_query="SELECT * FROM hostellers WHERE username='$uname'";
      $display=mysqli_query($conn,$select_query);
      $count=mysqli_num_rows($display);

      if($count>0) 
      {
          echo '<script  type ="text/JavaScript">'; 
          echo  'alert("Student is Already Existed !!")'; 
          echo '</script>';

          echo "<script>window.location.assign('add_students.php')</script>";
      }
      else
      { 
          $insert_query="INSERT INTO hostellers(hs_id,username,password,name,roll_no,branch,class,email,address,stud_phone,parent_phone,hostel_name,room_no)VALUES('','$unameh','$pwdh','$snameh','$rollh','$tradeh','$classsh','$emailidh','$addrh','$sch','$pch','$hostel','$room')";
          $result=mysqli_query($conn,$insert_query);

          echo '<script  type ="text/JavaScript">'; 
          echo 'alert("Student Added !!")'; 
          echo '</script>';

          echo "<script>window.location.assign('crud_Hostel.php')</script>";
      }


    }
    
    /*if(isset($_POST['update']))
    {

        $c_name=$_POST['room_number'];

        $update_query="update hostels set hostel_name='$c_name' where h_id='$update_id'";
        $update_result=mysqli_query($conn,$update_query);

        echo "<script>window.location.assign('crud_Hostel.php')</script>";
    }*/
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Registration Form</title>

    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
      }
      .sidebar {
        width: 250px;
        background-color: #333;
        color: #fff;
        padding: 20px;
        height: 100vh;
      }
      .sidebar ul {
        list-style: none;
        padding: 0;
      }
      .sidebar ul li {
        margin-bottom: 10px;
      }
      .sidebar ul li a {
        text-decoration: none;
        color: #fff;
        display: block;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
      }
      .sidebar ul li a:hover {
        background-color: #555;
      }
      .content {
        flex: 2;
        padding: 20px; /* Changed padding to 20px */
      }
      .container {
        max-width: 500px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }
      h2 {
        text-align: center;
        margin-bottom: 20px;
      }
      label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
      }
      input[type="text"],
      input[type="password"],
      input[type="email"],
      select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
      }
      .form-group {
        margin-bottom: 20px;
      }
      .btn-submit {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
        margin-bottom: 20px;
      }
      .btn-submit:hover {
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

    <div class="content">
      <div class="container">
        <h2>Add students details</h2>
        <form action="add_students.php" method="post">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required value="<?php echo $uname?>"/>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required value="<?php echo $pwd?>"/>
          </div>
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo $sname?>"/>
          </div>
          <div class="form-group">
            <label for="rollno">Roll No:</label>
            <input type="text" id="rollno" name="rollno" required value="<?php echo $roll?>"/>
          </div>
          <div class="form-group">
            <label for="branch">Branch:</label>
            <input type="text" id="branch" name="branch" required value="<?php echo $trade?>"/>
          </div>
          <div class="form-group">
            <label for="class">Class:</label>
            <input type="text" id="class" name="class" required value="<?php echo $classs?>"/>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $emailid?>"/>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required value="<?php echo $addr?>"/>
          </div>
          
          <div class="form-group">
            <label for="student_contact">Student Contact No:</label>
            <input
              type="text"
              value="<?php echo $sc?>"
              id="student_contact"
              name="student_contact"
              required
            />
          </div>
          <div class="form-group">
            <label for="parent_contact">Parent Contact No:</label>
            <input
              type="text"
              value="<?php echo $pc?>"
              id="parent_contact"
              name="parent_contact"
              required
            />
          </div>
          <div class="form-group">
            <label for="hostel">Hostel Name:</label>
            <select id="hostel" name="hostel" required>
              <option value="" hidden>Select Hostel</option>
              <option value="Gangotri">Gangotri</option>
              <option value="Fairy">Fairy</option>
              <option value="Esha">Esha</option>
              <option value="Haripriya">Haripriya</option>
              <!-- Add more options as needed -->
            </select>
          </div>
          <div class="form-group">
            <label for="room_number">Room Number:</label>
            <input type="text" id="room_number" name="room_number" required />
          </div>
          <button type="submit" class="btn-submit" name="add">Submit</button>
    
        </form>
      </div>
    </div>
  </body>
</html>
