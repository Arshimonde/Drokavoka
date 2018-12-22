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
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h5 class="m-0">Les Spécialités</h5>
                </div>
                <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">#Identifiant</th>
                                <th scope="col" class="border-0">Spécialité</th>
                                <th scope="col" class="border-0">Description</th>
                                <th scope="col" class="border-0"><!--Suprimmer column---></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>La loi civile</td>
                                <td class="text-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</td>
                                <td>
                                    <button class="btn btn-secondary d-block mb-4 w-100">Modifier</button>
                                    <button class="btn btn-danger d-block w-100">Suprimmer</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
                    <form action="">
                        <!-- specialite input start -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="material-icons"> gavel </i></span>
                            </div>
                            <input type="text" name="specialite" class="form-control" placeholder="Entrer une spécialité ici" aria-label="specialite" > 
                        </div>
                        <!-- specialite input end -->
                        <!-- description input start -->
                        <div class="input-group mb-3">
                            <textarea name="specialite_description" class="form-control" placeholder="Entrer Une description apropos la spécialité ici" cols="30" rows="5"></textarea> 
                        </div>
                        <!-- description input end -->
                        <input type="submit" value="Ajouter la spécialité" class="mb-2 mx-auto d-block btn btn-primary mr-2"/>
                    </form>
                </div>
            </div>
        </div>
        <!-- ADD SPECIALITY FORM END -->
    </div>
</div>