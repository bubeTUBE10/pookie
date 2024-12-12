<!DOCTYPE html>
<html lang="en">
<head>
        <?php
        //$brand = htmlspecialchars($_GET["brand"]);
        $server = "127.0.0.1";
        $port = "3306";
        $username = "root";
        $password = "phpPHP";
        $database = "pookie";
        $conn = mysqli_connect($server, $username, $password, $database, $port);
        ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fdf6e3;
            color: #333;
        }
        header, footer {
            text-align: center;
            padding: 20px;
            background-color: #000000;
            color: #fff;
        }
        main {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(245, 73, 144);
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .order-summary {
            margin-top: 20px;
        }
        .order-summary h2 {
            margin-bottom: 10px;
        }
        .order-summary p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <?php
    // Define the SQL query to fetch data
    $sql = "SELECT * FROM orders;";
    $result = mysqli_query($conn, $sql);

    // Check if the query returned results
    if (mysqli_num_rows($result) > 0) {
        // Fetch the last row from the result
        while ($row = mysqli_fetch_assoc($result)) {
            $tea = $row['tea'];
            $flavor = $row['flavor'];
            $toppings = $row['topping']; // Assuming 'topping' is the correct column name
            $sweetness = $row['sweetness'];
            $ice = $row['ice'];
            $requests = $row['requests'];
        }
    } else {
        // Set default values if no rows are found
        $tea = "None";
        $flavor = "None";
        $toppings = "None";
        $sweetness = "None";
        $ice = "None";
        $requests = "None";
    }

    // Close the connection
    mysqli_close($conn);
    ?>

    <header>
        <h1>Boba Love Express</h1>
        <p>Order Confirmation</p>
    </header>

    <main>
        <h2>Thank you for your order!</h2>
        <div class="order-summary">
            <h3>Order Details:</h3>
            <?php
            // Display selected options
            echo "<p><strong>Tea Type:</strong> " . htmlspecialchars($tea) . "</p>";
            echo "<p><strong>Flavor:</strong> " . htmlspecialchars($flavor) . "</p>";

            // Handle toppings (comma-separated or default)
            if (!empty($toppings) && strpos($toppings, ',') !== false) {
                echo "<p><strong>Toppings:</strong> " . htmlspecialchars(implode(', ', explode(',', $toppings))) . "</p>";
            } else {
                echo "<p><strong>Toppings:</strong> " . htmlspecialchars($toppings) . "</p>";
            }

            echo "<p><strong>Sweetness Level:</strong> " . htmlspecialchars($sweetness) . "%</p>";
            echo "<p><strong>Ice Level:</strong> " . htmlspecialchars($ice) . "</p>";
            echo "<p><strong>Special Requests:</strong> " . htmlspecialchars($requests) . "</p>";
            ?>
        </div>
    </main>

    <footer>
        <p>Made with ❤️ by [Your Name]</p>
    </footer>
</body>