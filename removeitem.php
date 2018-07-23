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
    width: 120px;
}
table {
    border-collapse: collapse;
    width: 100%;
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
?>
<div>
<h1> Remove Item </h1>
<h3 style="align-text:center"> Remove any item that is out of stock!</h3>
<form action="" method="post">
    Name of item to remove: <input type="text" name="itemname" size="10"> <br>
    <br>
<?php
$name = $_POST["itemname"];
$sql = "DELETE FROM inventory WHERE name='".$name."'";
mysql_query($sql);
?>
<input type="submit" value="Remove">
</form>
<br>
<br>
<a href="modify.php"> Return to Modify Inventory </a>
</div>

<h4> Inventory List </h4>
<table>
<tr>
<th> Item </th>
<th> Quantity </th>
<th> Category </th>
</tr>
<?php
$sql = "SELECT name, quantity, category  FROM inventory";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0) {
    while ($row = mysql_fetch_assoc($result)) {
        $invname = $row["name"];
        $invquant = $row["quantity"];
        $invcat = $row["category"];
        echo "<tr>";
        echo "<td> $invname </td>";
        echo "<td> $invquant </td>";
        echo "<td> $invcat </td>";
        echo "</tr>";
    }
} else {
    echo "Inventory empty";
}
?>
</table>
</body>
</html>
</form>
