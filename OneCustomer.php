<?php

echo "<link rel='stylesheet' type='text/css' href='CSS/Customer.css'>";

session_start();
$server="localhost";
$username="root";
$password="1239@Nov";

$con=mysqli_connect($server,$username,$password,"bankingdb");

if(!$con){
    die("Connection failed");

}
$_SESSION['user']=$_POST['user'];
$_SESSION['sender']=$_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
<title>Sparks Bank</title>
<link rel="icon" href="Images/bank_logo.png">

<!-- <link rel='stylesheet' type='text/css' href="CSS/OneCustomer.css"/> -->

<script type='text/JavaScript'>
  function toggleTable() {

    document.getElementById("myTable").classList.toggle("hidden");

  }
</script>

</head>
<body>
<header> 
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

<div class="container flex-direction">
<div class="center">  
  <div class="user_details">
    
    <!-- Senders Deatils -->
    <h3>Sender Details</h3>
        <?php

        // echo "<link rel='stylesheet' type='text/css' href='CSS/OneCustomer.css'>";

        if (isset($_SESSION['user']))
        {
          $user=$_SESSION['user'];
          $result=mysqli_query($con,"SELECT * FROM customer WHERE Name='$user'");
          while($row=mysqli_fetch_array($result))
          {
            echo "<p><b>User ID &nbsp&nbsp&nbsp:</b> ".$row['UserID']."</p>";
            echo "<p name='sender'><b>Name &nbsp&nbsp&nbsp&nbsp</b>  :  ".$row['Name']."</p>";
            echo "<p><b>Email ID</b>&nbsp&nbsp: ".$row['Email']."</p>";
            echo "<p><b>A/C No.</b>&nbsp&nbsp&nbsp: ".$row['Acc_Number']."</p>";
            echo "<p><b>IFSC</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: ".$row['IFSC']."</p>";
            echo "<p><b class='font-weight-bold'>Balance</b>&nbsp&nbsp:<b>&nbsp&#8377;</b> ".$row['Balance']."</p>";
          }         
        }
      ?>
       </div>
</div>       
</div>
<div>
  <img src="Images/onecustomer.png" style=" height:250px; margin-right:50px;"  class="img"></img>
</div>
      <div class="trans"style="padding-right: 0rem; padding-left:1000px;margin-top: -280px;text-decoration: bold;">
      <form action="transfer.php" method="POST">
      <!-- Make Transcation -->
                    <h3>Make a Transaction</h3>
                    <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
                    <select name="reciever" id="dropdown" class="textbox" required>
                        <option>Select Recipient</option>
                    <?php

                    // echo "<link rel='stylesheet' type='text/css' href='CSS/OneCustomer.css'>";

                    $user=$_SESSION['user'];
                    $db = mysqli_connect("localhost", "root", "1239@Nov", "bankingdb");
                    $res = mysqli_query($db, "SELECT * FROM customer WHERE name!='$user'");
                    while($row = mysqli_fetch_array($res)) {
                        echo("<option> "."  ".$row['Name']."</option>");
                    }
                    ?>
                    </select>
                    <br><br>
                    <b> From</b>&nbsp&nbsp&nbsp&nbsp; :&nbsp&nbsp;
                    <span style="font-size:1.2em;">
                    <input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user";?>'></input>
                    </span>
                    <br><br>
                    <b >Amount :&#8377;</b>
                    <input name="amount" type="number" min="100" class="textbox" placeholder="enter amount here" required >
                    <br><br>
                    <a href="Transc.php">
                      <button id="transfer" onClick="myFunction()" name="transfer" ;>Send Money</button>
                    </a>   
                        
        </form>
  </div>     
<br>
</body>
</html>
