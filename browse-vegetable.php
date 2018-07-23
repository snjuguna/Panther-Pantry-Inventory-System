<?php
session_start();
?>

<html>
<head>
<style>

.topnav {
    overflow: hidden;
    background-color: #0e58ce;
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
    color:black;
    text-align: left;
    font-size: 20px;
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
.a1 {
  text-decoration : none;
  color : black;
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

if(($_SESSION["loggedin"]) == 0) {
  echo "<button type='button'><a href='home.php'>Log in</a></button>";
} else {
  echo "<button type='button' style='background-color : red'><a href='home.php'>Log out</a></button>";
}

?>
<br>
<br>
<img src="pantherpantry.jpg" align="left" class="logo"> <h1><center> Panther's Pantry </center> </h1>
<h2> <center> Nonprofit Organization in Atlanta, Georgia</center> </h2>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a class="active" href="browse.php">Browse Inventory</a>
    <a href="cart.php" style="float:right"> <img src="cart.png" style="width:15px; height:15px;"> Shopping Cart </a>
  </div>

<h1 style="text-align:center">Inventory</h1>
<h2 style="text-align:center"> *Add items to your cart by entering a quantity and clicking "Add To Cart"* </h2>
<h2 style="text-align:center"> *Only one item can be added to your cart at a time* </h2>
<h3 style="text-align:center"> Filter by Category: <a href="browse.php" style="color:black; text-decoration:underline;">All</a>,
                                                   <a href="browse-fruit.php" style="color:black; text-decoration:underline;">Fruit</a>, 
                                                   <a href="browse-vegetable.php" style="color:black; text-decoration:underline;">Vegetable</a>, 
                                                   <a href="browse-protein.php" style="color:black; text-decoration:underline;">Protein</a>, 
                                                   <a href="browse-dairy.php" style="color:black; text-decoration:underline;">Dairy</a>, 
                                                   <a href="browse-grain.php" style="color:black; text-decoration:underline;">Grain</a>, 
                                                   <a href="browse-other.php" style="color:black; text-decoration:underline;">Other</a></h3>
<table>
<tr>
<th> Item </th>
<th> Quantity </th>
<th> Category </th>
<th> Order Quantity </th>
<th> Add to Cart </th>
</tr>
<?php
$sql = "SELECT name, quantity, category  FROM inventory WHERE category='vegetable';";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
if(mysql_num_rows($result)>0) {
    while ($row = mysql_fetch_assoc($result)) {
        $invname = $row["name"];
        $invquant = $row["quantity"];
        $invcat = $row["category"];
        echo "<form action='' method='post'>";
        echo "<tr>";
        echo "<td> $invname </td>";
        if ($invquant == 0) {
        echo "<td> Out of Stock </td>";
        } else {
        echo "<td> $invquant </td>";
        }
        echo "<td> $invcat </td>";
        echo "<td> <input type='text' name='quant$invname' size='2' maxlength='2'> </td>";
        if ($invquant == 0) {
        echo "<td> <input type='submit' value='Add To Cart' style='background-color:gray' disabled='disabled'> </td>";
        } else {
        echo "<td> <input type='submit' value='Add To Cart'> </td>";  
        }
        echo "</tr>";
        echo "</form>";

        $quantnum = $_POST["quant$invname"];

        if(!empty($_POST["quant$invname"])){
          if($quantnum > $invquant) {
            /*
            echo "<script type='text/javascript'>";
            echo "alert('Order Quantity exceeds Inventory Quantity for: $invname. Cannot add to order.')";
            echo "</script>";
            */
          } else if ($quantnum <= 0){
            /*
            echo "<script type='text/javascript'>";
            echo "alert('Order for: $invname. Must be one or more!')";
            echo "</script>";
            */
          } else {
          $sql = mysql_query("UPDATE inventory SET added='1', orderquant='$quantnum' WHERE name='$invname'");
          mysql_query($sql);
        }
      }
    }
} else {
    echo "Inventory empty";
}
?>
</form>

</body>
</html>