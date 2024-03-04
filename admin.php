<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
}

include 'config.php';

// Fetch work data for display
$work_query = "SELECT * FROM work";
$work_result = mysqli_query($con, $work_query);

// Handle form submissions for updating work items
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        // Handle update here
        $updateId = $_POST['update_id'];
        $newImg = mysqli_real_escape_string($con, $_POST['new_img']);
        $newTitle = mysqli_real_escape_string($con, $_POST['new_title']);
        $newDetails = mysqli_real_escape_string($con, $_POST['new_details']);

        $updateQuery = "UPDATE work SET img='$newImg', title='$newTitle', details='$newDetails' WHERE id=$updateId";
        mysqli_query($con, $updateQuery);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <h2>Welcome to the Admin Dashboard</h2>
    <a href="logout.php">Logout</a>
   


    <!-- Update Form -->
    <form method="post" action="">
        <label>Update Work Item:</label>
        <select name="update_id">
            <?php
            while ($work_row = mysqli_fetch_assoc($work_result)) {
                echo "<option value='{$work_row['id']}'>{$work_row['title']}</option>";
            }
            ?>
        </select>
        <label>New Image URL:</label>
        <input type="text" name="new_img" placeholder="New Image URL" required>
        <label>New Title:</label>
        <input type="text" name="new_title" placeholder="New Title" required>
        <label>New Details:</label>
        <textarea name="new_details" placeholder="New Details" required></textarea>
        <button type="submit" name="update">Update</button>
    </form>

    <!-- Display Work Items -->
    <div>
        <h3>Work Items:</h3>
        <?php
        // Reset work_result pointer
        mysqli_data_seek($work_result, 0);

        while ($work_row = mysqli_fetch_assoc($work_result)) {
            echo "<p>ID: {$work_row['id']}</p>";
            echo "<p>Image: {$work_row['img']}</p>";
            echo "<p>Title: {$work_row['title']}</p>";
            echo "<p>Details: {$work_row['details']}</p>";
            echo "<hr>";
        }
        ?>
    </div>
    <!-- ... existing code ... -->

<!-- Add this button for viewing messages -->

<!-- ... existing code ... -->
<a href="view.php" class="view-messages-button">View Messages</a>


    <?php
    // Close the connection
    mysqli_close($con);
    ?>
</body>
</html>
