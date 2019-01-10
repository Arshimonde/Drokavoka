<!-- Header Include -->
<?php include "header.php";?>

    <!-- MAIN CONTENT START -->
    <?php if(!isset($_GET["type"])):?>
        <a href="/account.php?type=user">Je suis un user</a>
        <a href="/account.php?type=lawyer">Je suis un lawyer</a>
    <?php else:?>
        <?php if($_GET["type"]=='user') include "templates/accounts/sign-up--user.php";?>
        <?php if($_GET["type"]=='lawyer') include "templates/accounts/sign-up--lawyer.php";?>
    <?php endif;?>
   <!-- MAIN CONTENT END -->
   
<!-- footer Include -->
<?php include "footer.php";?>