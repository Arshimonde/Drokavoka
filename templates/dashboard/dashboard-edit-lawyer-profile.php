<!-- GET USER DATA START -->
<?php 
    if(isset($_GET["id"])):
        $lawyer_data = get_lawyer_data($_GET["id"]);
        $lawyer_specialites = get_lawyer_specialties($_GET["id"]); 
    endif;
?>
<!-- GET USER DATA END -->

<!-- /*MODIFY LAWYER DATA START*/ -->
<?php
    if(isset($_POST["email"])):  
        $speciality_ids = $_POST["id_specialite"];
        unset($_POST["id_specialite"]);
        unset($_POST["confirm_password"]);
        $elements = $_POST;
        /* insert lawyer into 'avocat' mysql table */
        $is_lawyer_inserted = db_insert('avocat',$elements);
        global $app_db;
        $lawyer_id = mysqli_insert_id($app_db);
        
        /* insert lawyer and specialites in 'avocat_specialite' mysql table*/
        foreach($speciality_ids as $speciality_id):
            $is_lawyer_inserted = db_insert('avocat_specialite',array(
                                    "id_avocat" => $lawyer_id,
                                    "id_specialite" =>intval($speciality_id)
                                  ));
        endforeach;

        // Redirect on account creation
        if($is_lawyer_inserted):
            header('Location: /index.php');
        endif;

    endif;
?>
<!-- /*MODIFY LAWYER DATA END*/ -->

