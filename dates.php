<!DOCTYPE html>

<html>

<head>
        <title>SQL test</title>
        <?php
            $server = "localhost";
            $username = "php";
            $password = "hello";
            $database = "bubemedia";
            $conn = mysqli_connect($server, $username, $password, $database);
            
            // Check for successful connection
            if (!$conn) {
              die("Connection failed: {mysqli_connect_error()}");
            }
            $sql = "select * from date_times;";
            $result = mysqli_query($conn, $sql);
        ?>
</head>

</p>
<form action="submit.php" method="get">
  <label for="year">Year:</label><br />
  <select id="year" name="year" disabled>
    <option value="2024">2024</option>
  </select><br />

  <label for="month">Month:</label><br />
  <select id="month" name="month" onchange="fetchDays()">
    <option value="">Select Month</option>
    <?php
    // Only display months for the year 2024
    $months = range(1, 12);  // Months from 1 to 12
    foreach ($months as $month) {
        echo "<option value='{$month}'>{$month}</option>\n";
    }
    ?>
  </select><br />

  <label for="day">Day:</label><br />
  <select id="day" name="day">
    <option value="">Select Day</option>
    <!-- Days will be populated dynamically based on the selected month -->
  </select><br />

  <input type="submit" value="Submit">
</form>

<script>
  function fetchDays() {
    var month = document.getElementById("month").value;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_days.php?year=2024&month=" + month, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById("day").innerHTML = xhr.responseText;
      }
    };
    xhr.send();
  }
</script>
<p>
</html>