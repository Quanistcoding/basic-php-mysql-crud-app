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
    echo "<div style = 'overflow:scroll'><table class = 'table'>";
    echo "<tr>";
   while($row = mysqli_fetch_array($colResult)){
      echo "<th>".$row[0]."</th>";
   }
    echo "</tr>";
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
         foreach($row as $item){
            echo "<td>$item</td>";
         }
         echo "</tr>";
      };
    echo "</table></div>";
};

function createForm($showId,$actionPage){
    $colResult = readTableColums();
    $action = $actionPage.".php";
    $keys = [];
    echo "<form action= $action method = 'post'>";
    while($row = mysqli_fetch_assoc($colResult)){     
        $field_name = $row['Field'];
        $type = getInputType($row["Type"],$field_name);
        $firstLetterCapitilized = ucfirst($field_name);
        if($field_name != "id"){
        echo <<< EOD
        <label for="$field_name">$firstLetterCapitilized</label>
        <input type="$type" class="form-control" 
        id = "$field_name" name = "$field_name" 
        oninput = "checkIntInput()"
        placeholder = "$row[Type]"
        >
        EOD;
        array_push($keys,$field_name);
        }
    }
    if($showId){
        $data = readData();
        echo "<br><label for='id'>ID</label>";
        echo "<select name='id' id='id'>";
        while($row = mysqli_fetch_assoc($data)){
            echo "<option>$row[id]</option>";
        }
        echo "</select><br>";
    }
    echo "<input id = 'submitBtn' type='submit' class='btn btn-primary mt-2' value = '$actionPage' name = 'submit'></form>";
    return getSQLQuery($keys,$actionPage);
};


function getSQLQuery($arr,$target){
    if(isset($_POST['submit'])){
    if($target == "create"){
        $valuesArray = [];
        $queryKeys = implode(",",$arr);
        foreach($arr as $item){
            $v = "\"$_POST[$item]\"";
            array_push($valuesArray, $v);
        };
        $queryValues = implode(",",$valuesArray);       
        return "INSERT INTO users ($queryKeys) VALUES ($queryValues)";
    }else{
        $stings = [];
        foreach($arr as $item){
            $v = "\"$_POST[$item]\"";
            array_push($stings,"$item = $v");
        };
        $queryItem = implode(",",$stings);
        $id = $_POST["id"];
        
        return "UPDATE users SET $queryItem WHERE id = $id";
    };
};
}

function getInputType($str,$field_name){
    if(preg_match('/varchar/',$str)){
        if($field_name == "password")return "password";
        return "text";
    }else if(preg_match('/int/',$str)){
        return "number";
    };
};