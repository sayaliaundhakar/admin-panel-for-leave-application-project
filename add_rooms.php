<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Room Management</title>
    
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

.container {
  text-align: center;
  background-color: #fff;
  padding: 120px;
  border-radius: 8px;
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
  margin: auto; /* Center the container horizontally */
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
        <li><a href="#home">Home</a></li>
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

  <?php 
        
        include 'db_connection.php';
        $query="SELECT * FROM hostel";
        $fetch=mysqli_query($conn,$query);

    ?>

    <div class="container">
      <h1>Add Room</h1>
      <form action="php_add_rooms.php" method="post">
        <select name="hostel">
          <option hidden>--Select Hostel--</option>
          <?php
                        while($row=mysqli_fetch_array($fetch))
                        {?>
                                <option><?php echo $row['hostel_name'];?></option>
                        <?php }?></select
        ><br />
        <input
          type="text"
          name="room_number"
          placeholder="Enter Room Number"
          required
        /><br />
        <input type="submit" value="Add" name="add"/>
      </form>
    </div>
  </body>
</html>
