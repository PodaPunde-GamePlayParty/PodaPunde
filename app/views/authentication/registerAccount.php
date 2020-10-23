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
                        <label for="username" class="font-weight-bold">Gebruikersnaam</label>
                        <input type="text" name="username" class="form-control form-control-lg
                        <?php echo (!empty($data['username_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['username'] ?>">
                        <span class="invalid-feedback"><?php echo $data['username_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Wachtwoord</label>
                        <input type="password" name="password" class="form-control form-control-lg
                        <?php echo (!empty($data['password_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['password'] ?>">
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg
                        <?php echo (!empty($data['email_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['email'] ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="font-weight-bold">Voornaam</label>
                        <input type="text" name="firstname" class="form-control form-control-lg
                        <?php echo (!empty($data['firstname_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['firstname'] ?>">
                        <span class="invalid-feedback"><?php echo $data['firstname_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="preposition" class="font-weight-bold">Tussevoegsel</label>
                        <input type="text" name="preposition" class="form-control form-control-lg
                        <?php echo (!empty($data['preposition_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['preposition'] ?>">
                        <span class="invalid-feedback"><?php echo $data['preposition_error']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="lastname" class="font-weight-bold">Achternaam</label>
                        <input type="text" name="lastname" class="form-control form-control-lg
                        <?php echo (!empty($data['lastname_error'])) ? "is-invalid" : ""; ?>
                        " value="<?php echo $data['lastname'] ?>">
                        <span class="invalid-feedback"><?php echo $data['lastname_error']; ?></span>
                    </div>

                    <fieldset class="form-group">
                        <label for="authority_level_group" class="font-weight-bold">Accounttype</label>
                        <div id="authority_level_group" class="form-group
                        <?php echo (!empty($data['authority_level_error'])) ? "is-invalid" : ""; ?>">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="authority_level" id="authority_level_visitor" value="Visitor" checked>
                                <label class="form-check-label" for="authority_level_visitor">Bezoeker</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="authority_level" id="authority_level_cinema" value="Cinema">
                                <label class="form-check-label" for="authority_level_cinema">Bioscoop</label>
                            </div>
                            <span class="invalid-feedback"><?php echo $data['authority_level_error']; ?></span>
                        </div>
                    </fieldset>

                    
                    <button type="submit" class="btn btn-primary mt-2">Registreren</button>
                </form>
            </div>
        </div>
    </div>

<?php include APPROOT."/views/fragments/footer.php"; ?>s
