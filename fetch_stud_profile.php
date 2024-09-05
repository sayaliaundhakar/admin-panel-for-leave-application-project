<?php
include 'db_connection.php';

header('Content-Type: application/json');

$response = array();

// Read and decode the input JSON data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Check if the request method is POST and data is present
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data['userid'])) {
    $username = $data['userid'];

    // Prepare SQL query
    $stmt = $conn->prepare("SELECT name, roll_no, branch, class, email, address, stud_phone, parent_phone, hostel_name, room_no FROM hostellers WHERE username = ?");
    if ($stmt === false) {
        // Prepare failed
        $response['error'] = true;
        $response['message'] = 'Prepare failed: ' . $conn->error;
        echo json_encode($response);
        exit;
    }

    // Bind parameters
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Fetch data and encode as JSON
            $row = $result->fetch_assoc();
            $response = array(
                'error' => false,
                'name' => $row['name'],
                'roll_no' => $row['roll_no'],
                'branch' => $row['branch'],
                'class' => $row['class'],
                'address' => $row['address'],
                'email' => $row['email'],
                'parent_phone' => $row['parent_phone'],
                'stud_phone' => $row['stud_phone'],
                'hostel_name' => $row['hostel_name'],
                'room_no' => $row['room_no']
            );
        } else {
            // User not found
            $response['error'] = true;
            $response['message'] = 'User not found';
        }
    } else {
        // SQL execution error
        $response['error'] = true;
        $response['message'] = 'SQL execution error';
    }

    $stmt->close();
} else {
    // Missing parameters or invalid request
    $response['error'] = true;
    $response['message'] = 'Invalid Request or missing parameters';
}

$conn->close();
echo json_encode($response);
?>
