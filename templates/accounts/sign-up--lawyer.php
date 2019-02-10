<!-- SAVE LAWYER IN DATABASE START -->
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
            $desc = "<b>".$elements["first_name"] ." ".$elements["last_name"]."</b> à rejoindre la communauté de Drokavoka";
            db_insert("notification",array(
                    "type"=> "lawyer_insert",
                    "title" => "Nouveau avocat",
                    "description" => $desc
                )
            );
           // header('Location: /account.php?type=lawyer');
        endif;

    endif;
?>
<!-- SAVE LAWYER IN DATABASE END-->


<div class="container-fluid lawyer-sign-up">
    <div class="row">
        <!-- ILLUSTRAION START -->
        <div class="illustration col-xl-5 col-lg-5 col-md-5 col-sm-4 col-4">
            <h1 class="text-center text-uppercase">Créer votre Compte</h1>
            <p class="text-center mt-4 mx-4">
                Bienvenue sur le premier portail des avocats au Maroc.
            </p>
        </div>
        <!-- ILLUSTRAION END -->

        <!-- SIGN UP FORM START -->
        <div class="lawyer-sign-up-section col-xl-7 col-lg-7 col-md-7 col-sm-8 col-8 mt-3" id="tabs">

            
        <nav>
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active"  data-toggle="tab" href="#login" role="tab" >Login</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#register" role="tab" >Register</a>
        
            </div>
        </nav>
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
            <div class="tab-pane fade" id="register" role="tabpanel" >
                <?php include("sign-up.php");?>
            </div>
            <div class="tab-pane fade show active" id="login" role="tabpanel">
                <?php include("sign-in.php");?>                        
            </div>
            
        </div>

        </div>
        <!-- SIGN UP FORM END  -->
    </div>
</div>