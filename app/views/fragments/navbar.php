<?php
/*
 * Navbar Fragment
 *
 * © 2020 Team PodaPunde
 *
 */
?>
<?php
if(!empty($_SESSION['authority'])) {
    $authority = $_SESSION['authority'];
} else {
    $authority = "";
} ?>

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


<?php switch ($authority) {
    case UN_VERIFIED_CINEMA:
        echo "<li class='nav-item'>";
        echo "  <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/bioscopen/overview'>Overzicht</a>";
        echo "</li>";
    break;
    
    case VERIFIED_CINEMA:
        echo "<li class='nav-item'>";
        echo "  <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/cms'>CMS</a>";
        echo "</li>";
    break;

    case ADMINISTRATOR:
        echo "<li class='nav-item'>";
        echo "  <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/cms'>CMS</a>";
        echo "</li>";
    break;

    default:
        echo "<li class='nav-item active'>";
        echo "    <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/index'>Home</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "    <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/bioscopen'>Bioscoop</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "    <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/pages/aboutUs'>Over Ons</a>";
        echo "</li>";

        echo "<li class='nav-item'>";
        echo "    <a class='text-dark nav-link px-3 font-weight-bold' href='" . URLROOT . "/pages/contact'>Contact</a>";
        echo "</li>";
    break;

}

?>

        </ul>
        <div class="form-inline my-2 my-lg-0 pr-5">
            <?php
            if(!empty($_SESSION['userid'])) { ?>
                <a class="nav-item text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/authentication/logout">Log out</a>
            <?php
            } else { ?>
                <a class="nav-item text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/authentication/login"><i class="fas fa-user-alt"></i></a>
            <?php
            } ?>
        </div>
    </div>
</nav>
