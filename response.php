<!DOCTYPE html>
<html lang="en">
<head>
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
    <header>
        <h1>Boba Love Express</h1>
        <p>Order Confirmation</p>
    </header>

    <main>
        <h2>Thank you for your order!</h2>
        <div class="order-summary">
            <h3>Order Details:</h3>
            <?php
            // Get form data
            $tea = $_GET['option-tea'] ?? 'None';
            $flavor = $_GET['option-flavor'] ?? 'None';
            $toppings = $_GET['toppings'] ?? 'None';
            $sweetness = $_GET['sweetness'] ?? '50%';
            $ice = $_GET['ice'] ?? 'Regular Ice';
            $requests = htmlspecialchars($_GET['requests'] ?? 'None');

            // Display selected options
            echo "<p><strong>Tea Type:</strong> $tea</p>";
            echo "<p><strong>Flavor:</strong> $flavor</p>";

            // Handle toppings (can be an array if multiple are selected)
            if (is_array($toppings)) {
                echo "<p><strong>Toppings:</strong> " . implode(', ', $toppings) . "</p>";
            } else {
                echo "<p><strong>Toppings:</strong> $toppings</p>";
            }

            echo "<p><strong>Sweetness Level:</strong> $sweetness%</p>";
            echo "<p><strong>Ice Level:</strong> $ice</p>";
            echo "<p><strong>Special Requests:</strong> $requests</p>";
            ?>
            <?php
            // Display all received form data for debugging
            echo '<pre>';
            print_r($_GET);
            echo '</pre>';
            exit;
            ?>
        </div>
    </main>

    <footer>
        <p>Made with ❤️ by [Your Name]</p>
    </footer>
</body>
</html>
