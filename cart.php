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
table {
    border-collapse: collapse;
    width: 30%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}
tr:hover {
    background-color:#f5f5f5;
}
        </style>

<body>
<?php


include("config.php");

if(($_SESSION["loggedin"]) == 0) {
    header("Location: home.php"); die;
}

echo "<h1>Shopping Cart</h1>";
echo "<div>";
echo "<br>";
echo "<table align='center'>";
echo "<tr>";
echo "<th> Item </th>";
echo "<th> Quantity </th>";
echo "</tr>";
$sql = "SELECT * FROM inventory";
$result = mysql_query($sql);
$numitems = mysql_num_rows($result);
$_SESSION["cart"] = $numitems;

if(mysql_num_rows($result)>0) {
    while($row = mysql_fetch_assoc($result))
    {
        $pname = $row["name"];
        $pquant = $row["orderquant"];
        $added = $row["added"];

        if($added == 1) {
            echo "<tr>";
            echo "<td> $pname </td>";
            echo "<td> $pquant </td>";
            echo "</tr>";
       }
    }   
}
echo "</table>";
?>
<br>
<form action="emptycart.php">
<input type="submit" onclick="return confirm('Are you sure you want to delete your cart?')" name="emptycart" value="Empty" style="background-color:red">
</form>

<br>
<form action="confirmation.php">
<input type="submit" value="Order">
</form>
<a href="browse.php"> Back to Browse</a>
</div>
</form>
</body>
</html>