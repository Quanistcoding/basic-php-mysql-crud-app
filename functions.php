<?php include "mysql_connection.php"?>
<?php 

function readData(){
    global $conn;
    $query = "SELECT * FROM users;";
    $result = mysqli_query($conn,$query);
    return $result;
};

function readTableColums(){
    global $conn;
    $query = "SHOW COLUMNS FROM users";
    $result = mysqli_query($conn,$query);
    return $result;
};

function displayTable(){
    $colResult = readTableColums();
    $result = readData();
    echo "<table class = 'table'>";
    echo "<tr>";
   while($row = mysqli_fetch_array($colResult)){
      echo "<th>".$row[0]."</th>";
   }
    echo "</tr>";
      while($row = mysqli_fetch_assoc($result)){
         echo <<<EOD
            <tr>
               <td>$row[id]</td>
               <td>$row[username]</td>
               <td>$row[password]</td>
            </tr>
         EOD;
      };
    echo "</table>";
};