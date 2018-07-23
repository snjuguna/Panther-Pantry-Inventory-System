<!DOCTYPE html>
<html>
    <body>
        <?php
            $host = "localhost";
            $username = "sjang5";
            $pwd = "sjang5";
            $db_name ="sjang5";

            
            $conn = mysql_connect("$host", "$username", "$pwd");
            mysql_select_db("$db_name");
            
            /*
            if (!$conn) {
                    die("Cannot connect to server");
            } else {
                    mysql_select_db("$db_name");
                    echo "connection established";
            }

            mysql_select_db("$db_name");
            $sql = "SELECT * FROM user";
            $result = mysql_query($sql);
            if(mysql_num_rows($result)>0) {
                while($row = mysql_fetch_assoc($result))
                {
                    $pwd=$row["password"];
                    $un=$row["username"];
                    $nm=$row["name"];
                    echo $un;
                    echo $pwd;
                    echo $nm;
                }
            }
            */
            
        ?>
    </body>
</html>
