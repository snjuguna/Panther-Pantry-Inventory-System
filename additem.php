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
<h1> Add Item </h1>
<h3 style="align-text:center"> Fill in each blank and click Add Item to update the inventory!</h3>
<form action="" method="post">
    Name of item: <input type="text" name="itemname" size="10"> <br>
    <p> *Name of item cannot contain spaces, use "-"" for two words. Example: Canned-Fruit*</p>
    Quantity: <input type="text" name="quantity" size="10"> <br>
    <br>
    Category: <select name="category" size="6">
                <option value="Fruit"> Fruit </option>
                <option value="Vegetable"> Vegetable </option>
                <option value="Protein"> Protein </option>
                <option value="Dairy"> Dairy </option>
                <option value="Grain"> Grain </option>
                <option value="Other"> Other </option>
              </select>
    <br>
    <br>
<?php
$name = $_POST["itemname"];
$quant = $_POST["quantity"];
$cat = $_POST["category"];
$result = mysql_query("SELECT name FROM inventory WHERE name='$name'");
$ininv = mysql_num_rows($result);
/*
if(!empty($_POST["itemname"])) {
if($ininv == 0){
$sql = 'INSERT INTO `inventory` (`name`,`quantity`,`category`)
VALUES ("'.$name.'","'.$quant.'","'.$cat.'");';
mysql_query($sql);
} else {
echo "<script>";
echo "alert('Item already in inventory!')";
echo "</script>";
}
}
*/
if(!empty($_POST["itemname"])) {
    if($quant < 0) {
        echo "<script>";
        echo "alert('Quantity must be greater than or equal to 0')";
        echo "</script>";
    } else if ($ininv != 0) {
        echo "<script>";
        echo "alert('Item already in inventory!')";
        echo "</script>";
    } else {
        $sql = 'INSERT INTO `inventory` (`name`,`quantity`,`category`)
        VALUES ("'.$name.'","'.$quant.'","'.$cat.'");';
        mysql_query($sql);
}
}
?>
<br>
<input type="submit" value="Add Item">
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
