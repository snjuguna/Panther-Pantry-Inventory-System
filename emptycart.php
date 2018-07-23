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
    <h1> Cart Emptied </h1>
<?php
include("config.php");

$query = mysql_query("UPDATE inventory SET added='0' WHERE added='1'");
$query2 = mysql_query("UPDATE inventory SET orderquant='0' WHERE added='0'");
$_SESSION["cart"] = 0;
mysql_query($query);
mysql_query($query2);

?>
<div>
    <a href="browse.php"> Return to Browse </a>
</div>
</form>
</body>
</html>