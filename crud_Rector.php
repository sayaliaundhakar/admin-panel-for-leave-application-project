<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="dashboard.css" />
</head>
<body>

<div class="sidebar">
      <ul>
        <li><a href="Dashboard.html">Home</a></li>
        <li><a href="add_Rectordetails.php">Add Rector details</a></li>
        <li><a href="crud_Rector.php">View Rector details</a></li>
        <li><a href="registration_request.php">Registration list</a></li>
        <li><a href="crud_students.php">Students list</a></li>
        <li><a href="add_hostel.html">Add hostel </a></li>
        <li><a href="add_rooms.php">Add rooms</a></li>
        <li><a href="crud_Hostel.php">view hostel details</a></li>
        <li><a href="crud_room.php">view rooms</a></li>
      </ul>
    </div>
<div class="container">
    <div class="col-lg-12">
    <br><br>
        <h1 class="text-warning text-center" id="h"> Rector Details</h1>
        <br>
        <table  id="tabledata" class=" table table-striped table-hover table-bordered">
            <thread>
                <tr class="bg-dark text-white text-center">

                    <th> <h3>Sr.No.</h3> </th>
                    <th><h3> Name</h3> </th>
                    <th><h3>email</h3> </th>
                    <th><h3>password</h3> </th>
                    <th><h3>address</h3> </th>
                    <th><h3>contact_no</h3> </th>
                    <th><h3>type_of_hostel</h3> </th>
                    <th colspan="1"><h3> Operation</h3> </th>

                </tr>
            </thread>

            <tbody>

            <?php 
                include 'db_connection.php';

                $select_query="select * from rector";
                $result=mysqli_query($conn,$select_query);

                $nums=mysqli_num_rows($result);
                //echo $nums;

                //echo $table[1];
                $sr=1;
                while($table=mysqli_fetch_array($result))
                {
                    $id=$table['hr_id'];
                    $s_name=$table['name'];
                    $uname=$table['username'];
                    $pwd=$table['password'];
                    $adrs=$table['address'];
                    $scno=$table['contact_no'];               
                    $hname=$table['type_of_hostel'];
                 


                    echo '
                    <tr>
                    <center><td><h4>'.$sr.'</h4></td></center>
                    <td><center><h4>' .$s_name.'</h4></center></td>
                    <td><center><h4>'.$uname.'</h4></center></td>
                    <td><center><h4>'.$pwd.'</h4></center></td>
                    <td><center><h4>' .$adrs.'</h4></center></td>
                    <td><center><h4>' .$scno.'</h4></center></td>           
                    <td><center><h4>' .$hname.'</h4></center></td>
                   
                    <td><center><h4><button class="btn btn-primary"><a href="update_rector.php? updateid='.$id.'" class="text-light">Update</a></button>
                    <button class="btn btn-danger"><a href="delete_rector.php? deleteid='.$id.'" class="text-light">Delete</a></button>
                    
                    </tr>
                    
                    ';
                    $sr++;

                    
                }


            ?>
            </tbody>

        </table>
    </div>
</div>
</body>
</html>