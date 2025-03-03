<?php
include 'db_connection.php';

header('Content-Type: application/json');

$response = array();

file_put_contents('php_debug.log', print_r($_POST, true));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve data from POST request
    $unameh = isset($_POST['uname']) ? $_POST['uname'] : '';
    $pwdh = isset($_POST['passwd']) ? $_POST['passwd'] : '';
    $snameh = isset($_POST['studentName']) ? $_POST['studentName'] : '';
    $rollh = isset($_POST['prn']) ? (int)$_POST['prn'] : 0;
    $tradeh = isset($_POST['branch']) ? $_POST['branch'] : '';
    $classsh = isset($_POST['sclass']) ? $_POST['sclass'] : '';
    $emailidh = isset($_POST['email']) ? $_POST['email'] : '';
    $addrh = isset($_POST['address']) ? $_POST['address'] : '';
    $sch = isset($_POST['studentContact']) ? (int)$_POST['studentContact'] : 0;
    $pch = isset($_POST['parentContact']) ? (int)$_POST['parentContact'] : 0;

    // Validate data
    if (empty($unameh) || empty($pwdh) || empty($snameh) || empty($rollh) || empty($tradeh) || empty($classsh) || empty($emailidh) || empty($addrh) || empty($sch) || empty($pch)) {
        $response['error'] = true;
        $response['message'] = "All fields are required!";
    } else {
        // Check if user already exists
        $select_query = "SELECT * FROM students WHERE username='$unameh'";
        $display = mysqli_query($conn, $select_query);
        
        if (!$display) {
            $response['error'] = true;
            $response['message'] = "Error in SQL query: " . mysqli_error($conn);
            echo json_encode($response);
            exit();
        }
        
        $count = mysqli_num_rows($display);

        if ($count > 0) {
            $response['error'] = true;
            $response['message'] = "Student is already registered!";
        } else {
            // Insert data into database
            $insert_query = "INSERT INTO students(r_id,username, password, stud_name, PRN, branch, class, email, address, stud_contact, parent_contact) VALUES('', '$unameh', '$pwdh', '$snameh', '$rollh', '$tradeh', '$classsh', '$emailidh', '$addrh', '$sch', '$pch')";
            $result = mysqli_query($conn, $insert_query);

            if ($result) {
                $response['error'] = false;
                $response['message'] = "Student added successfully!";
            } else {
                $response['error'] = true;
                $response['message'] = "Failed to add student! Error: " . mysqli_error($conn);
            }
        }
    }
} else {
    $response['error'] = true;
    $response['message'] = "Invalid Request!";
}

echo json_encode($response);
?>