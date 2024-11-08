<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form
    $userId = $_POST['user_id'];
    $password = $_POST['password'];

    // Verify credentials (for now, assuming all credentials are valid)
    // In real implementation, verify the user ID and password from your database
    if ($userId && $password) {
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'attendance_db');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Mark the attendance for the user
        $sql = "INSERT INTO attendance (user_id, timestamp) VALUES ('$userId', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "Attendance marked successfully for user ID: " . $userId;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Please enter valid credentials.";
    }
} else {
    // Display the form
    ?>
    <form method="POST">
        <label for="user_id">User ID:</label><br>
        <input type="text" id="user_id" name="user_id" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Submit">
    </form>
    <?php
}
?>
