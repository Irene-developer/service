<?php
// Include database connection
include 'include.php';

// Check if the necessary data is received via POST request
if(isset($_POST['department_id'], $_POST['department_name'])) {
    // Sanitize the received data
    $department_id = $_POST['department_id'];
    $department_name = $_POST['department_name'];

    // Validate the department ID
    if(!empty($department_id) && is_numeric($department_id)) {
        // Prepare SQL UPDATE query to update the department details
        $sql = "UPDATE department SET 
                department_name = ? 
                WHERE department_id = ?";

        // Prepare the statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind the parameters
            $stmt->bind_param("si", $department_name, $department_id);

            // Execute the query
            if ($stmt->execute()) {
                // Provide success message
                echo "Department updated successfully";
            } else {
                // Provide error message
                echo "Error updating department: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            // Provide error message
            echo "Error preparing the query: " . $conn->error;
        }
    } else {
        // Provide error message for invalid department ID
        echo "Invalid department ID";
    }
} else {
    // Provide error message if necessary data is not received
    echo "Required data not provided";
}

// Close database connection
$conn->close();
?>









<?php
/* Include database connection
include 'include.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $departmentId = $_POST['department_id'];
    $departmentName = $_POST['department_name'];
    $subDepartment = $_POST['sub_department'];
    $headOfSubdepartment = $_POST['head_of_subdepartment'];
    $headOfDepartment = $_POST['head_of_department'];

    // Prepare and bind SQL statement with prepared statements for security
    $sql = "UPDATE department SET department_name=?, sub_department=?, Head_of_subdepartment=?, Head_of_department=? WHERE department_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $departmentName, $subDepartment, $headOfSubdepartment, $headOfDepartment, $departmentId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}*/
?>

