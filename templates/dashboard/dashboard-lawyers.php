<!-- DELETE LAWYER START -->
<?php
    /* delete specialite */
    if(isset($_GET["id"]) && isset($_GET["action"]) && $_GET["action"] == "delete"):
        $deleted_lawyer = get_lawyer_data($_GET["id"]);
        $is_deleted = db_delete_row("avocat",$_GET["id"]);
    endif;
    /* deleted alert */
    if(isset($is_deleted) && $is_deleted):
        $alert_type = "Suppression avec Succés";
        $alert_color = "success";
        $message = "l'avocat ". $deleted_lawyer['last_name'] ." ".$deleted_lawyer['first_name'] ." est bien suprimmer";
        /* declared in function.php */
        echo dashboard_alert($alert_type,$alert_color,$message);
    endif;
?>
<!-- DELETE LAWYER END -->




<!-- MAIN CONTENT START -->
<div class="container-fluid main-content pb-4">
    <!-- PAGE HEADER START -->
    <div class="page-header row no-gutters py-4 mb-3 border-bottom">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gestion des Avocats</span>
            <h3 class="page-title d-flex"><i class="fab fa-black-tie fa-1x mr-1"></i>  Les avocats</h3>
        </div>
    </div>
    <!-- PAGE HEADER END -->
    <!-- Lawyers START -->
    <div class="row">
        <?php
            /* get all specialite */
            $current_page = isset($_GET["page"])?((int)$_GET["page"]) : 1;
            $mysql_limit = get_pagination("avocat",3,$current_page,false);
            $lawyers = db_select("avocat",null,$mysql_limit);
            foreach($lawyers as $lawyer):
        ?>
            <!-- lawyer start -->
            <?php $lawyer_data = get_lawyer_data($lawyer["id"]);?>
            <div class="col-lg-4 mt-4 lawyer">
                <div class="card">
                    <!-- lawyer image & name -->
                    <div class="card-header bg-light text-center border-bottom pb-2 px-0">
                        <img class="img-fluid img-thumbnail p-2 w-25 rounded-circle border" src="../../images/lawyer.png" alt="lawyer image">
                        <h6 class="mt-1 mb-0 card-subtitle text-muted">
                            <?php 
                                $gender = $lawyer_data["gender"] == 'mr' ?"Monsieur": "Madame";
                                echo $gender;
                            ?>
                        </h6>
                        <h5 class="mt-0 mb-0 ">
                            <?php
                                echo $lawyer_data["last_name"]." ".$lawyer_data["first_name"];
                            ?>
                        </h5>
                    </div>
                    <!-- lawyer description-->
                    <div class="card-body p-0 pt-2">
                        <ul class="list-unstyled">
                            <!-- lawyer specialites -->
                            <li class="border-bottom w-100 px-3 pb-2">
                                <h6 class="mb-1">Spécialites:</h6>
                                <?php
                                    $specialites = get_lawyer_specialties($lawyer["id"]); 
                                    foreach($specialites as $speciality):
                                        echo 
                                        "<p class='my-0 ml-3 row align-items-center'>
                                            <i class='fas fa-gavel col-1 px-0 mr-1'></i>
                                            <span class='col-10 px-0'>$speciality</span>
                                        </p>";
                                    endforeach;
                                ?>
                            </li>
                            <!-- lawyer city -->  
                            <li class="border-bottom w-100 px-3 pb-2 pt-1">
                                <h6 class="mb-1">Ville:</h6>
                                <p class='my-0 ml-3'><?php echo $lawyer_data["city"];?></p>
                            </li>  
                            <!-- lawyer city -->  
                            <li class="w-100 px-3 pb-2 pt-1">
                                <h6 class="mb-1">GSM:</h6>
                                <p class='my-0 ml-3'><?php echo $lawyer_data["gsm"];?></p>
                            </li>    
                        </ul>
                    </div>
                    <div class="card-footer bg-light border-top px-1 text-center">
                        <a class="card-link d-inline-block btn btn-danger" href="/dashboard.php?section=lawyers&action=delete&id=<?php echo $lawyer['id'];?>">Suprimmer</a>
                        <a class="card-link d-inline-block btn btn-secondary" href="/dashboard.php?section=edit-lawyer&id=<?php echo $lawyer['id'];?>">Modifier</a>
                    </div>
                </div>
            </div>
            <!-- lawyer end -->
        <?php endforeach;?>
    </div>
    <!-- lawyers END-->
    <div class="row mt-5 px-3">
        <?php get_pagination("avocat",3);?>
    </div>
</div>
<!-- MAIN CONTENT END -->