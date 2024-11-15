<?php 
session_start();

// Assuming $username is set in the session
$Position_name = isset($_SESSION['Position_name']) ? $_SESSION['Position_name'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon" href="KCBLLOGO.PNG">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Expenditure Imprest</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: "Open Sans", arial;
            display: flex; /* Add flex display */
            flex-direction: row; /* Stack items horizontally */
            align-items: flex-start; /* Align items to the start (top) */
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 10px;
            width: 95%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 26px;
            margin-top: 20px;
        }

        /* Style for the memo details */
        .memo-details {
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px; /* Add space between memo details */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            //margin: 30px;
            width: 100%;
        }

        /* Style for individual detail items */
        .memo-details p {
            margin: 10px 0;
            width: 100%; /* Ensure full width for each item */
            text-align:left; /* Center align text */
        }

        /* Style for the memo content */
        .memo-content {
            flex: 1; /* Allow content to grow and take remaining space */
            text-align: left;
            margin-top: 20px;
            border-top: 1px solid #ccc; /* Add a top border for separation */
            padding-top: 20px;
            margin-left: 100px; /* Add padding to the top */
        }

        /* Style for individual content items */
        .memo-content p {
            margin: 10px 0 0 20px;
            font-size: 16px; /* Adjust font size */
            line-height: 1.6; /* Adjust line height for readability */
            color: #333; /* Set text color */
        }

        /* Style for the actions container */
        .actions-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Style for action buttons */
        .approve-button, .reject-button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style for the approve button */
        .approve-button {
            background-color: transparent;
            color: #28a745;
        }

        .approve-button:hover {
            background-color: white;
        }

        /* Style for the reject button */
        .reject-button {
            background-color: transparent;
            color: #dc3545;
        }

        .reject-button:hover {
            background-color: white;
        }

        .memo-content-c1 {
            display: flex;
            flex-direction: column; /* Display memo details in a column */
        }

        /* Styles for the overlay */
        .overlay {
            position: fixed; /* Fixed position */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            z-index: 999; /* Ensure it appears on top of other elements */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Styles for the popup */
        .popup {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3); /* Shadow effect */
        }

        /* Styles for the comment textarea */
        .comment-input {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        /* Styles for the send button */
        .send-comment-button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4CAF50; /* Green background */
            color: white; /* White text color */
            transition-duration: 0.4s;
        }

        .send-comment-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        /* Modal CSS */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


.modalr {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 9999; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 100%; /* Could be more or less, depending on screen size */
}

/* Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Send button styles */
.send-comment-button {
  margin-top: 10px; /* Add space between input and button */
  padding: 10px 20px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background-color: #4CAF50; /* Green background */
  color: white; /* White text color */
}

.send-comment-button:hover {
  background-color: #45a049; /* Darker green on hover */
}
            .tooltip {
        visibility: hidden;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        position: absolute;
        z-index: 1;
        bottom: 100%;
        left: 50%;
        margin-left: -60px;
        width: 200px;
        opacity: 0;
        transition: opacity 0.3s;
    }

    td:hover .tooltip {
        visibility: visible;
        opacity: 1;
    }

    .short-text {
        cursor: pointer;
    }
    </style>
</head>
<body>
<?php
// Start session if not already started
//session_start();

// Include database connection or any other necessary files
// include 'include.php';
// Include the TCPDF library

