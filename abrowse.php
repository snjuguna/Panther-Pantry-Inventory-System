<?php
session_start();
?>

<html>
<head>
<style>
.topnav {
    overflow: hidden;
    background-color: red;
  }
  
  .topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }
  
  .topnav a.active {
    background-color: #00235e;
    color: white;
  }
     
  body {
    color:black;
    text-align:left;
    font-size: 14px;
  }
  .image1{
    vertical-align: top;
    text-align: center;
    width: 200px;
    float: right;
    padding-right: 200px;
  }
  img {
    width: 150px;
    height: 150px;
  }
  .logo {
  float: left;
  margin-right: -150px;
  }
  .caption {
    display: block;
  }
  h1 {
    font-size: 50px;  
    font-family: "Arial"
  }
  h2 {
    color:#0e58ce;
    font-size: 15px;
    font-family: "Lucida Console";
  }
  h3 {
    color:#0e58ce;
    text-align: left;
    font-size: 30px;
    font-family: "Lucida Console"
  }
  .icon {
    height: 40px;
    width: 40px;
    border: 0;
  }
  button {
    background-color : green;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    cursor: pointer;
    float : right;
    height : 30px;
    text-align: center;
    line-height: 0px;
  }
  p {
    width: 50%;
  }
  .caption {
    display: block;
  }
  
  .image1{
    vertical-align: top;
    text-align: center;
    float: right;
    padding-right: 200px;
  }
  .img2 {
      width:300px;
      height:300px;
  }
  figure {
      display: inline-block;
      border: 5px;
      margin: 20px;
  }
  figure img {
      vertical-align: top;
  }
figure figcaption {
    text-align: center;
}
a {
  text-decoration : none;
  color : white;
}
input[type=submit] {
    background-color: #0e58ce;
    border: none;
    color: white;
    text-decoration: none;
    cursor: pointer;
    height: 25px;  
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
</head>
<body>
<?php
include("config.php");
if(!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = 0;
} else {
  $_SESSION["cart"] = $_SESSION["cart"];
}
if(($_SESSION["loggedin"]) == 0) {
  echo "<button type='button'><a href='home.php'>Log in</a></button>";
} else {
  echo "<button type='button' style='background-color : red'><a href='home.php'>Log out</a></button>";
}
/*
$sql = "SELECT * FROM inventory";
$result = mysql_query($sql);
if(mysql_num_rows($result)>0) {
    while($row = mysql_fetch_assoc($result))
    {
        $invname = $row['name'];
        $invquant = $row['quantity'];
    }
}
$addCart = 1;
$soup_quant = $_POST['soup'];
$shirts_name = "T-shirt";
$shirts_price = 4.49;
if(!empty($_POST['shirtsq'])) {
    $sql2 = 'INSERT INTO `cart` (`name`,`price`,`quantity`,`added`)
    VALUES ("'.$shirts_name.'","'.$shirts_price.'","'.$shirts_quant.'","'.$addCart.'");';
    mysql_query($sql2);    
    }
*/
$query = mysql_query("SELECT * FROM inventory WHERE name='apples'");
$row = mysql_fetch_array($query);
$appleQuant = $row['quantity'];
$query = mysql_query("SELECT * FROM inventory WHERE name='cheerios'");
$row = mysql_fetch_array($query);
$cheeriosQuant = $row['quantity'];
$query = mysql_query("SELECT * FROM inventory WHERE name='soup'");
$row = mysql_fetch_array($query);
$soupQuant = $row['quantity'];
?>
<br>
<br>
<img src="pantherpantry.jpg" align="left" class="logo"> <h1><center> Panther's Pantry </center> </h1>
<h2> <center> Nonprofit Organization in Atlanta, Georgia</center> </h2>
<h2 style="color:red;"> <center> ADMIN MODE</center> </h2>
  <div class="topnav">
    <a href="aindex.php">Home</a>
    <a class="active" href="abrowse.php">Browse Inventory</a>
    <a href="modify.php" style="float:right" style="background-color:red"> <img src="gear.jpg" style="width:15px; height:15px;"> Update Inventory </a>
  </div>

<h1 style="text-align:center">Inventory</h1>
<table>
<tr>
<th> Item </th>
<th> Quantity </th>
<th> Category </th>
</tr>
<?php
$id = 0;
$sql = "SELECT name, quantity, category  FROM inventory";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
if(mysql_num_rows($result)>0) {
    while ($row = mysql_fetch_assoc($result)) {
        $id++;
        $invname = $row["name"];
        $invquant = $row["quantity"];
        $invcat = $row["category"];
        echo "<form action='' method='post'>";
        echo "<tr>";
        echo "<td> $invname </td>";
        echo "<td> $invquant </td>";
        echo "<td> $invcat </td>";
        echo "</tr>";
        echo "</form>";
        $quantnum = $_POST["quant$id"];
        if(!empty($quantnum)){
          $sql = mysql_query("UPDATE inventory SET added='1', orderquant='$quantnum' WHERE id='$id'");
          mysql_query($sql);
        }
    }
} else {
    echo "Inventory empty";
}
?>


</form>

</body>
</html>
