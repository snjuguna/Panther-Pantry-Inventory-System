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
<h1> Report </h1>
<h1 id="demo"> <script> var d = new Date(); document.getElementById("demo").innerHTML = d; </script> <h1>
<h1> Inventory List </h1>
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
<br>
<div>
<a href="modify.php"> Return to Modify Inventory </a>
</div>
</body>
</html>
</form>