// Check if the 'id' parameter is set in the URL
if(isset($_GET['imprest_id'])) {
    // Sanitize the id parameter to prevent SQL injection
    $imprest_id = intval($_GET['imprest_id']); // Assuming id is an integer
    
    // Include database connection
    include 'include.php'; // Adjust this to your database connection file path

    // Query to fetch memo details based on the provided id
    $sql = "SELECT * FROM imprest_expenditure WHERE imprest_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $imprest_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if memo with the provided id exists
    if($result->num_rows > 0) {
        // Fetch memo details
        $memo = $result->fetch_assoc();
        
        // Display memo details
        echo "<div class='memo-content-c1'>";
echo "<table class='memo-details' border='1'>";
echo "<tr><th style='background-color: #3385ff; color: white'>Field</th><th style='background-color: #3385ff; color: white'>Value</th></tr>";
echo "<tr><td>Imprest ID</td><td>" . htmlspecialchars($memo['imprest_id']) . "</td></tr>";
echo "<tr><td>Name</td><td>" . htmlspecialchars($memo['username']) . "</td></tr>";
echo "<tr><td>Date</td><td>" . htmlspecialchars($memo['date']) . "</td></tr>";
echo "<tr><td>Department Name</td><td>" . htmlspecialchars($memo['department_name']) . "</td></tr>";
echo "<tr><td>Imprest Amount</td><td>" . htmlspecialchars($memo['imprest_amount']) . "</td></tr>";
echo "<tr><td>Outstanding Imprest Amount</td><td>" . htmlspecialchars($memo['outstanding_imprest_amount']) . "</td></tr>";
// Add more details as needed
echo "</table>";


        // Display memo details
        
        // Add table to display position name, status, and signature
        echo "<table class='memo-details' border='1'>";
             // Fetch data from the memo_action table
$query = "SELECT username, status, comment, signature_path FROM imprest_action WHERE imprest_id = ?";
$stmt = $conn->prepare($query);
$stmt -> bind_param("i", $imprest_id);
$stmt->execute();
$result = $stmt->get_result();
//$result = mysqli_query($conn, $query);

echo "<tr><th style='background-color: #3385ff; color: white'>Name</th><th style='background-color: #3385ff; color: white'>Status</th><th style='background-color: #3385ff; color: white'>Comment</th><th style='background-color: #3385ff; color: white'>Signature</th></tr>";
 // Loop through each row of the result
    while($row = mysqli_fetch_assoc($result)) {
        // Echo table row with data
        echo "<tr>";
        echo "<td style='padding: 3px; border-bottom: 1px solid #dddddd;'>".$row['username']."</td>";
        echo "<td style='padding: 3px; border-bottom: 1px solid #dddddd;'>".$row['status']."</td>";
                   $comment = $row['comment'];
        $shortComment = substr($comment, 0, 100);

        echo "
        <td style='padding: 8px; border-bottom: 1px solid #dddddd; position: relative;'>
        <span class='short-text'>$shortComment</span>
        <div class='tooltip'>$comment</div>
        </td>
";
        echo "<td style='padding: 3px; border-bottom: 1px solid #dddddd; text-align: center;'><img src='".$row['signature_path']."' alt='Signature' style='max-width: 100px; max-height: 50px;'></td>";
        echo "</tr>";
    }

echo "<tr>";
$Position_name = "";
        // echo "<p>" . $_SESSION['Position_name'] . "</p>";
// Use Position_name from $_SESSION for comparison
            
//echo "<td>" . $_SESSION['Position_name'] . "</td>";
            

//echo "<td>" . $memo['status'] . "</td>";
// Start the session
//session_start();

// Check if the username is set in the session
if(isset($_SESSION['username'])) {
    // Retrieve the username from the session
    $username = $_SESSION['username'];

    // Prepare SQL query to fetch comments for the current username
    
    $sql_comment = "SELECT comment 
FROM imprest_expenditure 
WHERE username = ? 
AND date = (
    SELECT MAX(date) 
    FROM imprest_expenditure 
    WHERE username = ?
);
";
    $stmt = $conn->prepare($sql_comment);
    //$stmt->bind_param("ss", $username, $username);
    //$stmt->execute();
    //$result = $stmt->get_result();

    // Fetch comments and display them
    while ($row = $result->fetch_assoc()) {
        $comment = $row['comment'];
        echo "<td>" . $comment . "</td>";
    }
} else {
    // Handle case where username is not set in the session
    echo "Username not found in session.";
}

// Assuming $conn is your database connection object
// Assuming $username is set correctly
// Check if the status is 'approved'


//below is the script hiden for stopping fetch signature and show details before any approval and decline action taken

if ($memo['status'] === 'approve' || $memo['status'] === 'decline') {
    // Start the session
    //session_start();

    // Retrieve the username from the session
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        // Include database connection
        include 'include.php';

        // Retrieve and display signature from memo_action table
        $sql_signature = "SELECT 
    ma.imprest_id, 
    ma.username, 
    ma.status, 
    ma.comment, 
    COALESCE(s.signature_path, ma.signature_path) AS signature_path, 
    ma.username 
FROM 
    memo_action ma 
LEFT JOIN 
    signature s ON ma.username = s.username 
WHERE 
    ma.username = ? 
    AND ma.status = 'approved' OR ma.status = 'declined'";

        $stmt_signature = $conn->prepare($sql_signature);

        // Check if the statement was prepared successfully
        if ($stmt_signature) {
            // Bind parameter and execute the statement
            $stmt_signature->bind_param("i", $username); // Assuming $memoId contains the memo_id
            $stmt_signature->execute();

            // Get the result
            $result_signature = $stmt_signature->get_result();

            // Check if there are rows in the result
            if ($result_signature->num_rows > 0) {
                $row_signature = $result_signature->fetch_assoc();
                $signature_path = $row_signature['signature_path'];
                echo "<td style='text-align: center;'><img src='" . $signature_path . "' alt='Signature' style='width: 100px; height: 50px;'></td>";
            } else {
                echo "<td>No signature available</td>";
            }

            // Close the statement
            $stmt_signature->close();
        } else {
            // Handle the case where the statement preparation failed
            echo "Failed to prepare statement: " . $conn->error;
        }
    } else {
        echo "<td>No username available in session</td>";
    }
} else {
    // If status is not 'approved', don't fetch the signature
    //echo "<td></td>"; // Empty cell
}



echo "</tr>";


echo "</table>";

        // Close memo-details div
        echo "</div>";
        echo "</div>";
        echo "<div class='memo-content'>";
        /*echo "<div style='display: flex; align-items: center; align-contents: center;'>";
        echo "<p style='font-weight: bold;'> Subject:</p>";
        echo "<p style='font-weight: bold;'>" . $memo['subject'] . "</p>";
        echo "</div>";*/
        echo "<p>" . $memo['imprest_purpose'] . "</p>";
        // Print button CSS
// CSS for print button and hiding elements when printing
echo "<style>";
echo ".print-button {";
echo "    max-width: 120px;";
echo "    text-decoration: none;";
echo "    display: block;";
echo "    padding: 10px 20px;";
echo "    font-size: 16px;";
echo "    background-color: #4CAF50;";
echo "    color: white;";
echo "    border: none;";
echo "    border-radius: 5px;";
echo "    cursor: pointer;";
echo "    transition: background-color 0.3s;";
echo "}";
echo ".print-button:hover {";
echo "    background-color: #45a049;";
echo "}";
echo "@media print {";
echo "    .print-button,";
echo "    .actions-container {";
echo "        display: none !important;";
echo "    }";
echo "}";
echo "</style>";
        echo "<div style='text-align: center; margin-top: 20px;'>";
 echo "<a href='generate_expenditure_imprest_pdf.php?imprest_id=$imprest_id' class='print-button'><i class='fa fa-file-pdf-o'></i> Print to PDF</a>";
echo "</div>";


        /*echo "</div>";
        echo "<div class='actions-container'>";

        echo "<button class='approve-button' data-memo-id='" . $memo['id'] . "'>Approve</button>";
        echo "<button class='reject-button' data-memo-idr='" . $memo['id'] . "'>Reject</button>";
         
        echo "</div>";
        */
    } else {
        echo "Memo not found.";
    }
    
    // Close statement and connection
    //$stmt->close();
    $conn->close();
    
} else {
    // Redirect to an error page or homepage if 'id' parameter is not provided
    header("Location: error.php");
    exit();
}

