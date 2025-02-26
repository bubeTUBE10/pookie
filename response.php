<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require 'db_connection.php';
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Confirmation - Boba Love Express</title>
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
        <p>Thank you for your order! ❤️</p>
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
        <h2>Order Summary</h2>
        <?php
        // Check if form data is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $tea = htmlspecialchars($_POST['tea']);
            $flavor = htmlspecialchars($_POST['flavor']);
            $ice = htmlspecialchars($_POST['ice']);
            $sweetness = htmlspecialchars($_POST['sweetness']);
            $request = htmlspecialchars($_POST['request']);

            // Retrieve toppings and ensure it's always an array
            $toppings = isset($_POST['toppings']) ? (array)$_POST['toppings'] : [];
            $toppingsString = implode(", ", $toppings); // Convert array to a comma-separated string

            // Display the order summary
            echo "<p><strong>Tea:</strong> $tea</p>";
            echo "<p><strong>Flavor:</strong> $flavor</p>";
            echo "<p><strong>Ice Level:</strong> $ice</p>";
            echo "<p><strong>Sweetness Level:</strong> $sweetness%</p>";

            // Display selected toppings
            if (!empty($toppings)) {
                echo "<p><strong>Toppings:</strong></p>";
                echo "<ul>";
                foreach ($toppings as $topping) {
                    echo "<li>" . htmlspecialchars($topping) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p><strong>Toppings:</strong> None</p>";
            }

            // Display special requests
	    echo "<p><strong>Special Requests:</strong> $request</p>";

// Prepare SQL statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO orders (tea, flavor, toppings, sweetness, ice, requests) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die("Prepare failed: " . $conn->error);
            }

            // Bind parameters
            $stmt->bind_param("ssssss", $tea, $flavor, $toppingsString, $sweetness, $ice, $request);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<p><strong>Order successfully saved to the database!</strong></p>";	
	    } else {
                echo "<p><strong>Error saving order: " . $stmt->error . "</strong></p>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        } else {
            // If no form data is submitted, show an error message
            echo "<p>No order data received. Please go back and place your order.</p>";
        }
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
