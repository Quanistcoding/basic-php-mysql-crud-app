<?php include "functions.php"?>
<?php include "header.php"?>
<?php 
     $result = readData();
?>


<div class="container">
<div class="row">

<div class="col-sm-6">
<form action="update.php" method = "post">
    <label for="username">Username</label>
    <input type="text" class="form-control" id = "username" name = "un">
    <label for="password">Password</label>
    <input type="password" class="form-control" id = "password" name = "pwd">
    <label for="id">ID</label>
    <select name="id" id="id">
        <?php 
            while($row = mysqli_fetch_assoc($result)){
               echo "<option>$row[id]</option>";
            };        
        ?>
    </select>
    <br>
    <input type="submit" class="btn btn-primary mt-2" value = "update" name = "submit">
</form>
</div>
<div class="col-sm-6"></div>
</div>

</div>

<div id = "alert_success" class="alert alert-success alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Data Updated.
</div>

<div id = "alert_warning" class="alert alert-warning alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Data Fail to Update.
</div>


<script>
    $("#alert_success").hide();
    $("#alert_warning").hide();
</script>


<?php 
 if(isset($_POST['submit'])){

    $username = $_POST["un"];
    $password = $_POST["pwd"];
    $id = $_POST["id"];
    
    $query = "UPDATE users SET username = '$username', password = '$password' WHERE id = $id";
    
    $result = mysqli_query($conn,$query);
    if($result){
        echo <<< xxx
            <script>
            $("#alert_success").show();
            </script>
        xxx;
    }else{
        echo <<< xxx
            <script>
            $("#alert_warning").show();
            </script>
        xxx;
        die(mysqli_error());
    }  
 }
?>



<?php include "footer.php"?>