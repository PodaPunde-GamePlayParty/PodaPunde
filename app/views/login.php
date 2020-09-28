<?php include APPROOT."/views/fragments/header.php"; ?>

<section class="form my-4 mx-5">
    <div class="container">
        <div class="row no-gutters form-rows">
            <div class="col-lg-5">
                <img src="./logo.png" class="img-fluid login-logo" alt="">
            </div>

            <div class="col-lg-7 px-5 pt-5">
                <form>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="email" id="email" placeholder="email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control my-3 p-4">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$
                                " class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button type="button" class="btn-login mt-3 mb-5">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include APPROOT."/views/fragments/footer.php"; ?>s