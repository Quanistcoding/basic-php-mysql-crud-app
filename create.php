<?php include "functions.php"?>
<?php include "header.php"?>
<h2>Create Data</h2>
<h3>integer value cannot be blank</h3>
<div class="container">
<div class="row">

<div class="col-sm-6">
        <?php $resultQuery = createForm(false,"create"); ?>
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
    if (mysqli_query($conn, $resultQuery)) {
        echo <<< xxx
        <script>
        $("#alert_success").show();
        setTimeout(()=>{\$("#alert_success").hide();},800);
        </script>
    xxx;
      } else {
        echo "xxxxxxxxxxxxxError: " .$resultQuery . "<br>" . mysqli_error($conn);
      }
 }
?>



<?php include "footer.php"?>
