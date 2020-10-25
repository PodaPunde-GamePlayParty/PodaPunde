<?php
/*
 * Update form
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
                        <label for="hall_number" class="font-weight-bold">Zaal nummer</label>
                        <input type="text" name="hall_number" class="form-control form-control-lg
                        <?php echo (!empty($data['hall_number_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['hall_number'] ?>">
                        <span class="invalid-feedback"><?php echo $data['hall_number_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="quantity_chairs" class="font-weight-bold">Beschikbare stoelen</label>
                        <input type="text" name="quantity_chairs" class="form-control form-control-lg
                        <?php echo (!empty($data['quantity_chairs_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['quantity_chairs'] ?>">
                        <span class="invalid-feedback"><?php echo $data['quantity_chairs_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="wheelchair_accessible" class="font-weight-bold">Beschikbare invalide plekken</label>
                        <input type="text" name="wheelchair_accessible" class="form-control form-control-lg
                        <?php echo (!empty($data['wheelchair_accessible_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['wheelchair_accessible'] ?>">
                        <span class="invalid-feedback"><?php echo $data['wheelchair_accessible_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="screen_size" class="font-weight-bold">Scherm grote</label>
                        <input type="text" name="screen_size" class="form-control form-control-lg
                        <?php echo (!empty($data['screen_size_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['screen_size'] ?>">
                        <span class="invalid-feedback"><?php echo $data['screen_size_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="version" class="font-weight-bold">Geluidsysteem</label>
                        <input type="text" name="version" class="form-control form-control-lg
                        <?php echo (!empty($data['version_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['version'] ?>">
                        <span class="invalid-feedback"><?php echo $data['version_error']; ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>s
