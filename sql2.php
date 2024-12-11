<!DOCTYPE html>
<html>

<head>
    <title>SQL test</title>
    <?php
        //$brand = htmlspecialchars($_GET["brand"]);
        $server = "127.0.0.1";
        $port = "3307";
        $username = "root";
        $password = "phpPHP";
        $database = "pookie";
        $conn = mysqli_connect($server, $username, $password, $database, $port);
        
        // Check for successful connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the SQL query
        //$sql = "INSERT INTO car_brands(company) VALUES ('$brand');";  // Ensure the variable is properly quoted
        $result = mysqli_query($conn, $sql);
    ?>
</head>

<body>

    <?php
        echo $result ? "Success!" : "Failure: " . mysqli_error($conn);
    ?>

</body>
</html>
