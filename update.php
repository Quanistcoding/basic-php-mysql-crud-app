<?php include "functions.php"?>
<?php include "header.php"?>
<?php 
     $result = readData();
?>
<h2>Update Data</h2>
<h3>integer value cannot be blank</h3>

<div class="container">
<div class="row">

<div class="col-sm-6">
    <?php $resultQuery = createForm(true,"update"); ?>

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

    $result = mysqli_query($conn,$resultQuery);
    if($result){
        echo <<< xxx
            <script>
            $("#alert_success").show();
            setTimeout(()=>{\$("#alert_success").hide();},800);
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