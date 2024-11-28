<!DOCTYPE html>
<html>

<head>
    <title>SQL test</title>
    <?php
    $day = filter_var(htmlspecialchars($_GET["day"]), FILTER_VALIDATE_INT);
    $month = filter_var(htmlspecialchars($_GET["month"]), FILTER_VALIDATE_INT);
    $year = filter_var(htmlspecialchars($_GET["year"]), FILTER_VALIDATE_INT);

    // Validate input
    if ($day === false || $month === false || $year === false) {
        die("Invalid input.");
    }

    $server = "localhost";
    $username = "php";
    $password = "hello";
    $database = "bubemedia";
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check for successful connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("INSERT INTO reserved_times (year, month, day) VALUES ($year, $month, $year)");
    $stmt->bind_param("iii", $year, $month, $day);
    ?>

</head>

<body>
    You selected day <?= $day ?>.<br/>

    <?php
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    ?>

</body>
</html>