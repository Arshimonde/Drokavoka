<!DOCTYPE html>
<html lang="fr" >
<head>
<meta charset="UTF-8">
<title>Drokavoka - Inscription des Avocats</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>


<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>

<link rel="stylesheet" href="css/style2.css">

  
</head>

<body>
    <div class="jumbotron text-center">
        <p>Inscription des Avocats</p>
    </div>
  <div class="container">
    <form class="well form-horizontal" action=" " method="post"  id="register_form">
<fieldset>


<!-- Text Input -->


<div class="form-group">
    <label class="col-md-4 control-label">Gentilité</label>
    <div class="col-md-1">
        <div class="radio">
            <label>
                <input type="radio" name="gentilite" value="Mr" /> Mr.
            </label>
        </div>
    </div>

    <div class="col-md-1">
        <div class="radio">
            <label>
                <input type="radio" name="gentilite" value="Mme" /> Mme.
            </label>
        </div>
    </div>

    <div class="col-md-1">
        <div class="radio">
            <label>
                <input type="radio" name="gentilite" value="Mlle" /> Mlle.
            </label>
        </div>
    </div>
    
</div>


<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Nom</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="nom" placeholder="Nom" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Prénom</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="prenom" placeholder="Prénom" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Votre adresse E-mail" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Téléphone</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="telephone" placeholder="0662020304" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Ville</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="ville" placeholder="Ville" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<!-- radio checks -->
 <div class="form-group">
                        <label class="col-md-4 control-label">Validation de compte par</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="validation" value="sms" /> SMS
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="validation" value="email" /> Email
                                </label>
                            </div>
                        </div>
                    </div>

<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Votre compte a été enregistré avec succès.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >S'enregistrer<span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

  

<script  src="js/index.js"></script>

</body>

</html>
