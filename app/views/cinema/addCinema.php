<?php
/*
 * Register form (user)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

    <div class="container mt-lg-5 mt-2">
        <div class="row form-rows justify-content-center">
            <div class="col-lg-8 col-12">
                <form method="POST">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Naam Bioscoop</label>
                        <input type="text" name="name" class="form-control form-control-lg
                        <?php echo (!empty($data['name_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['name'] ?>">
                        <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="address" class="font-weight-bold">Adres</label>
                        <input type="text" name="address" class="form-control form-control-lg
                        <?php echo (!empty($data['address_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['address'] ?>">
                        <span class="invalid-feedback"><?php echo $data['address_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="city" class="font-weight-bold">Stad</label>
                        <input type="text" name="city" class="form-control form-control-lg
                        <?php echo (!empty($data['city_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['city'] ?>">
                        <span class="invalid-feedback"><?php echo $data['city_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="zipcode" class="font-weight-bold">Postcode</label>
                        <input type="text" name="zipcode" class="form-control form-control-lg
                        <?php echo (!empty($data['zipcode_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['zipcode'] ?>">
                        <span class="invalid-feedback"><?php echo $data['zipcode_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="province" class="font-weight-bold">Provincie</label>
                        <input type="text" name="province" class="form-control form-control-lg
                        <?php echo (!empty($data['province_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['province'] ?>">
                        <span class="invalid-feedback"><?php echo $data['province_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="images" class="font-weight-bold">Afbeeldingen</label>
                        <input type="text" name="images" class="form-control form-control-lg
                        <?php echo (!empty($data['images_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['images'] ?>">
                        <span class="invalid-feedback"><?php echo $data['images_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="description" class="font-weight-bold">Omschrijving</label>
                        <input type="text" name="description" class="form-control form-control-lg
                        <?php echo (!empty($data['description_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['description'] ?>">
                        <span class="invalid-feedback"><?php echo $data['description_error']; ?></span>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-2">Biosoop aanmaken</button>
                </form>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>
