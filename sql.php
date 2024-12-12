<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php
    $brand = htmlspecialchars($_GET["brand"]);
    $server = "127.0.0.1";
    $username = "php";
    $password = "hello";
    $database = "bubemedia";
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check for successful connection
    if (!$conn) {
        die("Connection failed: {mysqli_connect_error()}");
    }
    $sql = "select * from cars;";
    $result = mysqli_query($conn, $sql);
    ?>
</head>

<body>
    You selected brand <?= $brand ?>.<br />

    <?php
    foreach ($result as $row) // There should only be one row returned
    {
        if ($row['brand'] == $brand) {
            echo "{$row['brand']} {$row['make']} has {$row['hp']} horsepower.";
            break; // Stop the loop once the specific row is found
        }
    }
    // Don't forget to close the connection!SS
    mysqli_close($conn);
    ?>

</body>

</html>