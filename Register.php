<?php
session_start()
?>
<html>
<style>
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
    </style>
    <body>
        <?PHP
        include("config.php");
        $remail = $_POST['remail'];
        $fname = $_POST['rfirstname'];
        $lname = $_POST['rlastname'];
        $rpass = $_POST['regipass'];
        $rpass2 = $_POST['regipass2'];
        $admincode = $_POST['adminpass'];
        $adminstatus = 1;
        $sql = "SELECT * FROM accountlist";
        $result = mysql_query($sql);
        if(mysql_num_rows($result)>0) {
            while($row = mysql_fetch_assoc($result))
            {
            $dbuser=$row["email"];
            }
        }
        $query = mysql_query("SELECT * FROM admincode");
        $row = mysql_fetch_array($query);
        $acode = $row['code'];
        $uppercase = preg_match('@[A-Z]@', $rpass);
        $lowercase = preg_match('@[a-z]@', $rpass);
        $number = preg_match('@[0-9]@', $rpass);
        
        if (!isset($_POST['remail'])) {
            echo "<div>";
            echo "Please enter an email address";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
            echo "</div>";
        } else if (strpos($remail,'@student.gsu.edu') == false) {
            echo "<div>";
            echo "Please enter a Georgia State University email address: Must end with @student.gsu.edu";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
            echo "</div>";
        } else if  ($dbuser == $remail) {
            echo "<div>";
            echo "Email/Username is taken!!";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
            echo "</div>";
        } else if ($rpass != $rpass2) {
            echo "<div>";
            echo "Passwords do not match";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
            echo "</div>";
        } else if (!$uppercase || !$lowercase || !$number || strlen($rpass) < 8) {
            echo "<div>";
            echo "Passwords do not match or follow the requirements:";
            echo "<br>";
            echo "-Must contain at least one lowercase letter";
            echo "<br>";
            echo "-Must contain at least one uppercase letter";
            echo "<br>";
            echo "-Must contain at least one number";
            echo "<br>";
            echo "-Must be atleast 8 characters";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
        } else if (($rpass == $rpass2) && (!empty($_POST['adminpass'])) && ($admincode == $acode)) {
            $_SESSION["useremail"] = $remail;
            $sql2 = 'INSERT INTO `accountlist` (`firstName`,`lastName`,`email`,`password`,`admin`)
            VALUES ("'.$fname.'","'.$lname.'","'.$remail.'","'.$rpass.'","'.$adminstatus.'");';
            mysql_query($sql2);
            $_SESSION["loggedin"] = 1;
            echo "<div>";
            echo "<h1> Admin Account Successfully Created! </h1>";
            echo "<br>";
            echo "<h3> Redirecting to Inventory... </h3>";
            echo "</div>";
            echo "<script>setTimeout(\"location.href = 'abrowse.php';\",2000);</script>";
            //header("Location: aindex.php"); die;
        } else if ($rpass == $rpass2) {
            $_SESSION["useremail"] = $remail;
            $sql2 = 'INSERT INTO `accountlist` (`firstName`,`lastName`,`email`,`password`)
            VALUES ("'.$fname.'","'.$lname.'","'.$remail.'","'.$rpass.'");';
            mysql_query($sql2);
            $_SESSION["loggedin"] = 1;
            echo "<div>";
            echo "<h1> User Account Successfully Created! </h1>";
            echo "<br>";
            echo "<h3> Redirecting to Inventory... </h3>";
            echo "</div>";
            echo "<script>setTimeout(\"location.href = 'browse.php';\",2000);</script>";
            //header("Location: index.php"); die;
        }else {
            echo "<div>";
            echo "Error: Please fill in each blank";
            echo "<br>";
            echo '<a href="Register.html">Return to register</a>';
            echo "<div>";
        }
        ?>
    </body>
</html>
