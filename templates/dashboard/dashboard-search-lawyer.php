

<div class="form-group mb-0 col-lg-2">
    <input type="text" placeholder="Prénom" class="form-control rounded border" name="filter_first_name">
</div>
<div class="form-group mb-0 col-lg-2">
    <input type="text" placeholder="Nom" class="form-control rounded border" name="filter_last_name">
</div>
<div class="form-group mb-0 col-lg-2">
    <input type="text" name="filter_city" placeholder="Ville" class="form-control rounded border">
</div>
<div class="form-group mb-0 col-lg-4">
    <select data-size="8" name="filter_speciality" id="" placeholder="" class="selectpicker form-control rounded border">
        <option disabled selected value="-1">Choisir une spécialités</option>
        <?php
            $specialites = db_select("specialite");
            foreach ($specialites as $sp):
        ?>
        <option value="<?=$sp["id"]?>"><?=$sp["specialite_name"]?></option>
        <?php
            endforeach;
        ?>
    </select>
</div>
<div class="form-group mb-0 col-lg-2">
    <button class="btn btn-primary" type="submit">Rechercher</button>
</div>