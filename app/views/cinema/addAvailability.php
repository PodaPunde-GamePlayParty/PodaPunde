<?php
/*
 * add form (availability)
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

    <div class="container mt-lg-5 mt-2">
        <div class="row form-rows justify-content-center">
            <div class="col-lg-8 col-12">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="date" class="font-weight-bold">Datum: </label>
                        <input type="date" name="date" class="form-control form-control-lg
                        <?php echo (!empty($data['date_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['date'] ?>">
                        <span class="invalid-feedback"><?php echo $data['date_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="begin_time" class="font-weight-bold">Begin Tijd: </label>
                        <input type="time" name="begin_time" class="form-control form-control-lg
                        <?php echo (!empty($data['begin_time_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['begin_time'] ?>">
                        <span class="invalid-feedback"><?php echo $data['begin_time_error']; ?></span>
                    </div>

                    
                    
                    <button type="submit" name="submit" class="btn btn-primary mt-2">Beschikbaarheid aanmaken</button>
                </form>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>
