<?php
include 'include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $status = $_POST['status'];

    $sql = "UPDATE tickets SET status='$status' WHERE id=$ticket_id";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
