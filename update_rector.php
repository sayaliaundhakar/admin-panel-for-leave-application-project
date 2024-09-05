<?php 

    include 'db_connection.php';

    $update_id=$_GET['updateid'];

    $query="select * from rector where hr_id='$update_id'";
    $result=mysqli_query($conn,$query);
    $record=mysqli_fetch_array($result);

    $sname=$record['name'];
    $uname=$record['username'];
    $pwd=$record['password'];
    $addr=$record['address'];
    $sc=$record['contact_no'];
    $hname=$record['type_of_hostel'];
    
    
    if(isset($_POST['update']))
    {
        $snameu=$record['name'];
        $unameu=$record['email'];
        $pwdu=$record['password'];
        $addru=$record['address'];
        $scu=$record['contact'];
        $hnameu=$record['hostel'];

        $update_query="update rector set name='$snameu', username='$unameu', password='$pwdu' ,address='$addru', contact_no='$scu', type_of_hostel='$hnameu' where hr_id='$update_id'";
        $update_result=mysqli_query($conn,$update_query);

        echo "<script>window.location.assign('crud_Rector.php')</script>";
    }
    
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
        <h2>Update Rector details</h2>
        <form action="update_rector.php" method="post">
          <div class="form-group">
            <label for="username">Name:</label>
            <input type="text" id="username" name="name" required value="<?php echo $sname?>"/>
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required  value="<?php echo $uname?>"/>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required value="<?php echo $pwd?>" />
          </div>
          
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required value="<?php echo $addr?>"/>
          </div>
          
          <div class="form-group">
            <label for="student_contact">Contact No:</label>
            <input
              type="text"
            value="<?php echo $sc?>"
              id="student_contact"
              name="contact"
              required
            />
          </div>
          <div class="form-group">
            <label for="hostel">Type of Hostel</label>
            <select id="hostel" name="hostel" required>
              <option value="" hidden><?php echo $hname?>"</option>
              <option value="Girls">Girls</option>
              <option value="Boys">Boys</option>
            </select>
          </div>
          <button type="submit" class="btn-submit" name="update">Submit</button>
    
        </form>
      </div>
    </div>
    
  </body>
</html>
