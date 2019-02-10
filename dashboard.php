<?php include "header.php";?>
<!-- NOTIFICATION START -->
<?php
    if(isset($_GET["not_id"]) ):
        db_update_row("notification",array("checked"=>true)," WHERE id = ".$_GET["not_id"]);
    endif;
?>
<!-- NOTIFICATION END -->
    <div class="dashboard container-fluid">
        <div class="row">
            <!-- sidebar -->
            <?php include "templates/dashboard/dashboard-aside.php"; ?>
            <!-- main content -->
            <?php include "templates/dashboard/dashboard-main.php"?>
        </div>
    </div>
   
<?php include "footer.php";?>
