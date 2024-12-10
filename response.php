<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fdf6e3;
            color: #333;
        }

        header,
        footer {
            text-align: center;
            padding: 20px;
            background-color: #000;
            color: #fff;
        }

        main {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background-color: #f54990;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        .order-summary {
            margin-top: 20px;
        }

        .order-summary h3 {
            margin-bottom: 15px;
        }

        .order-summary p {
            margin: 5px 0;
        }

        .debug-info {
            margin-top: 20px;
            background-color: #fff;
            color: #333;
            padding: 10px;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        footer {
            font-size: 0.9rem;
        }

        footer a {
            color: #ffb347;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* From Uiverse.io by mrhyddenn */
        .check {
            cursor: pointer;
            position: relative;
            margin: auto;
            width: 18px;
            height: 18px;
            -webkit-tap-highlight-color: transparent;
            transform: translate3d(0, 0, 0);
        }

        .check:before {
            content: "";
            position: absolute;
            top: -15px;
            left: -15px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(34, 50, 84, 0.03);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .check svg {
            position: relative;
            z-index: 1;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke: #c8ccd4;
            stroke-width: 1.5;
            transform: translate3d(0, 0, 0);
            transition: all 0.2s ease;
        }

        .check svg path {
            stroke-dasharray: 60;
            stroke-dashoffset: 0;
        }

        .check svg polyline {
            stroke-dasharray: 22;
            stroke-dashoffset: 66;
        }

        .check:hover:before {
            opacity: 1;
        }

        .check:hover svg {
            stroke: #4285f4;
        }

        #cbx:checked+.check svg {
            stroke: #4285f4;
        }

        #cbx:checked+.check svg path {
            stroke-dashoffset: 60;
            transition: all 0.3s linear;
        }

        #cbx:checked+.check svg polyline {
            stroke-dashoffset: 42;
            transition: all 0.2s linear;
            transition-delay: 0.15s;
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
            // Retrieve and sanitize form data
            $tea = htmlspecialchars($_GET['tea'] ?? 'None');
            $flavor = htmlspecialchars($_GET['flavor'] ?? 'None');
            $toppings = $_GET['toppings'] ?? [];
            $sweetness = htmlspecialchars($_GET['sweetness'] ?? '50');
            $ice = htmlspecialchars($_GET['ice'] ?? 'Regular Ice');
            $requests = htmlspecialchars($_GET['requests'] ?? 'None');

            // Display the order details
            echo "<p><strong>Tea Type:</strong> $tea</p>";
            echo "<p><strong>Flavor:</strong> $flavor</p>";

            if (!empty($toppings)) {
                if (is_array($toppings)) {
                    $toppingsList = array_map('htmlspecialchars', $toppings);
                    echo "<p><strong>Toppings:</strong> " . implode(', ', $toppingsList) . "</p>";
                } else {
                    echo "<p><strong>Toppings:</strong> " . htmlspecialchars($toppings) . "</p>";
                }
            } else {
                echo "<p><strong>Toppings:</strong> None</p>";
            }

            echo "<p><strong>Sweetness Level:</strong> $sweetness%</p>";
            echo "<p><strong>Ice Level:</strong> $ice</p>";
            echo "<p><strong>Special Requests:</strong> $requests</p>";
            ?>

            <div class="debug-info">
                <h3>Debug Information:</h3>
                <pre><?php print_r($_GET); ?></pre>
            </div>
        </div>
    </main>

    <footer>
        <p>Made with ❤️ by <a href="#">Your Name</a></p>
    </footer>
</body>

</html>