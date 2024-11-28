<?php
// Database connection
include('db_connection.php'); // Adjust as necessary

$year = isset($_GET['year']) ? intval($_GET['year']) : 0;

if ($year) {
    // Query to get months for the selected year
    $query = "SELECT DISTINCT month FROM date_times WHERE year = $year ORDER BY month";
    $result = mysqli_query($conn, $query);
    
    // Create the month options
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['month']}'>{$row['month']}</option>\n";
        }
    } else {
        echo "<option value=''>No months available</option>\n";
    }
    
    // Close connection
    mysqli_close($conn);
}
?>