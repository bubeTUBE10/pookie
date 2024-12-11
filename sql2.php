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
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }
                    echo "Connected successfully to the MySQL server";
                    $conn->close();
    ?>

</body>
</html>
