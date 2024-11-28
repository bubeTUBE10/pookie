<!DOCTYPE html>
<html>

<head>
    <title></title>
    <?php
        $fname = htmlspecialchars($_GET["fname"]);
        $lname = htmlspecialchars($_GET["lname"]);
        $phone = htmlspecialchars($_GET["phone"]);
        $country = htmlspecialchars($_GET["country"]);
        $server = "localhost";
        $username = "php";
        $password = "hello";
        $database = "bubemedia";
        $conn = mysqli_connect($server, $username, $password, $database);
        
        // Check for successful connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the SQL query
        $sql = "INSERT INTO index_form(fname, lname, phone, country) VALUES ('$fname', '$lname', '$phone', '$country');"; 
        $result = mysqli_query($conn, $sql);
    ?>
</head>

<body>

    <?php
        echo $result ? "Success!" : "Failure: " . mysqli_error($conn);
    ?>

    Data submitted to FBI

</body>
</html>