<?php include "functions.php"?>
<?php include "header.php"?>
<?php 
     $result = $result = readData();;
?>


<div class="container">
<div class="row">

<div class="col-sm-6">
<form action="delete.php" method = "post">
    <label for="id">ID</label>
    <select name="id" id="id" oninput = "
    document.getElementById('deleteBtn').disabled = false;
    ">
    <option disabled selected value> -- select an id -- </option>
        <?php 
            while($row = mysqli_fetch_assoc($result)){
               echo "<option>$row[id]</option>";
            };        
        ?>
    </select>
    <br>
    <input id = "deleteBtn" 
           type="submit" 
           class="btn btn-primary mt-2" 
           value = "delete"
           name = "submit" 
           disabled
    >
</form>
</div>
<div class="col-sm-6"></div>
</div>

</div>

<div id = "alert_success" class="alert alert-success alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> Data Deleted.
</div>

<div id = "alert_warning" class="alert alert-warning alert-dismissible mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Data Fail to Delete.
</div>


<script>
    $("#alert_success").hide();
    $("#alert_warning").hide();
</script>


<?php 
 if(isset($_POST['submit'])){

    $id = $_POST["id"];
    if(!$id){
        echo <<< xxx
        <script>
        $("#alert_warning").show();
        
        </script>
        xxx;
    }

    $query = "DELETE FROM users WHERE id=$id";
    
    $result = mysqli_query($conn,$query);
    
    if(mysqli_affected_rows($conn)>0){
        echo <<< xxx
        <script>
        $("#alert_success").show();
        setTimeout(()=>{\$("#alert_success").hide();},800);
        </script>
        xxx;
    }
    
}
?>



<?php include "footer.php"?>