<!DOCTYPE html>
<html>
<title>Sparks Bank</title> 
<link rel="icon" href="Images/bank_logo.png">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel='stylesheet' type='text/css' href="css/view1.css"/>
</head>
<body>
   
   <div class="topnav">
    <div class="topnav-right">
        <a href="index.html"  >Home</a>
        <a class="active" href="View.php">View Customers</a>
        <a href="Transaction.php">View Transactions</a>
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

<div style="float: center;">
<div class="tablediv"> 
<table>
  <tr>
    <th >Name</th>
    <th>Account Number</th>
    <th></th>
  </tr>

  <?php

  echo "<link rel='stylesheet' type='text/css' href='CSS/View.css'>";

  $conn = mysqli_connect("localhost", "root", "1239@Nov", "bankingdb");

  // Check connection

  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT name, acc_number FROM customer";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

  // output data of each row
  // echo "<table>";
  while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<form method ='post' action = 'OneCustomer.php'>";
      echo "<td>" . $row["name"]. "</td>";
      echo "<td>" . $row["acc_number"] . "</td>";
      echo "<td><a href='OneCustomer.php'>
                  <button type='submit'' name='user'  id='users1' value= '{$row['name']}'> Select
                    
                  </button>
                </a>
            </td>";
      echo "</form>";
      echo "</tr>";
  }
  // echo "</table>";
  } 
  else { echo "0 results"; }
  $conn->close();
  ?>

</table>
<img src="Images/customers1.png" class="img"></img>
</div>
</div>
</body>
</html>
