<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <!-- dashboard navbar -->
    <?php include "dashboard-navbar.php"?>
    <!-- specialties start  -->
    <?php 
        if(isset($_GET["section"]) && $_GET["section"] == "specialties"):
            include "dashboard-specialties.php";
        endif;
        if(isset($_GET["section"]) && $_GET["section"] == "lawyers"):
            include "dashboard-lawyers.php";
        endif;
        if(isset($_GET["section"]) && $_GET["section"] == "edit-lawyer"):
            include "dashboard-edit-lawyer-profile.php";
        endif;
    ?>
</main>