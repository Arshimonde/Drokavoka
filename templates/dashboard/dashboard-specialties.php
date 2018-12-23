<!-- SPECIALITES DATA MANAGMENT START-->
<?php
    /* insert specialite */
    if(isset($_POST["specialite_name"])):
        $elements = array();
        $elements["specialite_name"] = $_POST["specialite_name"];
        $elements["specialite_desc"] = $_POST["specialite_desc"];
        $is_inserted = db_insert("specialite",$elements);
    endif;
    /* get all specialite */
    $specialites = db_select_all("specialite");

?>
<!-- SPECIALITES DATA MANAGMENT END-->

<!-- NOTIFICATION  START-->
<?php 
if(isset($is_inserted)):
    $alert_type = "Succés";
    $alert_color = "info";
    $message = "La spécialité ". $elements["specialite_name"] ."est bien inséré";
    if(!$is_inserted):
        $alert_type = "Attention";
        $alert_color = "warning";
        $message = "L'ajout du spécialité ".$elements["specialite_name"]." est échoué";
    endif;
    ?>

    <div class="alert alert-<?php echo $alert_color?> alert-dismissible fade show mb-0 rounded-0" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="fa fa-info mx-2"></i>
        <strong><?php echo $alert_type; ?>:</strong><?php echo $message ?>
    </div>
<?php endif;?>
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
                                        <td class="text-left"><?php echo $specialite["specialite_name"];?></td>
                                        <td class="text-left">
                                            <?php 
                                                if(!empty($specialite["specialite_desc"]))
                                                echo $specialite["specialite_desc"];
                                                else
                                                echo "Aucune description";
                                            ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-secondary d-block mb-4 w-100">Modifier</button>
                                            <button class="btn btn-danger d-block w-100">Suprimmer</button>
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
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="mb-0 d-flex">
                        <i class="material-icons mr-2">library_add</i>
                        Ajouter une spécialité
                    </h6>
                </div>
                <div class="card-body">
                    <!-- add specialite form start -->
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>?section=specialties" method="POST">
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