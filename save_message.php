<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($con, $_POST['Name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['Message']);

    $insert_query = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($con, $insert_query)) {
        echo "Message saved successfully";
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
    }
} else {
    echo "Invalid request method";
}

mysqli_close($con);
?>
