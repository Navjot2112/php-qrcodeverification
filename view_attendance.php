<?php
// Database configuration
$host = 'localhost'; // Database host
$db_name = 'attendance_db'; // Database name
$username = 'root'; // Database username
$password = ''; // Database password

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM attendance");
    $stmt->execute();

    // Fetch all results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are results
    if (count($results) > 0) {
        echo "<h1>Attendance Records</h1>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Timestamp</th>
                    <!-- Add other columns as needed -->
                </tr>";
        // Loop through and display each record
        foreach ($results as $row) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['timestamp']}</td>
                    <!-- Add other columns as needed -->
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No attendance records found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>
