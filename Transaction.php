<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sparks Bank</title>
  <link rel="icon" href="Images/bank_logo.png">
</head>
<body>
  <header> 
  <div class="topnav">
      <div class="topnav-right">
          <a href="index.html"  >Home</a>
          <a  href="View.php">View Customers</a>
          <a class="active" href="Transaction.php">View Transactions</a>
    </div>
  </div>

  <div class="header">
    <h5 style="padding-right: 1rem">Sparks Bank</h5>
  </div>

  <script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  </script>

  <div class="tablediv"> 
  <br><br>
  <table>
    <tr>
      <th>Sender Name</th>
      <th>Sender A/c No.</th>
      <th>Recipient Name</th>
      <th>Recipient A/c No.</th>
      <th>Amount</th>
      <th>Date & Time</th>
    </tr>

    <?php

    echo "<link rel='stylesheet' type='text/css' href='CSS/transaction.css'>";

    $conn = mysqli_connect("localhost", "root", "1239@Nov", "bankingdb");

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM transfer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<form method ='post' action = 'OneCustomer.php'>";
        echo "<td>" . $row["s_name"]. "</td><td>" . $row["s_acc_no"] . "</td><td>" . $row["r_name"]. "</td><td>" . $row["r_acc_no"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["date_time"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    } 
    else { echo "0 results"; }
    $conn->close();
    ?>

  </table>
  </div>
</body>
</html>

