<!DOCTYPE html>
<html lang="en">
<head>
    <?php
	require 'db_connection.php';
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart - Boba Love Express</title>
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css" />
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Boba Love Express</h1>
        <p>Your Last Order</p>
        <div class="center-wrapper">
            <div class="button-container">
                <a href="index.html" aria-label="Homepage" class="buttons">
                    <i class="fa fa-home"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Shopping Cart</h2>
        <?php
        // Fetch the last order from the database
        $sql = "SELECT * FROM orders ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the last order
            $row = $result->fetch_assoc();
            echo "<p><strong>Tea:</strong> " . htmlspecialchars($row['tea']) . "</p>";
            echo "<p><strong>Flavor:</strong> " . htmlspecialchars($row['flavor']) . "</p>";
            echo "<p><strong>Ice Level:</strong> " . htmlspecialchars($row['ice']) . "</p>";
            echo "<p><strong>Sweetness Level:</strong> " . htmlspecialchars($row['sweetness']) . "%</p>";

            // Display toppings
            if (!empty($row['toppings'])) {
                echo "<p><strong>Toppings:</strong></p>";
                echo "<ul>";
                $toppings = explode(", ", $row['toppings']);
                foreach ($toppings as $topping) {
                    echo "<li>" . htmlspecialchars($topping) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p><strong>Toppings:</strong> None</p>";
            }

            // Display special requests
            echo "<p><strong>Special Requests:</strong> " . htmlspecialchars($row['requests']) . "</p>";
        } else {
            echo "<p>No orders found.</p>";
        }

        // Close the connection
        $conn->close();
        ?>
        <a href="index.html" class="button">Place Another Order</a>
    </main>

    <!-- Footer -->
    <footer>
        <p>
            Made with ❤️ by
            <a href="rubenpookster.html">BubeTube</a>
        </p>
    </footer>
</body>
</html>
