<?php
include 'include.php';

// Fetch department names from the database
$sql = "SELECT department_name FROM department";
$result = $conn->query($sql);

$departmentNames = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $departmentNames[] = $row;
    }
}

// Return department names as JSON
echo json_encode($departmentNames);
?>
