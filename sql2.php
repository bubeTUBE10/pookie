<!DOCTYPE html>
<html>

<head>
    <title>SQL test</title>
    <?php
        //$brand = htmlspecialchars($_GET["brand"]);
        $server = "127.0.0.1";
        $port = "3306";
        $username = "root";
        $password = "phpPHP";
        $database = "pookie";
        $conn = mysqli_connect($server, $username, $password, $database, $port);
        ?>
</head>

<body>

    <?php
    // Define the SQL query to fetch data
    $sql = "SELECT * FROM orders;"; // Replace 'your_table_name' with the actual table name
    $result = mysqli_query($conn, $sql);

    // Check if the query returned results
    if (mysqli_num_rows($result) > 0) {
        // Display the results in an HTML table
        echo "<table border='1'>";
        echo "<tr>";

        // Fetch the field names dynamically and display them as table headers
        $fields = mysqli_fetch_fields($result);
        foreach ($fields as $field) {
            echo "<th>" . htmlspecialchars($field->name) . "</th>";
        }

        echo "</tr>";

        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No results found.";
    }

    echo "You selected {$row['tea']} tea";

    // Close the connection
    mysqli_close($conn);
    ?>

</body>
</html>
