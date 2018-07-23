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
    button {
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
<h1> Modify Inventory </h1>
<h3 style="text-align:center"> Welcome Admin! Click a button below to modify the Panther Pantry's Inventory </h3>
<button onclick="location.href = 'additem.php';"> Add Item </button> 
<br>
<br>
<button onclick="location.href = 'removeitem.php';"> Remove Item </button> 
<br>
<br>
<button onclick="location.href = 'updateitem.php';"> Update Item </button> 
<br>
<br>
<button onclick="location.href = 'report.php';"> Print Report </button> 
<br>
<br>
<a href="abrowse.php"> Return to Browse! </a>
</div>
</table>
</body>
</html>
</form>
