<?php include "mysql_connection.php"?>
<?php include "header.php"?>

<div class="container">
<div class="row">

<div class="col-sm-6">
<form action="create.php" method = "post">
    <label for="username">Username</label>
    <input type="text" class="form-control" id = "username" name = "un">
    <label for="password">Password</label>
    <input type="password" class="form-control" id = "password" name = "pwd">
    <input type="submit" class="btn btn-primary mt-2" value = "submit" name = "submit">
</form>
</div>
<div class="col-sm-6"></div>
</div>
</div>

<div id = "alert_success" class="alert alert-success alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Data Inserted.
</div>

<div id = "alert_warning" class="alert alert-warning alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Data Fail to Insert.
</div>


<script>
    $("#alert_success").hide();
    $("#alert_warning").hide();
</script>


<?php 
 if(isset($_POST['submit'])){

    $username = $_POST["un"];
    $password = $_POST["pwd"];
    
    $query = "INSERT INTO users (username,password) VALUES ('$username','$password')";
    
    $result = mysqli_query($conn,$query);
    if($result){
        echo <<< xxx
            <script>
            $("#alert_success").show();
            </script>
        xxx;
    }else{
    }  
 }
?>



<?php include "footer.php"?>
