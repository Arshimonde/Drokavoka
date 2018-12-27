<!-- SPECIALITES DATA MANAGMENT START-->
<?php
    /* insert specialite */
    if(isset($_GET["action"]) && $_GET["action"] == "add"):
        $elements = array();
        $elements["specialite_name"] = $_POST["specialite_name"];
        $elements["specialite_desc"] = $_POST["specialite_desc"];
        $is_inserted = db_insert("specialite",$elements);
    endif;
    /* delete specialite */
    if(isset($_GET["id"]) && isset($_GET["action"]) && $_GET["action"] == "delete"):
        $is_deleted = db_delete_row("specialite",$_GET["id"]);
    endif;
    /* modify specialite */
    if(isset($_GET["id"])  && isset($_GET["action"]) && $_GET["action"] == "modify"):
        $elements = array();
        $elements["specialite_name"] = $_POST["specialite_name"];
        $elements["specialite_desc"] = $_POST["specialite_desc"];
        $is_modified = db_update_row("specialite",$elements,("id=".$_GET["id"]));
    endif;
    /* get all specialite */
    $specialites = db_select_all("specialite");
?>
<!-- SPECIALITES DATA MANAGMENT END-->

<!-- NOTIFICATION  START-->
<?php 
/* insert */
if(isset($is_inserted)):
    $alert_type = "Ajout avec Succés";
    $alert_color = "info";
    $message = "La spécialité ". $elements["specialite_name"] ." est bien inséré";
    /* not inserted */
    if(!$is_inserted):
        $alert_type = "Attention";
        $alert_color = "warning";
        $message = "L'ajout du spécialité ".$elements["specialite_name"]." est échoué";
    endif;
    /* declared in function.php */
    echo dashboard_alert($alert_type,$alert_color,$message);
endif;
/* deleted */
if(isset($is_deleted) && $is_deleted):
    $alert_type = "Suppression avec Succés";
    $alert_color = "success";
    $message = "La spécialité est bien suprimmer";
    /* declared in function.php */
    echo dashboard_alert($alert_type,$alert_color,$message);
endif;
/* modified */
if(isset($is_modified ) && $is_modified ):
    $alert_type = "Modifier avec Succés";
    $alert_color = "success";
    $message = "La spécialité est bien modifier";
    /* declared in function.php */
    echo dashboard_alert($alert_type,$alert_color,$message);
endif;
?>
<!-- NOTIFICATION END -->

<!-- SPECIALITE MAIN CONTENT START -->
<div class="main-content-container container-fluid px-4 pt-4">
    <!-- PAGE HEADER START -->
    <div class="page-header row no-gutters py-4 mb-3 border-bottom">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Gestion des spécialités</span>
            <h3 class="page-title d-flex"><i class="material-icons mr-2">school</i>Les spécialités</h3>
        </div>
    </div>
    <!-- PAGE HEADER END -->
    <div class="row">
        <!-- SPECIATLIES TABLE START -->
        <div class="col-lg-8">
            <?php if(count($specialites)>0): ?>
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h5 class="m-0">Les Spécialités</h5>
                    </div>
                    <div class="card-body p-0 pb-3 text-center">
                    
                        <table class="table mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0 text-left">Spécialité</th>
                                    <th scope="col" class="border-0 text-left">Description</th>
                                    <th scope="col" class="border-0"><!--Suprimmer column---></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                           
                                    foreach($specialites as $specialite):
                                ?>
                                    <tr>
                                        <td class="text-left specialite-name"><?php echo $specialite["specialite_name"];?></td>
                                        <td class="text-left specialite-desc">
                                            <?php 
                                                if(!empty($specialite["specialite_desc"]))
                                                echo $specialite["specialite_desc"];
                                                else
                                                echo "Aucune description";
                                            ?>
                                        </td>
                                        <td>
                                            <button id="<?php echo $specialite["id"];?>" class="modify-speciality btn btn-secondary d-block mb-4 w-100">Modifier</button>
                                            <button id="<?php echo $specialite["id"];?>" class="delete-speciality btn btn-danger d-block w-100">Suprimmer</button>
                                        </td>
                                    </tr>
                                <?php
                                    endforeach;                           
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            <?php else:?>
            <div class="jumbotron text-center">
                <h3>
                    <i class="fas fa-trophy fa-3x"></i> <br>
                    Rien que cette Trophy<br>
                </h3>
                <h6>Aucune spécialté est présente pour le moment</h6>
            </div>
            <?php endif; ?>
        </div>
        <!-- SPECIATLIES TABLE END -->
        <!-- ADD SPECIALITY FORM START -->
        <div class="col-lg-4">
            <div class="dashboard-add-speciality card card-small mb-4 sticky-top" style="top:80px">
                <div class="card-header border-bottom">
                    <h6 class="mb-0 d-flex">
                        <i class="material-icons mr-2">library_add</i>
                        <span>Ajouter une spécialité</span>
                    </h6>
                </div>
                <div class="card-body">
                    <!-- add specialite form start -->
                    <form id="speciality-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>?section=specialties&action=add" method="POST">
                        <!-- specialite input start -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons"> gavel </i></span>
                            </div>
                            <input type="text" name="specialite_name" class="form-control" placeholder="Entrer une spécialité ici" aria-label="specialite" required="requireds"> 
                        </div>
                        <!-- specialite input end -->
                        <!-- description input start -->
                        <div class="input-group mb-3">
                            <textarea name="specialite_desc" class="form-control" placeholder="Entrer Une description apropos la spécialité ici" cols="30" rows="5"></textarea> 
                        </div>
                        <!-- description input end -->
                        <input type="submit" value="Ajouter la spécialité" class="mb-2 mx-auto d-block btn btn-primary mr-2"/>
                    </form>
                     <!-- add specialite form end -->
                </div>
            </div>
        </div>
        <!-- ADD SPECIALITY FORM END -->
    </div>
</div>
<!-- SPECIALITE MAIN CONTENT END -->