<?php
/*
 * Login form
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
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="text" name="email" class="form-control form-control-lg
                        <?php echo (!empty($data['email_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['email'] ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg
                        <?php echo (!empty($data['password_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['password'] ?>">
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>s
