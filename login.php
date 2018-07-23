<?php
session_start();
?>
<html>
    <style>
    div {
        text-align: center;
        border-radius: 15px;
        background-color : #f2f2f2;
        padding: 10px;
    }
    body {
        background:url("background.jpg");
        }
    h1{
        color: black;
        text-align : center;
    }
    input[type=submit] {
    background-color: blue;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
    </style>

<body>
    <h1> Error Logging In </h1>
    <br>
    <div>
        <?php

include("config.php");

$_SESSION["loggedin"] = 0;

$username = $_POST['un'];
$pwd = $_POST['pw'];

$sql = "SELECT * FROM accountlist WHERE email='$username'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);

if($count==1) {
    $row = mysql_fetch_assoc($result);
    if ((($row['password']) == $pwd) && ($row['admin'] == 1)) {
    $_SESSION["loggedin"] = 1; 
    $_SESSION["useremail"] = $username;
    header("Location: abrowse.php"); die;
    } else if ((($row['password']) == $pwd) && ($row['admin'] == 0))  {
        $_SESSION["loggedin"] = 1; 
        $_SESSION["useremail"] = $username;
        header("Location: browse.php"); die;
    } else {
        echo "Invalid Username or Password!";
        echo "<br>";
        echo '<a href="home.php">Return Home</a>';
      }
} else {
    echo "Invalid Username or Password!";
    echo "<br>";
    echo '<a href="home.php">Return Home</a>';
}
        ?>
</div>
    </body>
</html>
