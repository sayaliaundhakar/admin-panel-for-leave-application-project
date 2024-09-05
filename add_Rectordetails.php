<?php 

    include 'db_connection.php';

    if(isset($_POST['add']))
    {

        $snameh=$_POST['name'];
        $emailidh=$_POST['email'];
      $pwdh=$_POST['password'];
      $addrh=$_POST['address'];
      $sch=$_POST['contact'];
      $hostel=$_POST['hostel'];
     

      //checking already existed hostel in database

      $select_query="SELECT * FROM rector WHERE username='$emailidh'";
      $display=mysqli_query($conn,$select_query);
      $count=mysqli_num_rows($display);

      if($count>0) 
      {
          echo '<script  type ="text/JavaScript">'; 
          echo  'alert("Rector details are Already Exist !!")'; 
          echo '</script>';

          echo "<script>window.location.assign('add_Rectordetails.php')</script>";
      }
      else
      { 
          $insert_query="INSERT INTO rector(hr_id,name,username,password,address,contact_no,type_of_hostel)VALUES('','$snameh','$emailidh','$pwdh','$addrh','$sch','$hostel')";
          $result=mysqli_query($conn,$insert_query);

          echo '<script  type ="text/JavaScript">'; 
          echo 'alert("Rectors details Added !!")'; 
          echo '</script>';

          echo "<script>window.location.assign('crud_Rector.php')</script>";
      }


    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rector Details</title>

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
        <form action="add_Rectordetails.php" method="post">
          <div class="form-group">
            <label for="username">Name:</label>
            <input type="text" id="username" name="name" required />
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required/>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
          </div>
          
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required />
          </div>
          
          <div class="form-group">
            <label for="student_contact">Contact No:</label>
            <input
              type="text"

              id="student_contact"
              name="contact"
              required
            />
          </div>
          <div class="form-group">
            <label for="hostel">Type of Hostel</label>
            <select id="hostel" name="hostel" required>
              <option value="" hidden>Select Hostel</option>
              <option value="Girls">Girls</option>
              <option value="Boys">Boys</option>
            </select>
          </div>
          <button type="submit" class="btn-submit" name="add">Submit</button>
    
        </form>
      </div>
    </div>
  </body>
</html>
