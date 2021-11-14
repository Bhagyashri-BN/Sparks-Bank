<?php

echo "<link rel='stylesheet' type='text/css' href='CSS/transfer.css'>";

session_start();
$server="localhost";
$username="root";
$password="1239@Nov";
$con=mysqli_connect($server,$username,$password,"bankingdb");

if(!$con){
    die("Connection failed");
} 


$flag=false;

if (isset($_POST['transfer']))
{
  $sender=$_SESSION["sender"];
  $receiver=$_POST["reciever"];
  $amount=$_POST["amount"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sparks Bank</title>
  <link rel="icon" href="Images/bank_logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js" type="text/javascript"></script>
</body>
</html>


<?php

$sql = "SELECT Balance FROM customer WHERE name='$sender'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($amount>$row["Balance"] or $row["Balance"]-$amount<100){
        echo "<script>
                swal( 'Transaction Denied','Insufficient Balance!','error' ).then(function() { window. location = 'view.php'; });;
              </script>";
      
    }

    else{
         $sql = "UPDATE `customer` SET Balance=(Balance-$amount) WHERE Name='$sender'";
          
        if ($con->query($sql) === TRUE) {
          $flag=true;
        } 
        else {
          echo "Error in updating record: " . $conn->error;
        }
      }
  }
}
else {
  echo "0 results";
} 

if($flag==true){
$sql = "UPDATE `customer` SET Balance=(Balance+$amount) WHERE name='$receiver'";

  if ($con->query($sql) === TRUE) {
    $flag=true;    
  } 
  else {
    echo "Error in updating record: " . $con->error;
  }
}

if($flag==true){
    $sql = "SELECT * from customer where name='$sender'";
    $result = $con-> query($sql);
    while($row = $result->fetch_assoc())
     {
         $s_acc=$row['Acc_Number'];
     }

    $sql = "SELECT * from customer where name='$receiver'";
    $result = $con-> query($sql);
  
    while($row = $result->fetch_assoc())
      {
          $r_acc=$row['Acc_Number'];
      }        
    
    $sql = "INSERT INTO `transfer`(`s_name`, `s_acc_no`, `r_name`, `r_acc_no`, `amount`) VALUES ('$sender','$s_acc','$receiver','$r_acc','$amount')";
 
    if ($con->query($sql) === TRUE) {
      $flag=true;   
    } 
    else 
    {
      echo "Error updating record: " . $con->error;
    }
}

if($flag==true){
  echo "<script>
          swal('Money sent', 'Your transaction was successful','success').then(function() { window. location = 'View.php'; });;
        </script>";
}

elseif($flag==false)
{
    echo "<script>
            $('#text2').show()
          </script>";
}
?>

