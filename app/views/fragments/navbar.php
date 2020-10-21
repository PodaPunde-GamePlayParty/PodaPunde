<?php
/*
 * Navbar Fragment
 *
 * © 2020 Team PodaPunde
 *
 */
?>

<nav class="navbar navbar-expand-lg navbar-light p-0">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand pt-0" href="<?php echo URLROOT; ?>/pages/index">
            <img src="<?php echo URLROOT; ?>/public/graph/logo.png" alt="logo" width="300px" class="navbar-brand p-0">
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

            <?php if ((!empty($_SESSION['userid'])) && (!empty($_SESSION['authority']))) {
                if (($_SESSION['authority'] == 2) || ($_SESSION['authority'] == 3)) { ?>
                <li class='nav-item'>
                    <a class='text-dark nav-link px-3 font-weight-bold' href="<?php echo URLROOT; ?>/cms">Overzicht</a>
                </li>
            <?php } ?>

            <?php } else { ?>
                <li class="nav-item active">
                    <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/bioscopen">Bioscoop</a>
                </li>
                <li class="nav-item">
                    <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/aboutUs">Over Ons</a>
                </li>
                <li class="nav-item">
                    <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
                </li>
            <?php } ?>

        </ul>


        <div class="form-inline my-2 my-lg-0 pr-5">
            <?php if (!empty($_SESSION['userid'])) { ?>
                <a class="nav-item text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/authentication/logout">
                    Log out</a>
            <?php } else { ?>
                <a class="nav-item text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/authentication/login">
                    Log in</a>
            <?php } ?>
        </div>
    </div>
</nav>
