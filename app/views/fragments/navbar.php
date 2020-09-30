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
            <li class="nav-item active">
                <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/index">Home</a>
            </li>
            <li class="nav-item">
                <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/reservation">Reserveren</a>
            </li>
            <li class="nav-item">
                <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/bioscoop">Bioscoop</a>
            </li>
            <li class="nav-item">
                <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/aboutUs">Over Ons</a>
            </li>
            <li class="nav-item">
                <a class="text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/pages/contact">Contact</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0 pr-5">
            <a class="nav-item text-dark nav-link px-3 font-weight-bold" href="<?php echo URLROOT; ?>/login">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd"
                        d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                </svg>
            </a>
        </form>
    </div>
</nav>