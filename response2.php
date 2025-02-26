<!DOCTYPE html>
<html lang="en">
<head>
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

            // Display the order summary
            echo "<p><strong>Tea:</strong> $tea</p>";
            echo "<p><strong>Flavor:</strong> $flavor</p>";
            echo "<p><strong>Ice Level:</strong> $ice</p>";
            echo "<p><strong>Sweetness Level:</strong> $sweetness%</p>";
            echo "<p><strong>Special Requests:</strong> $request</p>";
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
