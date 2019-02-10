<form id="lawyer-sign-up-form" method="POST" action="/account.php?type=lawyer" class="px-5 mt-4 needs-validation"
    novalidate>
    <!-- STEPPER START-->
    <div class="accordion" id="lawyer-sign-up-stepper">

        <!-- STEP 1 START -->
        <div class="card step-1">
            <div class="card-header p-0 border-bottom">
                <a class="btn text-left d-block px-4 py-2" data-target="#account-setup">
                    <span class="number-circle mr-2">1</span>
                    S'authentifier
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
                            <input type="email" class="form-control" id="email" name="email" required />
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
                            <input type="password" class="form-control" id="password" name="password" required />
                            <div class="invalid-feedback">
                                Le mot de passe est requis
                            </div>
                        </div>
                    </div>
                    <!-- PASSWORD END-->

                    <a class="float-right btn btn-primary step-1-button">Suivant</a>
                </div>
            </div>
        </div>