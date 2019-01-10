<div class="container-fluid lawyer-sign-up">
    <div class="row">
        <!-- ILLUSTRAION START -->
        <div class="illustration col-xl-5 col-lg-5 col-md-5 col-sm-4 col-4">
            <h1 class="text-center text-uppercase">Crée Compte</h1>
            <p class="text-center mt-4 mx-4">
                Lorizzle ipsizzle dolizzle sizzle amizzle, brizzle adipiscing elit. Nullizzle black velizzle, ghetto volutpizzle, suscipizzle phat, bow wow wow vizzle, fizzle.
            </p>
        </div>
        <!-- ILLUSTRAION END -->

        <!-- SIGN UP FORM START -->
        <div class="lawyer-sign-up-section col-xl-7 col-lg-7 col-md-7 col-sm-8 col-8">

            <!-- form -->
            <form id="lawyer-sign-up-form" action="" class="px-5 mt-5" >
                <!-- STEPPER START-->
                <div class="accordion" id="lawyer-sign-up-stepper">

                    <!-- STEP 1 START -->
                    <div class="card step-1">
                        <div class="card-header p-0 border-bottom">
                            <a class="btn text-left d-block px-4 py-3" data-toggle="collapse" data-target="#account-setup">
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
                                        <input type="email" class="form-control" id="email" name="email"/>
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
                                        <input type="password" class="form-control" id="password" name="password"/>
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
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"/>
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
                            <a class="btn text-left d-block px-4 py-3" data-toggle="collapse" data-target="#personal-info">
                                <span class="number-circle mr-2">2</span>
                                Informations Personnel
                            </a>
                        </div>

                        <div id="personal-info" class="collapse" data-parent="#lawyer-sign-up-stepper">
                            <div class="card-body px-5 clearfix pb-3">
                                <!-- SEXE START -->
                                <div class="form-group">
                                    <label class="d-block">Gentilité</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="mr" value="mr">
                                        <label class="form-check-label" for="mr">Monsieur</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="mm" value="mm">
                                        <label class="form-check-label" for="mm">Madame</label>
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
                                        <input type="text" class="form-control" id="first_name" name="first_name"/>
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
                                        <input type="text" class="form-control" id="last_name" name="last_name"/>
                                    </div>
                                </div>
                                <!-- LAST NAME END-->

                                <a class="btn btn-primary float-right step-2-button">Suivant</a>
                            </div>
                        </div>
                    </div>
                    <!-- STEP  2 END-->

                    <!-- STEP  3 START-->
                    <div class="card step-3">
                        <div class="card-header p-0 border-bottom">
                            <a class="btn text-left d-block px-4 py-3" data-toggle="collapse" data-target="#contact-info">
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
                                          <input type="text" class="form-control" id="address" name="address"/>
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
                                        <input type="text" class="form-control" id="city" name="city"/>
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
                                        <input type="tel" class="form-control" id="gsm" name="gsm"/>
                                    </div>    
                                </div>
                                <!-- GSM END-->
                                <button class="btn btn-primary float-right step-button" type="submit">Créer</button>
                            </div>
                        </div>
                    </div>
                    <!-- STEP  2 END-->

   
                </div>
                <!-- STEPPER END-->
            </form>
        </div>
        <!-- SIGN UP FORM END  -->
    </div>
</div>