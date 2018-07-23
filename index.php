<?php
session_start()
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
    padding-right: 10px;
  }
 a {
   text-decoration : none;
   color : white;
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
</head>
<body>
  <?php
  if(($_SESSION["loggedin"]) == 0) {
    echo "<button type='button'><a href='home.php'>Log in</a></button>";
  } else {
    echo "<button type='button' style='background-color : red'><a href='home.php'>Log out</a></button>";
  }
  ?>
<br>
<img src="pantherpantry.jpg" align="left" class="logo"> <h1><center> Panther's Pantry </center> </h1>
<h2> <center> Nonprofit Organization in Atlanta, Georgia</center> </h2>
  <div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="browse.php">Browse Inventory</a>
    <a href="cart.php" style="float:right"> <img src="cart.png" style="width:15px; height:15px;"> Shopping Cart </a>
  </div>

  <div class="image1">
      <img src="map.png"/>
      <span class="caption">140 Decatur St SE (2.56 mi)<br>
          Atlanta, Georgia 30303
        <br>
      (404)-413-2364</span>
      <br>
      For more information visit our Facebook Page!
      <br>
      <a href="https://www.facebook.com/pantherspantry/">
        <img src="facebook.ico" class="icon">
        </a>
        <br>
        <h3 style="text-align:center"> Hours </h3>
        <h2>Monday</h2>
        <h4 style="text-align:center">9AM-10:30AM<br>4PM-5:15PM</h4>
        <h2>Tuesday</h2>
        <h4 style="text-align:center">11AM-12:15AM<br>4PM-5:15PM</h4>
        <h2>Wednesday</h2>
        <h4 style="text-align:center">10AM-10:30AM</h4>
        <h2>Thursday</h2>
        <h4 style="text-align:center">9AM-10:30AM<br>4PM-5:15PM</h4>
    </div>

<h3> Our Story </h3>
<p> Panther's Pantry, Georgia State University's new food pantry operated by the Nutrition Student Network in the Department of Nutrition, Byrdine F. Lewis School of Nursing and Health Professions, aims to reduce short term food insecurity for students experiencing the stress of financial constraints. </p>
<p> Food security is an essential need; yet, inadequate nourishment is a reality for many students. Panther's Pantry fills the gap by alleviating the burden of food insecurity and increasing the productivity and social well-being of GSU students.</p>
<h3> Our Mission </h3>
<p>Our mission is to provide free, nutritious food to students with limited access.</p>
<h3> About </h3>
<p>Panther’s Pantry aims to alleviate the burden of food insecurity and increase the productivity and social well-being of Georigia State students.</p>
<h3> General Information </h3>
<p>Panther's Pantry is located in Parking Lot B under the Urban Life Building which can be accessed by either taking elevators #4 or #6 to the parking level or by entering through B Lot on Decatur St.
<p>Help support Panther's Pantry and our students by donating non-perishable food items such as soup, crackers, tuna fish, canned vegetables/fruits, tomato sauce, rice, peanut butter and pasta. Hours of operation change from semester to semester and are posted on our wall.</p>
<p>For anyone interested in learning more about Panther's Pantry, please contact us at 404-413-2364 during operating hours.</p>
</body>
</html>