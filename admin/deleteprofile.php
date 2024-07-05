<?php
include("../dbconnect.php");

$id = $_GET["id"];

$qry = "DELETE FROM `user` WHERE id = '$id'";

$result = mysqli_query($connect, $qry);

if ($result) {
    // Output JavaScript for the alert and redirect
    echo '<script>
            alert("User Deleted");
            window.location.href = "manageusers.php";
          </script>';
    exit; // Stop further execution after the redirect
} else {
    // Handle the case where deletion fails
    echo "Error deleting user: " . mysqli_error($connect);
}

mysqli_close($connect); // Close the database connection
?>
