
<?php
include 'config.php';

// Fetch messages from the contact table
$select_query = "SELECT * FROM contact";
$result = mysqli_query($con, $select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <style>
        <style>
       body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h2 {
    color: #333;
}

.message {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

strong {
    color: #555;
}
.back-to-admin-button {
    display: inline-block;
    background-color: #dc3545;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.back-to-admin-button:hover {
    background-color: #c82333;
}
    </style>
    </style>
</head>
<body>
<a href="admin.php" class="back-to-admin-button">Back to Admin Dashboard</a>

<h2>Contact Form Messages</h2>

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="message">
            <p><strong>Name:</strong> <?php echo $row["name"]; ?><br>
            <strong>Email:</strong> <?php echo $row["email"]; ?><br>
            <strong>Message:</strong> <?php echo $row["message"]; ?></p>
        </div>
        <?php
    }
} else {
    echo "No messages yet.";
}

mysqli_close($con);

?>

</body>
</html>
