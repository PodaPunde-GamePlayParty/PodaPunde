<?php
/*
 * Contact Page (Content)
 *
 * © 2020 Team PodaPunde
 * 
 */
?>

<?php include APPROOT."/views/fragments/header.php"; ?>

<section class="form my-4 mx-5">
    <div class="container">
        <!-- <div class="col-lg-7 px-5 pt-5"> -->
            <div class="form-control-plaintext">
                <form>
                    <div id="contactForm" class="form-row">
                        <div class="col-lg-6 col-md-3">
                            <input type="text" id="name" placeholder="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]" class="form-control">
                        </div>
                        <div class="col-lg-6 col-md-3">
                            <input type="email" id="email" placeholder="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 col-md-6">
                            <input type="text" name="contactField" placeholder="contactform" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]" class="form-control" style="min-height: 150px;">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <button type="button" class="btn-login mt-3 mb-5">Versturen</button>
                        </div>
                    </div>
                </form>
            </div>
        <!-- </div> -->
    </div>
</section>


<?php include APPROOT."/views/fragments/footer.php"; ?>