<!-- MAIN CONTENT START -->
<div class="container-fluid main-content pb-4">
    <!-- PAGE HEADER START -->
    <div class="page-header row no-gutters py-4 mb-3 border-bottom">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Modification d'Avocats</span>
            <h3 class="page-title d-flex"><i class="fas fa-edit fa-1x"></i> Modification de l'avocat </h3>
        </div>
    </div>
    <!-- PAGE HEADER END -->

    <!-- FORM START -->
    <!-- SIGN UP FORM START -->
    <div class="lawyer-sign-up-section col-xl-7 col-lg-7 col-md-7 col-sm-8 col-8">

    <!-- form -->
    <form id="lawyer-sign-up-form" method="POST" action="/account.php?type=lawyer" class="px-5 mt-4 needs-validation" novalidate >
        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
        <!-- STEPPER START-->
        <div class="accordion" id="lawyer-sign-up-stepper">

            <!-- STEP 1 START -->
            <div class="card step-1">
                <div class="card-header p-0 border-bottom">
                    <a class="btn text-left d-block px-4 py-2" data-target="#account-setup">
                        <span class="number-circle mr-2">1</span>
                        Informations du Compte
                    </a>
                </div>
                <div id="account-setup" class="collapse show" data-parent="#lawyer-sign-up-stepper">
                    <div class="card-body px-5 clearfix pb-3">
                        <!-- EMAIL START-->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email"><i class="fas fa-envelope  fa-1x"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $lawyer_data["email"];?>"/>
                                <div class="invalid-feedback">
                                    Veuillez entrez un email correct
                                </div>
                            </div>
                        </div>
                        <!-- EMAIL END-->
                        
                        <!-- PASSWORD START-->
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email">
                                        <i class="fas fa-key fa-1x"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" required value="<?php echo $lawyer_data["password"];?>"/>
                                <div class="invalid-feedback">
                                    Le mot de passe est requis
                                </div>
                            </div>
                        </div>
                        <!-- PASSWORD END-->

                        <!-- CONFIRM PASSWORD START-->
                        <div class="form-group">
                            <label for="confirm_password">Confirmer le Mot de passe</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="email">
                                        <i class="fas fa-key fa-1x"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required value="<?php echo $lawyer_data["password"];?>"/>
                                <div class="invalid-feedback">
                                    Le mot de passe n'est pas confirmé ou vide 
                                </div>
                            </div>
                        </div>
                        <!-- CONFIRM PASSWORD END-->
                        <a class="float-right btn btn-primary step-1-button">Suivant</a>
                    </div>
                </div>
            </div>
            <!-- STEP 1 START -->
            
            <!-- STEP  2 START-->
            <div class="card step-2">
                <div class="card-header p-0 border-bottom">
                    <a class="btn text-left d-block px-4 py-2" data-target="#personal-info">
                        <span class="number-circle mr-2">2</span>
                        Informations Personnel
                    </a>
                </div>

                <div id="personal-info" class="collapse" data-parent="#lawyer-sign-up-stepper">
                    <div class="card-body px-5 pt-2 clearfix pb-3">
                        <!-- SEXE START -->
                        <?php $gender =  $lawyer_data["gender"];?>
                        <div class="form-group">
                            <label class="d-block">Gentilité</label>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="gender" id="mr" value="mr" <?php 
                                    if($gender=="mr") echo "checked"
                                ?>>
                                <label class="custom-control-label" for="mr">Monsieur</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="gender" id="mm" value="mm" <?php 
                                    if($gender=="mme") echo "checked"
                                ?>
                                <label class="custom-control-label" for="mme">Madame</label>
                            </div>
                        </div>
                        <!-- SEXE END -->

                        <!-- FIRST NAME START-->
                        <div class="form-group">
                            <label for="first_name">Prénom</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user fa-1x"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="first_name" name="first_name" required value="<?php echo $lawyer_data["first_name"];?>"/>
                                <div class="invalid-feedback">
                                    Le prénom est requis
                                </div>
                            </div>
                        </div>
                        <!-- FIRST NAME END-->
                        <!-- LAST NAME START-->
                        <div class="form-group">
                            <label for="last_name">Nom</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user fa-1x"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="last_name" name="last_name" required value="<?php echo $lawyer_data["last_name"];?>"/>
                                <div class="invalid-feedback">
                                    Le nom est requis
                                </div>
                            </div>
                        </div>
                        <!-- LAST NAME END-->

                        <!-- SPECIALITE START -->
                        <div class="form-group">
                            <label for="">Votre Spécialité</label>
                                <select 
                                    name="id_specialite[]" id="" class="selectpicker"
                                    title = "Choisir une ou plusieurs spécialité " 
                                    data-live-search="true"
                                    data-width="100%" 
                                    data-size = "8"
                                    multiple
                                >
                                    <!-- fill options -->
                                    <?php
                                    $options =  db_select("specialite");
                                    foreach($options as $option):
                                            $id=$option['id'];
                                            $name = $option['specialite_name'];
                                            $selected = "";
                                            if(in_array($name,$lawyer_specialites))
                                            $selected="selected";
                                            echo "<option $selected value='".$id."'>$name</option>";
                                    endforeach;
                                    ?>
                                </select>
                        </div> 
                        <!-- SPECIALITE END -->
                        <a class="btn btn-primary float-right step-2-button">Suivant</a>
                    </div>
                </div>
            </div>
            <!-- STEP  2 END-->

            <!-- STEP  3 START-->
            <div class="card step-3">
                <div class="card-header p-0 border-bottom">
                    <a class="btn text-left d-block px-4 py-2" data-target="#contact-info">
                        <span class="number-circle mr-2">3</span>
                        Informations de Contact
                    </a>
                </div>

                <div id="contact-info" class="collapse" data-parent="#lawyer-sign-up-stepper">
                    <div class="card-body px-5 clearfix">
                        <!-- ADDRESS START-->
                        <div class="form-group">
                            <label for="address">Adresse</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker-alt fa-1x"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="address" name="address" required  value="<?php echo $lawyer_data["address"];?>"/>
                                <div class="invalid-feedback">
                                    L'adresse est requise
                                </div>
                            </div>                                  
                        </div>
                        <!-- ADDRESS END-->
                        <!-- CITY START-->
                        <div class="form-group">
                            <label for="city">Ville</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-building fa-1x"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" id="city" name="city" required value="<?php echo $lawyer_data["city"];?>"/>
                                <div class="invalid-feedback">
                                    La ville est requise
                                </div>
                            </div>    
                        </div>
                        <!-- CITY END-->
                        <!-- GSM START-->
                        <div class="form-group">
                            <label for="gsm">GSM</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-mobile-alt fa-1x"></i>
                                    </div>
                                </div>
                                <input type="tel" class="form-control" id="gsm" name="gsm" value="<?php echo $lawyer_data["gsm"];?>"/>
                            </div>    
                        </div>
                        <!-- GSM END-->
                        <button class="btn btn-primary float-right step-button" type="submit">Modifier</button>
                    </div>
                </div>
            </div>
            <!-- STEP  2 END-->


        </div>
        <!-- STEPPER END-->
    </form>
    </div>
    <!-- SIGN UP FORM END  -->
    <!-- FORM END -->
</div>