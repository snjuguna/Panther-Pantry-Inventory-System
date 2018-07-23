<?php
session_start();
?>
<html>
    <style>
     
 body {
    background-image: url("background.jpg");
}
h1 {
    color : black;
    text-align : center;
}
div {
        text-align: center;
        border-radius: 15px;
        background-color : #f2f2f2;
        padding: 10px;
    }
    input[type=submit] {
    background-color: blue;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    width: 100px;
}
        </style>

<body>
<?php
include("config.php");

$uemail = $_SESSION["useremail"];

$query = mysql_query("SELECT * FROM accountlist WHERE email='$uemail'");
$row = mysql_fetch_array($query);
$username = $row['firstName'];

$queryy = mysql_query("SELECT * FROM inventory WHERE added='1'");
$count = mysql_num_rows($queryy);

if($count == 0) {
    echo "<div>";
    echo "Cart Empty! Please add items to your cart to submit an order!";
    echo "<br>";
    echo "<a href='cart.php'> Return to cart </a>";
    echo "<br>";
} else {
    $sql = "SELECT * FROM inventory";
    $result = mysql_query($sql);
    if(mysql_num_rows($result)>0) {
        while($row = mysql_fetch_assoc($result))
        {
            $pname = $row["name"];
            $orderquant = $row["orderquant"];
            $quant = $row["quantity"];
            $added = $row["added"];
            $finalquant = $quant-$orderquant;

            $query = mysql_query("UPDATE inventory set quantity='$finalquant' WHERE added='1' AND name='$pname'");
            mysql_query($query);
        }
           $query2 = mysql_query("UPDATE inventory SET added='0' WHERE added='1'");
           $query3 = mysql_query("UPDATE inventory SET orderquant='0' WHERE added='0'");
           mysql_query($query2);
           mysql_query($query3);
    }  
    
echo "<h1>Order Confirmation</h1>";
echo "<div>";
echo "<br>";
echo "<h1> Thank you $username for your order! </h1>";
echo "<h1> Your order will be ready in an hour! </h1>";
}
?>
<a href="browse.php"> Return to Browse </a>
<br>
<br>
</div>
</form>
</body>
</html>