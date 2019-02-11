 
<?php include "header.php";?> 
<div class="container">
    <div class="row">
    <!-- List Lawyers START -->
        <div class="col-lg-8 mt-3">
            <?php
                $current_page = isset($_GET["page"])?((int)$_GET["page"]) : 1;
                $mysql_limit = get_pagination("avocat",5,$current_page,false);
                $lawyers = db_select("avocat",null,$mysql_limit);
                foreach($lawyers as $lawyer):
                    $lawyer_image = get_lawyer_image_url($lawyer["id"]);
                    $img_url = base_url()."/";
                    if($lawyer_image!= false):
                        $img_url .= $lawyer_image;
                    else:
                        $img_url .= "images/lawyer.png";
                    endif;

            ?>
            <!-- single Lawyer start -->
            <div class="lawyer-ligne row border-bottom py-3 mb-4 mx-0 shadow-sm">
                <div class="col-lg-3">
                    <img  
                        alt="lawyer image" 
                        class="img-fluid img-thumbnail square-image" 
                        src="<?=$img_url?>"
                        height="200"
                        width="200"
                    >
                </div>
                <div class="col-lg-9">
                    <!-- name  -->
                    <h4 class="mb-1">
                        Maître  
                        <?=$lawyer["first_name"]?> <?=$lawyer["last_name"]?>
                    </h4>
                    <!-- address -->
                    <h6 class="text-muted">
                        <i class="fas fa-map-marker-alt"></i>
                        <?=$lawyer["address"]?>, <?=$lawyer["city"]?>
                    </h6>
                    <!-- PHONE AND EMAIL -->
                    <div class="d-flex flex-wrap align-items-center mb-3">
                        <?php if(!empty($lawyer["gsm"])):?>
                            <i class="fas fa-phone mr-2" title="Cet avocat accepte les appels téléphones" data-placement="top" data-toggle="tooltip"></i>
                        <?php endif;?>
                        <?php if(!empty($lawyer["email"])):?>
                            <i class="far fa-envelope" data-toggle="tooltip" title="Cet avocat accepte les E-mail" data-placement="top"></i>
                        <?php endif;?>
                    </div>  
                    <!-- specialites -->
                    <div class="specialties">
                        <?php
                            $specialites = get_lawyer_specialties($lawyer["id"]);
                            foreach($specialites as $specialty):
                        ?>
                        <span class="badge px-2 py-1 badge-secondary d-inline-block">
                            <i class="fas fa-gavel"></i> 
                            <?=$specialty?>
                        </span>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- single Lawyer end -->
            <?php
                endforeach;
            ?>
            <!-- Pagination -->
            <div class="row mt-5 px-3">
                <?php 
                    if(count($lawyers)>0)
                    get_pagination("avocat",5);    
                ?>
            </div>
        </div>
    <!-- List Lawyers END -->
    </div>
</div>
<?php include "footer.php";?> 