?>

<!-- Your existing HTML code -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <textarea id="commentInput" class="comment-input" rows="4" placeholder="Add comment"></textarea>
    <button id="sendCommentButton" class="send-comment-button">Send</button>
  </div>
</div>


<div id="myModalr" class="modalr">
  <div class="modal-content">
    <span class="close">&times;</span>
    <textarea id="commentInputr" class="comment-input" rows="4" placeholder="Add comment"></textarea>
    <button id="sendCommentButtonr" class="send-comment-button">Send</button>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("printIcon").addEventListener("click", function() {
        generatePDF();
    });
});

function generatePDF() {
    $.ajax({
        url: 'generate_expimprest_pdf111.php', // Update the URL to the PHP script that generates the PDF
        method: 'GET',
        success: function(response) {
            // Trigger download
            var blob = new Blob([response]);
            var link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'expenditure_application_list.pdf';
            link.click();
        }
    });
}

</script>
<script>


/*JavaScript to show modal after clicking approve button
$(document).ready(function() {
    $(".approve-button").click(function() {
        // Show modal
        $("#myModal").css("display", "block");
    });

    // Close modal when clicking the close button
    $(".close").click(function() {
        $("#myModal").css("display", "none");
    });

    // Close modal when clicking outside the modal
    $(window).click(function(event) {
        if (event.target == $("#myModal")[0]) {
            $("#myModal").css("display", "none");
        }
    });

    // Send comment when clicking send button
    $("#sendCommentButton").click(function() {
        var memoId = $(".approve-button").data("memo-id");
        var comment = $("#commentInput").val();
        // Send AJAX request to approve.php with memoId and comment
        $.ajax({
            type: "POST",
            url: "approve.php",
            data: { memo_id: memoId, comment: comment },
            success: function(response) {
                // Handle success response
                alert(response); // For example, show a success message
                // Close modal after sending comment
                $("#myModal").css("display", "none");
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText); // Log error to console
                alert("Error occurred. Please try again."); // Show an error message to the user
            }
        });
    });
});



JavaScript to handle clicking on the reject button
$(".reject-button").click(function() {
    // Show modal
    $("#myModalr").css("display", "block");
});

// Close modal when clicking the close button
$(".close").click(function() {
    $("#myModalr").css("display", "none");
});

// Close modal when clicking outside the modal
$(window).click(function(event) {
    if (event.target == $("#myModalr")[0]) {
        $("#myModalr").css("display", "none");
    }
});

// Send comment when clicking send button
$("#sendCommentButtonr").click(function() {
    var memoId = $(".reject-button").data("memo-idr");
    var comment = $("#commentInputr").val();
    // Send AJAX request to reject.php with memoId and comment
    $.ajax({
        type: "POST",
        url: "reject.php",
        data: { memo_idr: memoId, comment: comment },
        success: function(response) {
            // Handle success response
            alert(response); // For example, show a success message
            // Close modal after sending comment
            $("#myModalr").css("display", "none");
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText); // Log error to console
            alert("Error occurred. Please try again."); // Show an error message to the user
        }
    });
});

*/

</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const cells = document.querySelectorAll('.comment-cell');

    cells.forEach(function(cell) {
        cell.addEventListener('mouseenter', function() {
            this.textContent = this.getAttribute('data-full-comment');
        });

        cell.addEventListener('mouseleave', function() {
            this.textContent = this.getAttribute('data-full-comment').substring(0, 2) + '...';
        });
    });
});

</script>
</body>
</html>
